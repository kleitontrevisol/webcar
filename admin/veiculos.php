<?php 
include 'includes/permissao.php'; 
include 'includes/conexao.php'; 

if(@$_POST['add']) {
    $imagem = $_FILES['imagem']['name']; 
    $uploaddir = 'images/' . $imagem;
    
    move_uploaded_file($_FILES['imagem']['tmp_name'], $uploaddir);

    mysql_query("INSERT INTO veiculos VALUES(null, '$_POST[marca]', '$_POST[modelo]', '$_POST[ano]', '$imagem')");
    header("Location: veiculos.php");
}

if(@$_POST['edit']){
    mysql_query("UPDATE veiculos SET marca = '$_POST[marca]', modelo = '$_POST[modelo]', ano = '$_POST[ano]' WHERE id = '$_GET[id]'");
    header("Location: veiculos.php");
}

if(@$_GET[acao] == 'excluir'){
    $sql = mysql_query("SELECT * FROM veiculos WHERE id = '$_GET[id]'");
    $row = mysql_fetch_array($sql);

    unlink("images/" . $row['imagem']);
    mysql_query("DELETE FROM veiculos WHERE id = '$_GET[id]'");
    header("Location: veiculos.php");
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
                        <h2>Veiculos cadastrados</h2>
                        <div class="btn-add">
                            <a href="veiculos.php?acao=add">+ Adicionar Veiculo</a>
                        </div>  

                        <table class="lista-registros" border="1">
                            <thead>
                                <tr>
                                    <th>Marca</th>
                                    <th>Modelo</th>
                                    <th>Ano</th>
                                    <th>Ações</th>
                                </tr>    
                            </thead>
                            <tbody>
                                <?php 
                                $sql = mysql_query("SELECT * FROM veiculos");
                                while ($row = mysql_fetch_array($sql)) { 
                                ?>
                                <tr>
                                    <td><?php echo $row['marca']; ?></td>
                                    <td><?php echo $row['modelo']; ?></td>
                                    <td><?php echo $row['ano']; ?></td>
                                    <td class="acoes">
                                        <a href="veiculos.php?acao=edit&id=<?php echo $row['id']; ?>">Editar</a>
                                        <a href="veiculos.php?acao=excluir&id=<?php echo $row['id']; ?>">Excluir</a>
                                    </td>
                                </tr>
                                <?php 
                                }
                                ?>
                            </tbody>
                        </table>
                    <?php endif; ?>
                    <?php if(@$_GET['acao'] == "add") : ?>
                    <form action="veiculos.php" enctype="multipart/form-data" method="post">
                        <h2>Cadastrar veiculo</h2>
                        <br>
                        <label>Marca:</label><br>
                        <input type="text" name="marca"/><br>

                        <label>Modelo:</label><br>
                        <input type="text" name="modelo"/><br>

                        <label>Ano:</label><br>
                        <input type="text" name="ano"/><br>

                        <label>Imagem:</label><br>
                        <input type="file" name="imagem"/><br><br>
                        <input type="submit" name="add" value="cadastrar"/>
                    </form>
                    <?php endif; ?>
                    <?php 
                    if(@$_GET['acao'] == "edit") : 
                        $sql = mysql_query("SELECT * FROM veiculos WHERE id = '$_GET[id]'");
                        $row = mysql_fetch_array($sql);
                    ?>
                    <form action="veiculos.php?id=<?php echo $_GET['id']; ?>" enctype="multipart/form-data" method="post">
                        <h2>Alterar veiculo</h2>
                        <br>
                        <img height="200" src="images/<?php echo $row['imagem']; ?>"/>
                        <br>
                        <label>Marca:</label><br>
                        <input type="text" value="<?php echo $row['marca']; ?>" name="marca"/><br>

                        <label>Modelo:</label><br>
                        <input type="text" value="<?php echo $row['modelo']; ?>" name="modelo"/><br>

                        <label>Ano:</label><br>
                        <input type="text" value="<?php echo $row['ano']; ?>" name="ano"/><br><br>
                        <input type="submit" name="edit" value="Alterar"/>
                    </form>
                    <?php endif; ?>
                </div>
            </div>
    	</div>
    </body>
</html>
