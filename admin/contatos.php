<?php 
include 'includes/permissao.php'; 
include 'includes/conexao.php'; 

if(@$_GET[acao] == 'excluir'){
    mysql_query("DELETE FROM contatos WHERE id = '$_GET[id]'");
    header("Location: contatos.php");
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
                        <h2>Contatos enviados</h2>

                        <table class="lista-registros" border="1">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>email</th>
                                    <th>Ações</th>
                                </tr>    
                            </thead>
                            <tbody>
                                <?php 
                                $sql = mysql_query("SELECT * FROM contatos");
                                while ($row = mysql_fetch_array($sql)) { 
                                ?>
                                <tr>
                                    <td><?php echo $row['nome']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td class="acoes">
                                        <a href="contatos.php?acao=ver&id=<?php echo $row['id']; ?>">ver</a>
                                        <a href="contatos.php?acao=excluir&id=<?php echo $row['id']; ?>">Excluir</a>
                                    </td>
                                </tr>
                                <?php 
                                }
                                ?>
                            </tbody>
                        </table>
                    <?php endif; ?>
                    <?php 
                    if(@$_GET['acao'] == "ver") : 
                        $sql = mysql_query("SELECT * FROM contatos WHERE id = '$_GET[id]'");
                        $row = mysql_fetch_array($sql);
                    ?>
                    <h2>Contatos</h2>
            
                        <br>
                        <label>Nome:</label><br>
                        <input type="text" value="<?php echo $row['nome']; ?>" disabled="disabled" name="nome"/><br>

                        <label>Email:</label><br>
                        <input type="text" value="<?php echo $row['email']; ?>" disabled="disabled" name="email"/><br>

                        <label>Assunto:</label><br>
                        <input type="text" value="<?php echo $row['assunto']; ?>" disabled="disabled" name="assunto"/><br>

                        <label>Mensagem:</label><br>
                        <textarea name="mensagem" disabled="disabled" style="width:250px;"><?php echo $row['mensagem']; ?></textarea>
                    <?php endif; ?>
                </div>
            </div>
    	</div>
    </body>
</html>
