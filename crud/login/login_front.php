<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/fundinho.css">
        <link rel="shortcut icon" href="../imagem/favicon.ico" type="image/x-icon">
        <link  rel="stylesheet"  href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <script src="https://kit.fontawesome.com/cae157d5c6.js" crossorigin="anonymous"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
        <title>Miçangato</title>
    </head>
    <body>
        <div class="bloco_cad">
            <form method="post" class="meio_cad" action="login_back.php">
                <div class="titulo_cad" id="login">
                    <h2>Login</h2>
                </div>
                <div class="interno_cad">
                    <div class="forma_cad"> 
                        <label for="usuario">Usuário:</label><br>
                        <input type="text" class="form-control" id="email" name="email" autocomplete = "off">
             
                    </div>
                    <div class="forma_cad">
                        <label for="senha">Senha:</label>

                        <input type="password" class="form-control" id="senha" name="senha">
                    </div>
                </div>
                <br>

                <br>
                <div class="fim_cad">    

                    <input type="submit" class="submit" value="Logar"><br>

                    <div class="space"><p>Não tem cadastro? <a href='../cadastros/cad_novo_usuarios_front.php' class="final_login">Cadastre-se</a></p></div>

                </div>
            </form>
        </div>
    </body>
</html>