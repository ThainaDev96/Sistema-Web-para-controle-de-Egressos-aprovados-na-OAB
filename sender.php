<?php
require("verifica_login.php");
include 'conexao.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$id_email = $_POST['id_email'];//Pega o ID do e-mail cadastrado

$sql = "SELECT id, destinatario, assunto, mensagem FROM email WHERE id = $id_email";
//Busca apenas esse e-mail no banco para enviar e atualizar status 

$result = $conn->query($sql);//// Executa a query e guarda o resultado



if ($result->num_rows == 0) {
    die("Nenhum e-mail pendente para enviar.");
}

// Configurações SMTP protocolo de transporte de email
$smtpConfig = [
    'host'       => 'smart.iagentesmtp.com.br',//servidor
    'port'       => 587,
    'username'   => 'brum@faculdadedombosco.edu.br',//login do seervidor smtp
    'password'   => 'UXTSQ@Z&',
    'from_email' => '24221014@faculdadedombosco.com.br',//minha matricula
    'from_name'  => 'FDB Integrador - Teste',
    'encryption' => null
];

while ($email = $result->fetch_assoc()) {
  
    $mail = new PHPMailer(true);

    try {
        // CONFIG SMTP
        $mail->isSMTP();
        $mail->Host       = $smtpConfig['host'];
        $mail->SMTPAuth   = true;
        $mail->Username   = $smtpConfig['username'];
        $mail->Password   = $smtpConfig['password'];
        $mail->SMTPSecure = $smtpConfig['encryption'];
        $mail->Port       = $smtpConfig['port'];
        $mail->CharSet    = 'UTF-8';

        // REMETENTE
        $mail->setFrom($smtpConfig['from_email'], $smtpConfig['from_name']);

        // DESTINATÁRIO
        $mail->addAddress($email['destinatario']);

        // ASSUNTO E CORPO
        $mail->Subject = $email['assunto'];
        $mail->Body    = $email['mensagem'];
        $mail->AltBody = strip_tags($email['mensagem']);

        // ENVIAR
        if ($mail->send()) {

        // ATUALIZAR STATUS
        $id = $email['id'];
        $conn->query("UPDATE email SET status='e', data_envio=NOW() WHERE id = $id");

        echo "E-mail ID $id enviado com sucesso!<br>";
        } else {                    
        echo "Falha ao enviar e-mail ID {$email['id']}: {$mail->ErrorInfo}<br>";
    }

    } catch (Exception $e) {
         echo "Erro ao enviar e-mail ID {$email['id']}: " . $e->getMessage() . "<br>";
    
    }
    
}

?>