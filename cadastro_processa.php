<?php
include 'conexao.php';
session_start();

$usuario = $_POST['usuario'] ?? '';
$email   = $_POST['email'] ?? '';
$senha   = $_POST['senha'] ?? '';

$erro = "";
$erroCampos = []; //array

//Todos os campos são obrigatórios
if (empty($usuario) || empty($email) || empty($senha)) {

    $erro = "Todos os campos são obrigatórios!";

    if (empty($usuario)) $erroCampos[] = "usuario";
    if (empty($email))   $erroCampos[] = "email";
    if (empty($senha))   $erroCampos[] = "senha";
}

if (!empty($usuario) && strlen($usuario) < 3) {
    $erro = "Corrija os campos destacados!";
    $erroCampos[] = "usuario";
}

if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $erro = "Corrija os campos destacados!";
    $erroCampos[] = "email";
}

if (!empty($senha) && strlen($senha) < 6) {
    $erro = "Corrija os campos destacados!";
    $erroCampos[] = "senha";
}

// Usuário existente
$check = $conn->query("SELECT * FROM usuario WHERE usuario='$usuario' OR email='$email'");
if ($check && $check->num_rows > 0) {
    $erro = "Usuário ou email já cadastrado!";
    $erroCampos[] = "usuario";
    $erroCampos[] = "email";
}

// SE NÃO TEM ERROS CADASTRA
if (empty($erroCampos)) {

    $sql = "INSERT INTO usuario (usuario, senha, email) VALUES ('$usuario', '$senha', '$email')";

    if ($conn->query($sql)) {
        $conn->close();
        header("Location: login.php");
        exit;
    } else {
        $erro = "Erro ao cadastrar: " . $conn->error;
        $erroCampos[] = "geral";
    }
}
$conn->close();

$listaErros = implode(",", $erroCampos);
header("Location: cadastro_admin.php?erroMsg=$erro&erroCampo=$listaErros");
exit;
?>
