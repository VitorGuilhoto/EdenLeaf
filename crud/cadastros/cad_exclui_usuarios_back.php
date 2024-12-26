<?php
    include "../utils/conexao.php"; 

    //dados enviados do script exclui_prod_chamada_confirma_exclusao_logica.php
    $id_usuario = $_POST['id_usuario'];
    
    $sql="UPDATE usuario SET excluido=true WHERE id_usuario = $id_usuario";

    //echo $sql;

    $resultado=pg_query($conecta,$sql);
    $qtde=pg_affected_rows($resultado);

    if ($qtde > 0 )
        echo "<script type='text/javascript'>alert('Exclusão OK !!!')</script>";
    else
        echo "<script type='text/javascript'>alert('Erro na exclusão !!!')</script>";

    echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=cad_pesq_usuarios_front.php'>";
?>
