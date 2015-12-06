<?php 
include 'includes/permissao.php'; 
include 'includes/conexao.php'; 


if(@$_POST['edit']){
    mysql_query("UPDATE empresas SET descricao = '$_POST[descricao]' WHERE id = '$_GET[id]'");
    header("Location: empresas.php");
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
                    <?php 
                        $sql = mysql_query("SELECT * FROM empresas");
                        $row = mysql_fetch_array($sql);
                    ?>
                    <form action="empresas.php?id=<?php echo $row['id']; ?>" method="post">
                        <h2>Alterar descricao da empresa</h2>
                        <br>
                        <label>Descrição:</label><br>
                        <textarea style="width:600px;" rows="10" name="descricao"><?php echo $row['descricao']; ?></textarea><br>


                        <input type="submit" name="edit" value="Alterar"/>
                    </form>

                </div>
            </div>
    	</div>
    </body>
</html>
