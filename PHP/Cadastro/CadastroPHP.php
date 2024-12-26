<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    include("util.php");

     // Estabelece a conexão com o banco de dados usando a função conecta
     $conn = conecta();

     //inicia a sessao
     session_start();

    // Recebe os dados do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $telefone = $_POST['telefone'];
    $endereco = $_POST['endereco'];
    $numendereco = $_POST['numendereco'];
    $cep = $_POST['cep'];

    

    //inserção de dados na tabela BDA
    $sql = "INSERT INTO tbl_usuario (nome_usuario, email_usuario, senha_usuario, telefone_usuario,endereco_usuario,numendereco_usuario,cep_usuario)
            VALUES (:nome, :email, :senha, :telefone, :endereco, :numendereco, :cep)";

   

    if ($conn) {
        // Prepara a consulta SQL
        $update = $conn->prepare($sql); 

        // Associa os valores aos parâmetros da consulta SQL
        $update->bindParam(':nome', $nome);
        $update->bindParam(':email', $email);
        $update->bindParam(':senha', $senha);
        $update->bindParam(':telefone', $telefone);
        $update->bindParam(':endereco', $endereco);
        $update->bindParam(':numendereco', $numendereco);
        $update->bindParam(':cep', $cep);

        
        // Executa a consulta SQL
        $update->execute();

        //header('Location: Home.html');

    }
} else {
    echo "Formulário não enviado";
}
?>