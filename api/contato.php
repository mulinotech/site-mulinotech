<?php
header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['status' => 'error', 'message' => 'Método de requisição não suportado.']);
    exit;
}

// Higienização e validação dos dados recebidos
$nome = isset($_POST['nome']) ? trim(strip_tags($_POST['nome'])) : '';
$email = isset($_POST['email']) ? trim(strip_tags($_POST['email'])) : '';
$telefone = isset($_POST['telefone']) ? trim(strip_tags($_POST['telefone'])) : '';
$empresa = isset($_POST['empresa']) ? trim(strip_tags($_POST['empresa'])) : '';
$servico = isset($_POST['servico']) ? trim(strip_tags($_POST['servico'])) : '';
$mensagem = isset($_POST['mensagem']) ? trim(strip_tags($_POST['mensagem'])) : '';

if (empty($nome) || empty($email) || empty($telefone) || empty($servico) || empty($mensagem)) {
    echo json_encode(['status' => 'error', 'message' => 'Por favor, preencha todos os campos obrigatórios (Nome, E-mail, Telefone, Serviço de Interesse e Mensagem).']);
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(['status' => 'error', 'message' => 'Por favor, insira um e-mail válido.']);
    exit;
}

// Carrega o arquivo de banco de dados
require_once __DIR__ . '/../config/db.php';

if (isset($pdo)) {
    try {
        $stmt = $pdo->prepare("INSERT INTO contatos (nome, email, telefone, empresa, servico, mensagem) VALUES (:nome, :email, :telefone, :empresa, :servico, :mensagem)");
        $stmt->execute([
            ':nome' => $nome,
            ':email' => $email,
            ':telefone' => $telefone,
            ':empresa' => $empresa,
            ':servico' => $servico,
            ':mensagem' => $mensagem
        ]);
        
        echo json_encode([
            'status' => 'success',
            'message' => 'Sua mensagem foi enviada com sucesso! Em breve um de nossos especialistas entrará em contato.'
        ]);
    } catch (\Exception $e) {
        error_log("Erro ao salvar formulário de contato: " . $e->getMessage());
        echo json_encode([
            'status' => 'error',
            'message' => 'Erro ao salvar sua solicitação no banco de dados. Por favor, tente novamente.'
        ]);
    }
} else {
    // Fallback: Armazena em um arquivo local caso o banco de dados não esteja acessível (ex: desenvolvimento local)
    $fallbackFile = __DIR__ . '/contatos_fallback.txt';
    $logEntry = sprintf("[%s] Nome: %s | E-mail: %s | Telefone: %s | Empresa: %s | Serviço: %s | Mensagem: %s\n", date('Y-m-d H:i:s'), $nome, $email, $telefone, $empresa, $servico, $mensagem);
    file_put_contents($fallbackFile, $logEntry, FILE_APPEND);
    
    echo json_encode([
        'status' => 'success',
        'message' => 'Mensagem registrada! (Nota: Conexão com banco mulino_wl_db indisponível, dados salvos no arquivo de contingência local).'
    ]);
}
