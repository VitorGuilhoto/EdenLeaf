<?php
    ini_set ( 'display_errors' , 1); 
    error_reporting (E_ALL);

    include("util.php");

    $conn = conecta();

    if (isset($_GET['codProduto'])) {
        $codProduto = $_GET['codProduto']; 
    } else {
        $codProduto = ""; 
    }

    if ($codProduto <> "") {
      
        $sql = "select * from tbl_produto 
                where cod_produto=$codProduto";
        
        // faz um select basico
        $select = $conn->query($sql)->fetch();
  
        $IncluiOuAtualiza = "salvarProdutos.php";
  
        $varCod       = $select['cod_produto'];
        $varDescricao = $select['descricao_produto'];
        $varValor     = $select['preco_produto'];
        $varExcluido     = $select['excluido_produto'];
    }

    else {

        $IncluiOuAtualiza = "IncluirProdutos.php";
  
        $varCod       = "";
        $varDescricao = "";
        $varValor     = "";
        $varExcluido     = "";
  
    }

    $varHTML = "
     <html><header></header>
      <body>
        <form action='".$IncluiOuAtualiza."' method='post'>
          <input type='hidden'  name='cod_produto'   value = '$varCod'>
          <br>Descricao<br>
          <input type='text'    name='descricao'     value = '$varDescricao'>
          <br>Valor<br>
          <input type='text'    name='valor'         value = '$varValor'>
          <br>Excluido<br>
          <input type='text'    name='excluido'         value = '$varExcluido'>
          <input type='submit' value='Salvar'>
        </form>
      </body>
     </html
     ";
     
   echo $varHTML;
   
?>
