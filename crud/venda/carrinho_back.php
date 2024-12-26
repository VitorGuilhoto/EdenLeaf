<?php
    include "../utils/conexao.php"; 

    // Verifica se o produto já está no carrinho
    function getQtdeProdutoCarrinho($conecta, $id_usuario, $id_produto) {

        /* seleciona o carrinho */
        $sql="SELECT quantidade
                FROM carrinho
               WHERE id_usuario = $id_usuario
                 AND id_produto = $id_produto";

        $resultado=pg_query($conecta,$sql);
        $qtde=pg_num_rows($resultado);

        if ( $qtde == 0 )
            return 0;
        
        // retornará a quantidade atual do item já existente no carrinho
        $produto_carrinho = pg_fetch_array($resultado);
        return intval($produto_carrinho['quantidade']);
    }

    function addCarrinho($conecta, $id_usuario, $id_produto) {

        $qtdeProduto = getQtdeProdutoCarrinho($conecta, $id_usuario, $id_produto);

        // Se o produto ainda não existe no carrinho
        if ($qtdeProduto == 0) {
            // Insere o produto
            $sql="INSERT INTO carrinho 
                (id_produto, id_usuario, quantidade)   VALUES 
                ($id_produto, $id_usuario, 1);";
        }
        else {
            $sql="UPDATE carrinho
                     set quantidade = ".($qtdeProduto + 1).
                  "where id_produto = $id_produto
                     and id_usuario = $id_usuario";
        }

        // Execução
        pg_query($conecta,$sql);
    }


    function removeCarrinho($conecta, $id_usuario, $id_produto) {
        $sql="DELETE FROM carrinho
               where id_produto = $id_produto
                 and id_usuario = $id_usuario";

        // Execução
        pg_query($conecta,$sql);
    }

    function updateCarrinho($conecta, $id_usuario, $prods) {

        //var_dump($prods);

        foreach($prods as $id_produto => $qtd){
            $sql="UPDATE carrinho
                    set quantidade = $qtd
                where id_produto = $id_produto
                    and id_usuario = $id_usuario";
            
            pg_query($conecta,$sql);
        }
    }
    function add1($conecta, $id_usuario, $id_produto) {

        $sql="UPDATE carrinho
                 set quantidade = quantidade + 1
              where id_produto = $id_produto
                 and id_usuario = $id_usuario";
        pg_query($conecta,$sql);

    }

    function del1($conecta, $id_usuario, $id_produto) {

            $sql="UPDATE carrinho
                    set quantidade = quantidade - 1
                where id_produto = $id_produto
                    and id_usuario = $id_usuario";
            pg_query($conecta,$sql);

    }
    

    // Início do processamento

    if (!empty($acao))
    {
        if ($acao == 'add') {
            addCarrinho($conecta, $id_usuario, $id_produto);
        }
        else if($acao == 'del'){
            removeCarrinho($conecta, $id_usuario, $id_produto);
        }
        else if($acao == 'up'){
            updateCarrinho($conecta, $id_usuario, $prods);
        }
        else if($acao == 'add1'){
            add1($conecta, $id_usuario, $id_produto);
        }
        else if($acao == 'del1'){
            del1($conecta, $id_usuario, $id_produto);
        }

        // Modifica a url para remover qualquer uma das ações: add, del ou up, evita que a ação seja
        // processada novamente caso a página seja recarregada
        header("location:carrinho_front.php");
        return;
    }

    /* seleciona todos os itens do carrinho do usuário */
    $sql="SELECT c.*,
                 p.preco,
                 c.quantidade * p.preco as subtotal,
                 p.nome,
                 p.estoque /*as estoque*/
            FROM carrinho c
           inner join produto p
              on c.id_produto = p.id_produto
           WHERE c.id_usuario = $id_usuario
           ORDER BY p.nome;";

    $resultado= pg_query($conecta, $sql);
    $qtde=pg_num_rows($resultado);

    $resultado_lista = null;

    if ($qtde > 0)
    {
        $resultado_lista=pg_fetch_all($resultado);
    }

    // Fecha a conexão com o PostgreSQL
    pg_close($conecta);
?>