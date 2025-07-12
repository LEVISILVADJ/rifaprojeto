<?php
require_once __DIR__ . '/initialize.php';
require_once __DIR__ . '/class/BlockedNumbers.php';

// Verificar se é uma requisição POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['status' => 'error', 'message' => 'Método não permitido']);
    exit;
}

// Verificar se os dados foram enviados
if (!isset($_POST['product_id']) || !isset($_POST['blocked_numbers'])) {
    http_response_code(400);
    echo json_encode(['status' => 'error', 'message' => 'Dados incompletos']);
    exit;
}

try {
    // Conectar ao banco
    $conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
    
    if ($conn->connect_error) {
        throw new Exception("Erro de conexão: " . $conn->connect_error);
    }
    
    $conn->set_charset("utf8mb4");
    
    // Processar números bloqueados
    $blocked_numbers_handler = new BlockedNumbers($conn);
    $result = $blocked_numbers_handler->save_blocked_numbers(
        intval($_POST['product_id']), 
        $_POST['blocked_numbers']
    );
    
    $conn->close();
    
    // Retornar resposta
    header('Content-Type: application/json');
    echo json_encode($result);
    
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['status' => 'error', 'message' => 'Erro interno: ' . $e->getMessage()]);
}
?>