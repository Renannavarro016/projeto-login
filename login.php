<?php
session_start();
require 'config.php';

$erro = '';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = trim($_POST["eml"] ?? '');
    $senha = trim($_POST["passw"] ?? '');

    if ($email === '' || $senha === '') {
        $erro = "Preencha todos os campos.";
    } else {
        // Busca o usuário pelo e-mail
        $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email LIMIT 1");
        $stmt->bindValue(":email", $email);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Verifica senha
        if ($user && hash('sha256', $senha) === $user['senha']) {
            $_SESSION["logado"] = true;
            $_SESSION["email"] = $user["email"];
            header("Location: painel.php");
            exit;
        } else {
            $erro = "E-mail ou senha incorretos.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos/style.css">
    <link rel="stylesheet" href="estilos/telas-maiores.css">
    <title>Login</title>
</head>
<body>
    <main>
        <section>
            <div class="imagem-login">
                <img width="300" height="300" src="imagens/pexels-pixabay-273209.jpg" alt="login"/>
            </div>
            <div>
                <h1>Login</h1>
                <p>
                    Seja bem-vindo novamente. Faça login para acessar a sua conta e poder configurar o seu ambiente.
                </p>

                <!-- Mostra erro se houver -->
                <?php if (!empty($erro)): ?>
                    <p style="color:red;"><?= htmlspecialchars($erro) ?></p>
                <?php endif; ?>

                <form action="login.php" method="post">
                    <div class="box">
                        <label for="ieml">
                            <img width="30" height="30" src="https://img.icons8.com/ios-glyphs/30/user--v1.png" alt="user--v1"/>
                        </label>
                        <input type="email" name="eml" id="ieml" required minlength="4"
                               placeholder="Digite seu e-mail" autocomplete="email"
                               value="<?= htmlspecialchars($_POST['eml'] ?? '') ?>">
                    </div>

                    <div class="box">
                        <label for="ipassw">
                            <img width="24" height="24" src="https://img.icons8.com/material-rounded/24/key--v1.png" alt="key--v1"/>
                        </label>
                        <input type="password" name="passw" id="ipassw" required minlength="6" maxlength="8"
                               placeholder="Digite sua senha">
                    </div>

                    <div class="entrar">
                        <button type="submit">Entrar</button>
                    </div>

                    <div class="esqueci-senha">
                        <button type="button" onclick="alert('Função em desenvolvimento')">Esqueci a senha ✉</button>
                    </div>
                </form>
            </div>
        </section>
    </main>
</body>
</html>
