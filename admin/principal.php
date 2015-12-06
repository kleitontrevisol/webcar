<?php include 'includes/permissao.php' ?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="css/estilo_adm.css">
        <title>Adm</title>
    </head>
    <body>
    	<div class="home">
            <?php include "includes/header.php" ?>
            <div class="main-content">
                <!-- Menu -->
                <?php include "includes/menu.php"; ?>
                <div class="content">
                    <h2 >Home:Cadastros</h2>
                    <div class="menu-rapido">
                        <a href="usuarios.php">Usuarios</a>
                        <a href="veiculos.php">Veiculos</a>
                        <a href="veiculos.php">Empresa</a>
                        <a href="contatos.php">Contatos</a>
                    </div>
                </div>
            </div>
    	</div>
    </body>
</html>
