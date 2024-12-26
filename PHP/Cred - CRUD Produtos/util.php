<?php 

  // Envio de emails
  // Marcelo C Peres 2023
  /* Exemplo: 
     if ( EnviaEmail ('fulano@fulano','Feliz Aniversario',
                      '<html><body>Feliz niver</body></html>') 
     {
      echo 'enviado com sucesso';
     }
  */   
     
  ////////////////////////////////////////////////////////////////
  function EnviaEmail ( $pEmailDestino, $pAssunto, $pHtml, 
                        $pUsuario = "marcelocabello@projetoscti.com.br", 
                        $pSenha = "MarceloC@belo", 
                        $pSMTP = "smtp.projetoscti.com.br" )   
  {
    
   // troque usuario e senha !!!! 
   error_reporting(E_ALL);
   ini_set("display_errors", 1);
  
   require "PHPMailer/PHPMailerAutoload.php";
      
   try {
 
     //cria instancia de phpmailer
     echo "<br>Tentando enviar para $pEmailDestino...";
     $mail = new PHPMailer(); 
     $mail->IsSMTP();  
  
     // servidor smtp
     $mail->Host = $pSMTP;
     $mail->SMTPAuth = true;      // requer autenticacao com o servidor                         
     $mail->SMTPSecure = 'tls';                            
      
     $mail-> SMTPOptions = array (
       'ssl' => array (
       'verificar_peer' => false,
       'verify_peer_name' => false,
       'allow_self_signed' => true ) );
      
     $mail->Port = 587;      
      
     $mail->Username = $pUsuario; 
     $mail->Password = $pSenha; 
     $mail->From = $pUsuario; 
     $mail->FromName = "Suporte de senhas"; 
  
     $mail->AddAddress($pEmailDestino, "Usuario"); 
     $mail->IsHTML(true); 
     $mail->Subject = $pAssunto; 
     $mail->Body = $pHtml;
     $enviado = $mail->Send(); 
       
     if (!$enviado) {
        echo "<br>Erro: " . $mail->ErrorInfo;
     } else {
        echo "<br><b>Enviado!</b>";
     }
     return $enviado;         
      
   } catch (phpmailerException $e) {
     echo $e->errorMessage(); // erros do phpmailer
   } catch (Exception $e) {
     echo $e->getMessage(); // erros da aplica��o - gerais
   }      
  }


  /*
  * Fun��o para ExecutaSQL frases sql
  * marcelo c peres - 2023
  */

  function ExecutaSQL( $paramConn, $paramSQL ) 
  {
    // exec eh usado para update, delete, insert
    // eh um metodo da conexao
    // retorna o nro de linhas afetadas
    $linhas = $paramConn->exec($paramSQL);
  
    if ($linhas > 0) { 
        return TRUE; 
    } else { 
        return FALSE; 
    }  
  }

  /*
  * Fun��o para executasql frases sql
  * marcelo c peres - 2023
  */

  // ValorSQL 
  // retorna o valor de um campo de um select
  // Set 2023 - Marcelo C Peres 
  function ValorSQL( $pConn, $pSQL ) 
  {
   $linhas = $pConn->query($pSQL)->fetch();
  
   if ($linhas > 0) { 
       return $linhas[0]; 
   } else { 
       return "0"; 
   }  
  }


  /**
  * Fun��o para gerar senhas aleat�rias
  *
  * @author    Thiago Belem <contato@thiagobelem.net>
  *
  * @param integer $tamanho Tamanho da senha a ser gerada
  * @param boolean $maiusculas Se ter� letras mai�sculas
  * @param boolean $numeros Se ter� n�meros
  * @param boolean $simbolos Se ter� s�mbolos
  *
  * @return string A senha gerada
  */

  function GeraSenha($tamanho = 8, $maiusculas = true, $numeros = true, $simbolos = false)
  {
    //$lmin = 'abcdefghijklmnopqrstuvwxyz';
    $lmai = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $num = '1234567890';
    $simb = '!@#$%*-';
    $retorno = '';
    $caracteres = '';

    //$caracteres .= $lmin;
    if ($maiusculas) $caracteres .= $lmai;
    if ($numeros)    $caracteres .= $num;
    if ($simbolos)   $caracteres .= $simb;

    $len = strlen($caracteres);
    
    for ($n = 1; $n <= $tamanho; $n++) {
        $rand = mt_rand(1, $len);
        $retorno .= $caracteres[$rand-1];
    }
    
    return $retorno;
  }

  //////  funcao de conexao
  //////  14-8-2023
  function conecta ($params = "")  // igual a nada pra indicar q aceita vazio !! 
  {
    if ($params == "") {
        $params="pgsql:host=pgsql.projetoscti.com.br; dbname=projetoscti20; 
                 user=projetoscti20; password=720689";
    }

    $varConn = new PDO($params);

    if (!$varConn) {
        echo "Nao foi possivel conectar";
    } else { return $varConn; }
  }
  /////////////////////////

  //////  funcao de login
  //////  11-9-2023
  function funcaoLogin ($paramLogin, $paramSenha, &$paramAdmin)  
  {
   $conn = conecta();  
   $varSQL = " select senha,admin from usuarios 
               where usuario = '$paramLogin' "; 
   $linha =  $conn->query($varSQL)->fetch();
   $paramAdmin = $linha['admin'] == 's';
   return $linha['senha'] == $paramSenha;  
  }

  //////  funcao de definir cookie
  //////  11-9-2023
  function DefineCookie($paramNome, $paramValor, $paramMinutos) 
  {
   echo "Cookie: $paramNome Valor: $paramValor";  
   setcookie($paramNome, $paramValor, time() + $paramMinutos * 60); 
  }
?>