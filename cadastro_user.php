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
		$con = new PDO("mysql:host=localhost;dbname=gravadora","root","tguide");

		
	} catch (Exception $e) {
		echo $e->getMessage();
	}
	?>
	
	<form action="" method="POST">
		Cadastro de Usuário <br>
		Login:<input type="text" name="login"><br>
		Nome:<input type="text" name="nomeUser"><br>
		Senha:<input type="password" name="senha"><br>
		<input type="submit" value="Cadastrar">
	</form>
</body>
</html>