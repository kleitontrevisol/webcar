<?php include 'admin/includes/conexao.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="css/estilo.css">
        <title>Web car - Empresa</title>
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
    						<li><a class="active" href="empresa.php">Empresa</a></li>
    						<li><a href="estoque.php">Estoque</a></li>	
    						<li><a href="localizacao.php">Localização</a></li>
    						<li><a href="contato.php">Contato</a></li>
                            <li><a href="admin/index.php">Login</a></li>
    					</ul>
    				</div>
    			</div>
    		</div>
    		<div class="header-banner" style="background:url(images/banner2.jpg); height: 220px;">
    		  <div class="content-banner"><h1>Empresa</h1></div>	
    		</div>
    		<div class="content">
            <?php 
                $sql = mysql_query("SELECT * FROM empresas");
                $row = mysql_fetch_array($sql);
            ?>
                <div class="conteudo-site">
                    <p>
                        <?php echo $row['descricao']; ?>
                    </p>
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
