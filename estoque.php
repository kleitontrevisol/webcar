<?php include 'admin/includes/conexao.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="css/estilo.css">
        <title>Web car - Estoque</title>
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
                            <li><a class="active" href="estoque.php">Estoque</a></li>  
                            <li><a href="localizacao.php">Localização</a></li>
                            <li><a href="contato.php">Contato</a></li>
                            <li><a href="admin/index.php">Login</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="header-banner" style="background:url(images/banner2.jpg); height: 220px;">
              <div class="content-banner"><h1>Estoque de veiculos</h1></div>    
            </div>
            <div class="ofertas">
                <?php if(@!$_GET['id']) : ?>
                    <?php 
                    $sql = mysql_query("SELECT * FROM veiculos");
                    while ($row = mysql_fetch_array($sql)) {
                    ?>
                    <div class="ofertas-item oferta-veiculos">
                        <img src="admin/images/<?php echo $row['imagem']; ?>" width="290" alt="<?php echo $row['modelo']; ?>"/>
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
                <?php endif; ?>  

                <?php 
                if(@$_GET['id']) : 
                    $sql = mysql_query("SELECT * FROM veiculos WHERE id = '$_GET[id]'");
                    $row = mysql_fetch_array($sql);
                ?>
                    <div class="ofertas-item oferta-veiculos-item">
                        <img src="admin/images/<?php echo $row['imagem']; ?>" alt="<?php echo $row['modelo']; ?>" width="500"/>
                        <span>
                            <b>Marca:</b> <?php echo $row['marca']; ?>  
                        </span>
                        <span>
                            <b>Modelo:</b> <?php echo $row['modelo']; ?>
                        </span>
                        <span>
                            <b>Ano:</b> <?php echo $row['ano']; ?>
                        </span>
                        <span><a href="estoque.php">voltar</a></span>
                    </div>
                <?php endif; ?> 

            </div>
            <div class="rodape">
                <div class="copright">
                    Copyright © 2013 webcar. All rights reserved
                </div>
            </div>
        </div>
    </body>
</html>
