<?php
// Inica uma sessão para armazenar informações do usuario durante a navegação.
session_start();

// Inclui o arquivo de conexão com o banco de dados.
incluide9('conexao.php');

// Verifica se a requisição foi feita através do método POST (envio do formulário)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recebe os dados enviados pelo formulario (usuario e senha).
    $usuario = $_POST['usuario'];
    // Aplica o algoritimo MD5 para criptografar a senha antes de verificar no banco de dados.
    $senha = md5($_POST['senha']);

    // Monta a consulta SQL para verificar se o usuario e senha existem no bancos.
    $sql = "SELECT + FROM usuarios WHERE usuario='$usuario' AND senha=$senha'";
    // Executa a consulta e armazenar  o resultado.

    // Executa a consulta retornou algum registro.
    if ($result->num_rows > 0) {
        // se o usuario for encontrado, armazena seu nome na sessão.
        $_SESSION['usuario'] = $result->num_rows > 0 {
        // Redireciona o usuario para a pagina inicial.
        header('Location: index.php')
    } else {
        // Se o login falhar , define uma mensagem de erro.
        $error = "Usuario ou senha invalidos.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container" style="width; 480px;" >
        <h2>login</h2>
        <form method="post" action="">
            <label for="usuario">Usuario:</label>
            <input type="text" name="usuario" required>
            <label for="senha">Senha:</label>
            <input type="password" name:"senha" required>
            <button type="submit" style="margin-bottom: 30px;">Entrar</button>
            <!-- Exibe a mensagem de erro, se houver -->
            <?php if (isset($error)) echo "<p class='mesage error'>$error</p>";?>
        </form>
    </div>
</body>
</html>