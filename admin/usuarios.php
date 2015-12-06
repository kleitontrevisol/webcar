<?php
include 'includes/permissao.php'; 
include 'includes/conexao.php'; 

if(@$_POST['add']) {
    $senha = md5(@$_POST[senha]);
    $usuario = $_POST['usuario'];
    $result = mysql_query("SELECT * FROM usuarios WHERE usuario = '$usuario' AND SENHA");
    if(mysql_num_rows ($result) > 0){
        echo"<script>alert('Usuário já existente!');</script>";
    }elseif(mysql_num_rows ($result) <= 0){
        mysql_query("INSERT INTO usuarios VALUES(null, '$_POST[nome]', '$usuario', '$senha')");
        header("Location: usuarios.php");
    }
}

if(@$_POST['edit']){
    $senha = md5($_POST[senha]);
    mysql_query("UPDATE usuarios SET nome = '$_POST[nome]', usuario = '$_POST[usuario]', senha = '$senha' WHERE id = '$_GET[id]'");
    header("Location: usuarios.php");
}

if(@$_GET[acao] == 'excluir'){
    mysql_query("DELETE FROM usuarios WHERE id = '$_GET[id]'");
    header("Location: usuarios.php");
}
?>

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
                    <?php if(@!$_GET['acao']) : ?>
                        <h2>Usuarios cadastrados</h2>
                        <div class="btn-add">
                            <a href="usuarios.php?acao=add">+ Adicionar Usuario</a>
                        </div>  

                        <table class="lista-registros" border="1">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Usuario</th>
                                    <th>Ações</th>
                                </tr>    
                            </thead>
                            <tbody>
                                <?php 
                                $sql = mysql_query("SELECT * FROM usuarios");
                                while ($row = mysql_fetch_array($sql)) { 
                                ?>
                                <tr>
                                    <td><?php echo $row['nome']; ?></td>
                                    <td><?php echo $row['usuario']; ?></td>
                                    <td class="acoes">
                                        <a href="usuarios.php?acao=edit&id=<?php echo $row['id']; ?>">Editar</a>
                                        <a href="usuarios.php?acao=excluir&id=<?php echo $row['id']; ?>">Excluir</a>
                                    </td>
                                </tr>
                                <?php 
                                }
                                ?>
                            </tbody>
                        </table>
                    <?php endif; ?>
                    <?php if(@$_GET['acao'] == "add") : ?>
                    <form action="usuarios.php" enctype="multipart/form-data" method="post">
                        <h2>Cadastrar usuario</h2>
                        <br>
                        <label>Nome:</label><br>
                        <input type="text" name="nome"/><br>

                        <label>Usuario:</label><br>
                        <input type="text" name="usuario"/><br>

                        <label>Senha:</label><br>
                        <input type="password" name="senha"/><br><br>

                        <input type="submit" name="add" value="cadastrar"/>
                    </form>
                    <?php endif; ?>
                    <?php 
                    if(@$_GET['acao'] == "edit") : 
                        $sql = mysql_query("SELECT * FROM usuarios WHERE id = '$_GET[id]'");
                        $row = mysql_fetch_array($sql);
                    ?>
                    <form action="usuarios.php?id=<?php echo $_GET['id']; ?>" enctype="multipart/form-data" method="post">
                        <h2>Alterar usuario</h2>
                        <br>
                        <label>Nome:</label><br>
                        <input type="text" value="<?php echo $row['nome']; ?>" name="nome"/><br>

                        <label>Usuario:</label><br>
                        <input type="text" value="<?php echo $row['usuario']; ?>" name="usuario"/><br>

                        <label>Senha:</label><br>
                        <input type="password" name="senha"/><br><br>

                        <input type="submit" name="edit" value="Alterar"/>
                    </form>
                    <?php endif; ?>
                </div>
            </div>
    	</div>
    </body>
</html>