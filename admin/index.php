
<?php
  session_start();
  if (isset($_SESSION["usuario"])){
    header("Location:principal.php");
    exit;
  }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="css/estilo_adm.css">
        <title>ADM</title>
    </head>
    <body>
    	<div class="home">
    		<div class="login">
                <?php 
                if (isset($_GET['error']) == "fail") {
                    echo "<div class='error msg'>Usuário e senha incorretos</div>";
                }
                ?>
                <form action="includes/valida_usuario.php" method="post">
                    <h1><b>Acesso area adminiatrativa</b></h1><br>
                    Usuario:<br>
                    <input type="text" name="usuario" size="30"><br>
                    Senha:<br>
                    <input type="password" name="senha" size="30"><br>
                    <button type="submit"/>Entrar</button>
                </form>
            </div>
    	</div>
    </body>
</html>
