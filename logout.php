<?php
session_start();   // inicia a sessão
$_SESSION = [];     // limpa todas as variáveis de sessão
session_destroy();  // destrói a sessão
header("Location: login.php"); // redireciona para o login
exit;
?>
