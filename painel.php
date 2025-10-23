<?php
session_start();
if (empty($_SESSION["logado"])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Painel</title>
<link rel="stylesheet" href="estilos/style.css">
</head>
<body>
    <main>
        <h1>Bem-vindo, <?= htmlspecialchars($_SESSION["email"]) ?>!</h1>
        <p>Você está logado no sistema.</p>
        <a href="logout.php">Sair</a>
    </main>
</body>
</html>
