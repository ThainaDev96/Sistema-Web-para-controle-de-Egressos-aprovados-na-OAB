<?php
require 'ler/vendor/autoload.php';
include 'conexao.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// Consulta os e-mails na tabela alunos
$sql = "SELECT nome, email FROM alunos WHERE email != ''";
$result = $conn->query($sql);

// Criar planilha
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Cabeçalho
$sheet->setCellValue('A1', 'Nome');
$sheet->setCellValue('B1', 'Email');

$linha = 2;

// Preencher planilha com os dados
while ($row = $result->fetch_assoc()) {
    $sheet->setCellValue('A' . $linha, $row['nome']);
    $sheet->setCellValue('B' . $linha, $row['email']);
    $linha++;
}

// Nome do arquivo
$nomeArquivo = "emails_alunos.xlsx";

// Cabeçalhos para download
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header("Content-Disposition: attachment; filename=\"$nomeArquivo\"");
header('Cache-Control: max-age=0');

$writer = new Xlsx($spreadsheet);
$writer->save('php://output');
exit();
