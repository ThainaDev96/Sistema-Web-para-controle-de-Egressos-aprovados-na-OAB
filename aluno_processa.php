<?php
include 'conexao.php';
date_default_timezone_set('America/Sao_Paulo');//fuso horário


//?? '' se campo não existir é string vazia evita erros.
// Recebe dados do formulário via POST
$id           = $_POST['id'] ?? '';
$matricula    = $_POST['matricula'] ?? '';
$nome         = $_POST['nome'] ?? '';
$telefone     = $_POST['telefone'] ?? '';
$celular      = $_POST['celular'] ?? '';
$email        = $_POST['email'] ?? '';
$aprovado_oab = $_POST['aprovado_oab'] ?? '';
$tipo         = $_POST['tipo'] ?? '';
$mensagem     = "";

//UPLOADS
$doc_caminho = "NULL"; // padrão caso não envie arquivo

if (!empty($_FILES['documento']['name'])) { 
    $pasta = "uploads/"; // declara a pasta do projeto
    $nomeDoArquivo = basename($_FILES['documento']['name']);//pega o nome original do arquivo
    $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));//passa para nome + entensão pdf

    // Verifica se é PDF
    if ($extensao != "pdf") {
        die("Tipo de arquivo não aceito, apenas PDF!");
    }

    $caminho = $pasta . $nomeDoArquivo;//monta o caminho :uploads/nome_do_arquivo.pdf

    if (move_uploaded_file($_FILES['documento']['tmp_name'], $caminho)) { //função que move o arquivo da pasta temporária do PHP para a pasta uploads.
        $doc_caminho = "'$caminho'"; // para gravar o caminho no banco

    
    // ===== SALVA CAMINHO NA TABELA arquivos =====
    $sqlArq = "INSERT INTO arquivos (caminho) VALUES ('$caminho')";
    $conn->query($sqlArq);
    // =============================================
    
    // ====== INSERE LOG DE UPLOAD ======
    $data_hora = date('Y-m-d H:i:s');
    $acao = "upload";
    $sqlLog = "INSERT INTO logs (data_hora, matricula, aluno, documento, acao)
            VALUES ('$data_hora', '$matricula', '$nome', '$nomeDoArquivo', '$acao')";
    $conn->query($sqlLog);
    // ==================================

    } else {
        die("Erro ao salvar o arquivo! Verifique permissão da pasta uploads.");
    }
}

// INSERIR
if ($tipo == "Salvar") {
    if ($aprovado_oab == 's') {
        $aprovado_oab = "'s'";
    } else {
        $aprovado_oab = "NULL";
    }
    $sql = "INSERT INTO alunos (matricula, nome, telefone, celular, email, aprovado_oab,doc_oab) 
            VALUES ('$matricula', '$nome', '$telefone', '$celular', '$email', $aprovado_oab,$doc_caminho)";
    $mensagem = "Inserido com Sucesso!!";

      // ====== INSERE LOG DE INSERÇÃO ======
    
    $data_hora = date('Y-m-d H:i:s');
    $documento = ($doc_caminho != "NULL") ? basename($_FILES['documento']['name']) : "-";
    $acao = "inserção";
    $sqlLog = "INSERT INTO logs (data_hora, matricula, aluno, documento, acao)
            VALUES ('$data_hora', '$matricula', '$nome', '$documento', '$acao')";
    $conn->query($sqlLog);

}

    /*//inserindo no log
    $sql = "INSERT INTO log (matricula, nome, data) 
            VALUES ('$matricula', '$nome', 'CURDATE()')";   
            
            INSERT INTO your_table (your_date_column) VALUES (CURDATE());*/     
    


// ATUALIZAR
if ($tipo == "Atualizar") {
    if ($aprovado_oab == 's') {
        $aprovado_oab = "'s'";
    } else {
        $aprovado_oab = "NULL";
    }
    $sql = "UPDATE alunos SET 
                matricula='$matricula', 
                nome='$nome', 
                telefone='$telefone', 
                celular='$celular', 
                email='$email', 
                aprovado_oab=$aprovado_oab,
                doc_oab=$doc_caminho
            WHERE id=$id";
    $mensagem = "Atualizado com Sucesso!!";

      // ====== INSERE LOG DE ATUALIZAÇÃO ======
    $data_hora = date('Y-m-d H:i:s');
    $documento = ($doc_caminho != "NULL") ? basename($_FILES['documento']['name']) : "-";
    $acao = "atualização";
    $sqlLog = "INSERT INTO logs (data_hora, matricula, aluno, documento, acao)
               VALUES ('$data_hora', '$matricula', '$nome', '$documento', '$acao')";
    $conn->query($sqlLog);
    // ========================================
}


// DELETAR 
if ($tipo == "Deletar") {
    //Buscar os dados do aluno antes de deletar para poder registrar o log
    $sqlSelect = "SELECT matricula, nome FROM alunos WHERE id=$id";
    $result = $conn->query($sqlSelect);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc(); // pega os dados do aluno

        // Comando
        $sql = "DELETE FROM alunos WHERE id=$id";
        if ($conn->query($sql) === TRUE) {
            $mensagem = "Deletado com Sucesso!!";

            // ====== INSERE LOG DE EXCLUSÃO ======
            $data_hora = date('Y-m-d H:i:s');
            $acao = "deletado";
            $sqlLog = "INSERT INTO logs (data_hora, matricula, aluno, documento, acao)
                       VALUES ('$data_hora', '{$row['matricula']}', '{$row['nome']}', '-', '$acao')";
            $conn->query($sqlLog);

        } else {
            $mensagem = "Erro ao deletar: " . $conn->error;
        }

    } else {
        $mensagem = "Aluno não encontrado!";
    }
}   
    // ========================================


// Executa a query
if ($conn->query($sql) === TRUE) {
    echo $mensagem;
} else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
}
//fazer try catch no arquivo de conexao e executa query
$conn->close();
?>
