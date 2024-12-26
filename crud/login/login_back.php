<?php
    session_start();
    // script foi chamado de index.php
    include "../utils/conexao.php"; 

    if($_SESSION['cadastro']==true)
    {
        $email=$_SESSION['email'];
        $senhacripto=$_SESSION['senha'];
        $_SESSION['cadastro']=false;
        $_SESSION['email']="";
        $_SESSION['senha']="";
    }

    else
    {
        $email = $_POST["email"];
        $senhacripto = MD5($_POST["senha"]);
    }

    

    //$senha = md5($senha); //ou se a senha estiver oculta
    $sql = "SELECT * from usuario where email = '$email' and senha = '$senhacripto' ";

    $res = pg_query($conecta, $sql);
    if (pg_num_rows($res) > 0)
    {
        $linha = pg_fetch_array($res);

        $_SESSION["usuariologado"] = $linha;
        $_SESSION["isadm"] = $linha['adm']; //um arquivo bin que cria automaticamente, na teoria
        echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=../index.php'>";

        echo '<script language="javascript">';
        echo "alert('Seja bem-vindo (a) ".$linha['nome']."!')";
        echo '</script>';	

        echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=../index.php'>";
    }

    else
    {
        echo '<script language="javascript">';
        echo "alert('Usuário ou senha inválidos!')";
        echo '</script>';	

        echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=login_front.php'>";
    }
?>