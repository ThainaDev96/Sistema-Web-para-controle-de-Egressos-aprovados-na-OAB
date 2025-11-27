<?php
require 'ler/vendor/autoload.php';
include 'conexao.php';
date_default_timezone_set('America/Sao_Paulo');//fuso horário

use PhpOffice\PhpSpreadsheet\IOFactory;

// removido o header JSON (não é mais via AJAX)
// header('Content-Type: application/json');

$data = [
    'status' => 'error',
    'message' => ''
];

if (isset($_FILES['arquivo_excell']) && $_FILES['arquivo_excell']['error'] === UPLOAD_ERR_OK) {
    $pasta = "uploads/"; 
    $nomeDoArquivo = $_FILES['arquivo_excell']['name'];
    $tmpName = $_FILES['arquivo_excell']['tmp_name'];

    // Extensão do arquivo
    $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));

    // Verifica se é xls ou xlsx
    if ($extensao != "xls" && $extensao != "xlsx") {
        echo "Tipo de arquivo não aceito, apenas XLS ou XLSX!";
        exit;
    }

    // Caminho final
    $caminho = $pasta . $nomeDoArquivo;

    // Move arquivo para a pasta uploads
    if (!move_uploaded_file($tmpName, $caminho)) {
        echo "Erro ao salvar o arquivo! Verifique a permissão da pasta uploads.";
        exit;
    }
    // ===== SALVA CAMINHO NA TABELA arquivos =====
    $sqlArq = "INSERT INTO arquivos (caminho) VALUES ('$caminho')";
    $conn->query($sqlArq);
    // =============================================

    try {
        $spreadsheet = IOFactory::load($caminho);
        $sheet = $spreadsheet->getActiveSheet();

        // Pular cabeçalho (começa na linha 2)
        foreach ($sheet->getRowIterator(2) as $row) {
            $cellIterator = $row->getCellIterator();
            $cellIterator->setIterateOnlyExistingCells(false);

            // Lê colunas específicas:
            $linhaIndex = $row->getRowIndex();
            $matricula = $sheet->getCell('A' . $linhaIndex)->getValue(); 
            $nome  = $sheet->getCell('B' . $linhaIndex)->getValue(); 
            $email = $sheet->getCell('C' . $linhaIndex)->getValue(); 
            $telefone = $sheet->getCell('D' . $linhaIndex)->getValue(); 
            $id_fdb = $sheet->getCell('E' . $linhaIndex)->getValue(); 
            $celular = $sheet->getCell('F' . $linhaIndex)->getValue(); 
            
            $sql = "INSERT INTO alunos (matricula, nome, email, telefone, id_fdb, celular) 
                VALUES ('$matricula', '$nome', '$email', '$telefone', '$id_fdb', '$celular')";

            mysqli_query($conn, $sql);
        }

        // ======= INSERE LOG DE IMPORTAÇÃO ========
        $data_hora = date('Y-m-d H:i:s');
        $acao = "importação";

        // Nome do arquivo importado
        $documento = $nomeDoArquivo;

        // Registro no log indicando que foi o ADMINISTRADOR
        $sqlLog = "INSERT INTO logs (data_hora, matricula, aluno, documento, acao)
                VALUES ('$data_hora', '-', 'Administrador', '$documento', '$acao')";

        $conn->query($sqlLog);
        // =========================================


        $data['status'] = 'success';
        $data['message'] = "Arquivo processado com sucesso!";

    } catch (Exception $e) {
        echo "Erro ao ler o arquivo: " . $e->getMessage();
        exit;
    }

    /* Deletar o arquivo após processar
    if (file_exists($caminho)) {
        unlink($caminho);
    }*/

    echo $data['message'];
    exit;
}

echo "Nenhum arquivo enviado ou erro no upload!";
exit;
?>
