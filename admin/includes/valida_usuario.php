<?php
	session_start();
	include("conexao.php");

	$login = $_POST['usuario'];
	$senha = md5($_POST['senha']);	

	$sql = "SELECT * FROM usuarios WHERE usuario = '$login' AND senha = '$senha'";
	$retorno = mysql_query($sql, $mysql);
	$obj = mysql_fetch_array($retorno);
	if($obj['usuario']) {
		$_SESSION["usuario"] = $obj['usuario'];
		header('Location: ../principal.php');
	} else {
		header("Location: ../index.php?error=fail");	
?>
		<a href="login.php" title="Voltar">Voltar</a>
<?php
	}
	
	mysql_close($mysql);
?>