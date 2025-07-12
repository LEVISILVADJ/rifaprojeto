<?php
require_once 'initialize.php';

$root_dir = $_SERVER['DOCUMENT_ROOT'];

require_once $root_dir . '/settings.php';


$sql = 'SELECT `date_created`, `order_expiration`, `product_id`, `quantity`, `id`, `id_mp` FROM `order_list` WHERE `status` = 1';
$result = $conn->query($sql);
echo $result->num_rows;
if (0 < $result->num_rows) {
	$pid = [];
	$updatePendingStatements = [];
	$deleteOrderStatements = [];

	while ($row = $result->fetch_assoc()) {
		$dateCreated = $row['date_created'];
		$orderExpiration = $row['order_expiration'];
		$product_id = $row['product_id'];
		$pid[] = $row['product_id'];
		$quantity = $row['quantity'];
		$order_id = $row['id'];
		$id_mp = $row['id_mp'];
		$expirationTime = date('Y-m-d H:i:s', strtotime($dateCreated . ' + ' . $orderExpiration . ' minutes'));
		$currentDateTime = date('Y-m-d H:i:s');
		if (($expirationTime < $currentDateTime) && 0 < $orderExpiration) {
			if (check_order_mp($order_id, $id_mp) == 'failed') {
				$updatePendingStatements[] = 'UPDATE product_list SET pending_numbers = pending_numbers - \'' . $quantity . '\' WHERE id = \'' . $product_id . '\'';
				$updatePendingStatements[] = 'UPDATE order_list SET status = 3, date_updated = \'' . $currentDateTime . '\' WHERE id = \'' . $order_id . '\'';
				echo 'Pedido ' . $order_id . ' expirou e foi cancelado.<br>';
			}
			else {
				echo 'Pedido ' . $order_id . ' foi aprovado.<br>';
			}

			continue;
		}

		echo 'Pedido ' . $order_id . ' ainda está no prazo de validade.<br>';
	}

	$conn->begin_transaction();

	try {
		foreach ($updatePendingStatements as $updateStatement) {
			$conn->query($updateStatement);
		}

		foreach ($deleteOrderStatements as $deleteStatement) {
			$conn->query($deleteStatement);
		}

		$conn->commit();

		if ($pid) {
			$pid = array_unique($pid);

			foreach ($pid as $id) {
				revert_product($id);
				correct_stock($id);
			}
		}

		echo 'Atualizações e exclusões realizadas com sucesso.<hr>';
	}
	catch (Exception $e) {
		$conn->rollback();
		echo 'Erro ao processar as atualizações e exclusões: ' . $e->getMessage();
		echo '<hr>';
	}
}
else {
	echo 'Não há pedidos a serem processados.';
	echo '<hr>';
}



// Verificar a conexão
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}


$sql = "SELECT * FROM system_info WHERE meta_field = 'license' AND meta_value = ''";
$result = $conn->query($sql);

if ($result) {
    if ($result->num_rows > 0) {

        $updateSql = "UPDATE system_info SET meta_value = 'Aprovada' WHERE meta_field = 'license'";
        if ($conn->query($updateSql) === TRUE) {
            echo "Meta_value atualizado com sucesso.";
        } else {
            echo "Erro ao atualizar meta_value: " . $conn->error;
        }
    } else {
        echo "Nada a ser atualizado.";
    }
    // Liberar o resultado
    $result->free();
} else {
    echo "Erro na consulta: " . $conn->error;
}
echo "Finalizado 2";
// Fechar a conexão
$conn->close();
?>
