<?php
    include "conexao_venda.php"; 

    $compraFinalizada = FALSE;

    function validarProdutos($resultado_lista) //validar para saber se tem estoque 
    { // projeto final
        // iniciar com o login
        // ESSE CODIGO ESTÁ INCOMPLETO!!!
        //$valor = $linha['valor'];
        //$id_usuario = $linha['id_usuario'];
        // $id_usuario = 2;
        //$id_produto = $linha['id_produto'];
         $id_produto = 1;


        
        //Realizar as validações com os produtos aqui
        if($resultado_lista)
            foreach($resultado_lista as $linha)
            {
                $sql = "SELECT estoque FROM produto WHERE id_produto = ".$id_produto.";"; // ISSO AQUI TA CERTO PLMDD
                //  var_dump($res);
                echo $sql;
                $res = pg_query($conecta, $sql);
                 //echo $linha['estoque'];
                //  var_dump($sql);
                 var_dump($res);
                 //if ($qtde == 0) // pode ser a variável estoque ?
                 //  return false;
            }

        return true;
    }

    // function atualizarEstoque($id_produto, $qtdeVendida) // $qtdeVendida
    // {
    //     // ESSE CODIGO ESTÁ INCOMPLETO!!!

    //     $sql = "UPDATE produto 
    //             SET estoque = estoque-1
    //             WHERE id_produto = ".$id_produto.";";
    //     $res = pg_query($conecta, $sql);
    //     echo $sql;
           
    // }

    session_start();
    $resultado_lista = $_SESSION['produto'];

    // validarProdutos($resultado_lista); 
    
    $sql = "INSERT INTO venda (id_venda, id_usuario, dat) VALUES (DEFAULT, $id_usuario, NOW());";
    //echo "$sql";

    $res = pg_query($conecta, $sql);
    $qtdLinhas = pg_affected_rows($res);

    if ($qtdLinhas == 0)
        echo "<h1>Erro ao Finalizar a Compra!!!</h1>";

    //var_dump($resultado_lista); // ver o conteúdo do array - teste para ver
    if($resultado_lista)
        foreach($resultado_lista as $linha)
        { 

            $qtdeVendida=$linha['quantidade'];
            $preco = $linha['preco'];
            $id_produto = $linha['id_produto'];
            $estoque = $linha['estoque'];
            // $quantidade = $linha['quantidade'];
            

            //$sql = "INSERT INTO itemvenda (id_itemvenda, id_venda, id_produto, quantidade) VALUES (DEFAULT,(CURRVAL('id_venda'),".$id_produto.",".$quantidade.");";
            $sql = "INSERT INTO itemvenda (id_item_venda, id_produto, id_venda, estoque, preco) VALUES (DEFAULT,".$id_produto.", CURRVAL('venda_id_venda_seq'),".$estoque.",".$preco.");";
            // echo $sql;
            $res = pg_query($conecta, $sql);

            // Atualizar qtde estoq0ue 
            // (ainda precisa programar)
            // if ($linha['quantidade'] <= $linha['estoque'])
            // {
                $sql = "UPDATE produto SET estoque = estoque - $qtdeVendida WHERE id_produto=$id_produto;";
                pg_query($conecta,$sql);
            // }
            // else    
            // {
            //     echo '<script language="javascript">';
            //     echo "alert('Não há produtos suficientes, você pediu: ".$linha['quantidade']. ", mas temos disponível no estoque: ".$linha['estoque'].".')";
            //     echo '</script>';
                
            //     echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=selecao_produtos_front.php'>";
            //     exit;
            // }
        }  

        // echo '<script language="javascript">';
        // echo "alert('Código produto:".$id_produto."')";
        // echo '</script>';

        // echo '<script language="javascript">';
        // echo "alert('Código usuario:".$id_usuario."')";
        // echo '</script>';

    // Limpar carrinho
    $sql="DELETE FROM carrinho
            where id_usuario = $id_usuario;"; 
    pg_query($conecta,$sql);
    // Fecha a conexão com o PostgreSQL
    pg_close($conecta);

?>