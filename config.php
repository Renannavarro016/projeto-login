<?php
$host = "sql105.infinityfree.com";       // Host do banco (veja no painel)
$dbname = "f0_40254738_renan"; // Nome do banco
$user = "if0_40240928";          // Usuário do banco
$pass = "hAGOHYQsaSPxSa";         // Senha que você criou

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro ao conectar: " . $e->getMessage());
}
