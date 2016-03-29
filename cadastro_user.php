<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>
	<?php 
	try {
<<<<<<< HEAD
		$con = new PDO("mysql:host=localhost;dbname=gravadora","root");
=======
		$con = new PDO("mysql:host=localhost;dbname=gravadora","root","");
>>>>>>> 0af3c54c9ee8e87535f4254142debe8b365fdcd1
		echo "conectado!";
		$login = $_POST['login'];
		$nome = $_POST['nomeUser'];
		$senha = $_POST['senha'];
		$senha_encrypt = md5($senha);
		$count = $con->exec("insert into usuario (login, nome, senha) values 
				('$login', '$nome', '$senha_encrypt')");
				echo "$count";
					
	$con = null;	
	} catch (Exception $e) {
		echo $e->getMessage();
	}
	//$con = null;
	?>
	
	
	<form action="" method="POST">
		Cadastro de Usuário <br>
		Login:<input type="text" name="login">
		<input type="button" name="verificar" value="Verificar"><br>
		Nome:<input type="text" name="nomeUser"><br>
		Senha:<input type="password" name="senha"><br>
		<input type="submit" value="Cadastrar">
	</form>
</body>
</html>