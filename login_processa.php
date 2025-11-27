<?php
session_start();
include "conexao.php";
// Pega os valores do formulário
$usuario = $_POST["email"];
$senha = $_POST["password"];

/* Verifica login fixo
if ($usuario == "thaina" && $senha == "18") {
    $_SESSION["valida"] = 1; //Se estiver correto, cria uma sessão valida = 1 e envia para index.php
   
    header("Location: index.php");
    exit;
} else {
    $_SESSION["valida"] = 0;
    // Redireciona de volta para o login com erro
    header("Location: login.php?erro=1");
    exit;
}
?>*/
// Consulta no banco
$sql = "SELECT * FROM usuario WHERE email='$usuario' AND senha='$senha'";
$result = $conn->query($sql);

// Se encontrou o usuário
if ($result && $result->num_rows == 1) {
    $row = $result->fetch_assoc(); // pega os dados do usuário do banco
    $_SESSION["valida"] = 1;

    $_SESSION["nomeUsuario"] = $row["usuario"]; // salva o nome do usuário cadastrado no menu
    header("Location: index.php");
    exit;

} else {

    $_SESSION["valida"] = 0;
    $_SESSION["login_erro"] = "Email ou senha inválidos"; // mensagem de erro
    header("Location: login.php?erro=1");
    exit;
}
?>
