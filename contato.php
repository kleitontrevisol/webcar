<?php include 'admin/includes/conexao.php'; ?>
<?php 
if(@$_POST['envia-contato']){
    mysql_query("INSERT INTO contatos VALUES(null, '$_POST[nome]', '$_POST[email]', '$_POST[assunto]', '$_POST[mensagem]')");
    header("Location: contato.php?msg=sucesso");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <link rel="stylesheet" type="text/css" href="css/estilo.css"/>
        <title>Web car - Contato</title>
         <script type="text/javascript">
            function validar() {
                var nome = form.nome.value;
                var email = form.email.value;
                var assunto = form.assunto.value;
                var mensagem = form.mensagem.value;

                if (nome == "") {
                    alert('Preencha o campo com seu nome');
                    form.nome.focus();
                    return false;
                }

                if (email == "") {
                    alert('Preencha o campo com seu email');
                    form.email.focus();
                    return false;
                }

                if (assunto == "") {
                    alert('Preencha o campo com assunto');
                    form.assunto.focus();
                    return false;
                }        

                if (mensagem == "") {
                    alert('Preencha o campo com sua mensagem');
                    form.mensagem.focus();
                    return false;
                }

            }
        </script>       
    </head>
    
    <body>
    	<div class="home">
    		<div class="header">
    			<div class="conteudo">
    				<div class="logo">
    					<a href="index.php"><img src="images/logo.png" alt="Web cars"/></a>
    				</div>
    				<div class="menu">
    					<ul>
    						<li><a href="index.php">Home</a></li>
    						<li><a href="empresa.php">Empresa</a></li>
    						<li><a href="estoque.php">Estoque</a></li>	
    						<li><a href="localizacao.php">Localização</a></li>
    						<li><a class="active" href="contato.php">Contato</a></li>
                            <li><a href="admin/index.php">Login</a></li>
    					</ul>
    				</div>
    			</div>
    		</div>
    		<div class="header-banner" style="background:url(images/banner2.jpg); height: 220px;">
    		  <div class="content-banner"><h1>Contato</h1></div>	
    		</div>
    		<div class="content">
                <div class="conteudo-site contato">
                    <form name="form" action="contato.php" method="post">
                        <h2>Entre em contato conosco</h2><br>
                        <?php if(@$_GET['msg']) : ?>
                            <div class="msg-sucesso">Obrigado, mensagem enviada com sucesso!</div>
                        <?php endif; ?>
                        <br>
                        Nome:<br>
                        <input type="text" name="nome" maxlength="40"/><br>
                        Email:<br>
                        <input type="text" name="email" maxlength="40"/><br>
                        Assunto:<br>
                        <input type="text" name="assunto" maxlength="40"/> <br>
                        Mensagem:<br>
                        <textarea maxlength="150" name="mensagem" style="width:200px;"></textarea><br>
                        <input type="submit" onclick="return validar()" name="envia-contato" value="Enviar"/>
                    </form>    
                </div>
            </div>
    		<div class="rodape">
    			<div class="copright">
    				Copyright © 2013 webcar. All rights reserved
    			</div>
    		</div>
    	</div>
    </body>
</html>
