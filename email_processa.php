<?php
include 'conexao.php';
date_default_timezone_set('America/Sao_Paulo'); // fuso horário


// Recebe dados do formulário via POST, evita erro se não existir
$destinatario = $_POST['destinatario'] ?? '';
$assunto      = $_POST['assunto'] ?? '';
$mensagem     = $_POST['mensagem'] ?? '';
$remetente    = 'professor@escola.com';
$data_hora    = date('Y-m-d H:i:s');

//Cadastrar email no banco 'n'
$conn->query("INSERT INTO email (remetente, destinatario, data_hora, data_envio, mensagem, status, assunto)
              VALUES ('$remetente', '$destinatario', '$data_hora', NULL, '$mensagem', 'n', '$assunto')");

echo "Email cadastrado";

// Pega o ID do e-mail recém-inserido
$id_email = $conn->insert_id;

// Passa esse ID para o sender
$_POST['id_email'] = $id_email;

include 'sender.php';

$conn->close();
?>
