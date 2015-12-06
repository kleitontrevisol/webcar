<?php include 'admin/includes/conexao.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Web Cars</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <link rel="stylesheet" type="text/css" href="css/estilo.css"/>
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
                            <li><a class="active" href="index.php">Home</a></li>
                            <li><a href="empresa.php">Empresa</a></li>
                            <li><a href="estoque.php">Estoque</a></li>  
                            <li><a href="localizacao.php">Localização</a></li>
                            <li><a href="contato.php">Contato</a></li>
                            <li><a href="admin/index.php">Login</a></li>
    					</ul>
    				</div>
    			</div>
    		</div>
    		<div class="header-banner">
    			<img src="images/banner.jpg" alt="banner"/>
    		</div>
    		<div class="ofertas">
    			<h2>Ofertas de carros</h2>
                <?php 
                $sql = mysql_query("SELECT * FROM veiculos order by id LIMIT 3");
                while ($row = mysql_fetch_array($sql)) {
                ?>
    			<div class="ofertas-item">
    				<img src="admin/images/<?php echo $row['imagem']; ?>" alt="<?php echo $row['modelo']; ?>" width="290"/>
    				<span>
    					<b>Marca:</b> <?php echo $row['marca']; ?>	
    				</span>
    				<span>
    					<b>Modelo:</b> <?php echo $row['modelo']; ?>
    				</span>
    				<span>
    					<b>Ano:</b> <?php echo $row['ano']; ?>
    				</span>
    				<span><a href="estoque.php?id=<?php echo $row['id']; ?>">>> Ver carro</a></span>
    			</div>
    			<?php 
                }
                ?>
    		</div>
    		<div class="rodape">
    			<div class="copright">
    				Copyright © 2013 webcar. All rights reserved
    			</div>
    		</div>
    	</div>
    </body>
</html>
