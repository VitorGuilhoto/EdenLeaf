<?php
    include "../utils/conexao.php"; 
    session_start();
    // Recuperação de dados
    $nome=$_POST['nome'];
    $telefone=$_POST['telefone'];
    $email=$_POST['email'];
    $senha=$_POST['senha'];
    $cidade=$_POST['cidade'];

    $senha = md5($senha);

    // Inserção
    $sql="INSERT INTO usuario (id_usuario,nome,telefone,email,senha,cidade)
	VALUES(DEFAULT,'$nome','$telefone','$email','$senha','$cidade');";
    
    // Execução
    $resultado=pg_query($conecta,$sql);
    $qtde=pg_affected_rows($resultado);

    if ($qtde > 0)
    {

        echo '<script language="javascript">';
        echo "alert('Usuário salvo com sucesso!')";
        echo '</script>';

        
        if(isset($_SESSION['usuariologado']))
        {
            header("Location: ../index.php");
        }

        else
        {
            $_SESSION['email']=$email;
            $_SESSION['senha']=$senha;
            $_SESSION['cadastro']=true;
            header("Location: ../login/login_back.php");
        }
    }   

    else
    {
        echo '<script language="javascript">';
        echo "alert('Erro na gravação do usuário!')";
        echo '</script>';	
    }

    // Fecha a conexão com o PostgreSQL
    pg_close($conecta);
?>  