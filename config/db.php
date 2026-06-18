<?php
// Configurações do Banco de Dados MySQL na Cloudez
$host = 'ip-45-56-79-242.cloudezapp.io'; // No servidor da Cloudez normalmente é localhost ou IP local
$db   = 'mulino_wl_db';
$user = 'mulinotech'; // Credenciais padrão que podem ser alteradas nas configurações de deploy
$pass = 'Servidor@mUl1!2905';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
    
    // Criação automática da tabela de contatos se não existir
    $sql = "CREATE TABLE IF NOT EXISTS contatos (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nome VARCHAR(100) NOT NULL,
        email VARCHAR(100) NOT NULL,
        telefone VARCHAR(30) NOT NULL,
        empresa VARCHAR(100) DEFAULT NULL,
        servico VARCHAR(100) NOT NULL,
        mensagem TEXT NOT NULL,
        data_envio TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
    $pdo->exec($sql);

    // Compatibilidade: Adiciona as colunas email e telefone caso a tabela já existisse antes sem elas
    try {
        $pdo->query("SELECT email FROM contatos LIMIT 1");
    } catch (\Exception $e) {
        $pdo->exec("ALTER TABLE contatos ADD COLUMN email VARCHAR(100) NOT NULL AFTER nome");
    }
    
    try {
        $pdo->query("SELECT telefone FROM contatos LIMIT 1");
    } catch (\Exception $e) {
        $pdo->exec("ALTER TABLE contatos ADD COLUMN telefone VARCHAR(30) NOT NULL AFTER email");
    }
} catch (\PDOException $e) {
    // Registra o erro internamente sem expor dados sensíveis ao usuário final
    error_log("Falha na conexão MySQL: " . $e->getMessage());
}
