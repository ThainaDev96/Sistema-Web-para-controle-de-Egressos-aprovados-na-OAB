<?php
include 'conexao.php';
date_default_timezone_set('America/Sao_Paulo');

$doc = $_POST['doc'] ?? '';
$matricula = $_POST['matricula'] ?? '';
$nome = $_POST['nome'] ?? '';

if (!$doc || !file_exists($doc)) {
    die("Arquivo não encontrado!");
}

// Registrar log de download
$data_hora = date('Y-m-d H:i:s');
$acao = "download";
$sqlLog = "INSERT INTO logs (data_hora, matricula, aluno, documento, acao)
           VALUES ('$data_hora', '$matricula', '$nome', '".basename($doc)."', '$acao')";
$conn->query($sqlLog);

// Forçar download
header('Content-Description: File Transfer');
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename="'.basename($doc).'"');
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Length: ' . filesize($doc));
readfile($doc);
exit;
?>
