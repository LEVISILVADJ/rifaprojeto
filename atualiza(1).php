<?php
require_once 'initialize.php';

// Conectar ao banco de dados
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

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

// Fechar a conexão
$conn->close();
?>
