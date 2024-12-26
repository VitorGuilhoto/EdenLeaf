<?php
    include "../utils/conexao.php"; 

    /* seleciona todos os itens do carrinho do usuário */
    $sql="SELECT c.*,
                 p.preco,
                 c.quantidade * p.preco as subtotal,
                 p.nome,
                 p.estoque
            FROM carrinho c
           inner join produto p
              on c.id_produto = p.id_produto
           WHERE c.id_usuario = $id_usuario
           ORDER BY p.nome;";

    // $sql2 = "SELECT quantidade FROM carrinho WHERE id_usuario = $id_usuario";

    $resultado= pg_query($conecta, $sql);
    $qtde=pg_num_rows($resultado);

    $resultado_lista = null;

    if ($qtde > 0)
    {
        $resultado_lista=pg_fetch_all($resultado);
    }
    // $resultado2 = pg_query($conecta, $sql2);
    // $qtdeVendida = 

    // Fecha a conexão com o PostgreSQL
    pg_close($conecta);

    session_start();
    $_SESSION['produto'] = $resultado_lista;
?>