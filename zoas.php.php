<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>zoaaaaaassss</title>
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
		<p>Cadastro de CD</p>
		Título:<input type="text" name="titulo"><br>
		Data de Lançamento:<input type="text" name="data_lancamento"><br>
		Cantor:
		<select name="cantor">
				snão e bom deixar essa parte aqui,,,, deve dar a responsabilidade de brincar com o db poara outra classe
				^^ 

				vamos voltar para lá salvar e commitar e subir para o git 
			</select><br>

		<input type="submit" value="Cadastrar">
		<hr>
	</form>
	<form action="" method="POST">
		Cadastro de Cantor<br>
		Nome:<input type="text" name="nomeCantor"><br>
		<input type="submit" value="Cadastrar">
	</form>
	<hr>
	<form action="" method="POST">
		Cadastro de Usuário <br>
		Login:<input type="text" name="login"><br>
		Nome:<input type="text" name="nomeUser"><br>
		Senha:<input type="password" name="senha"><br>
		<input type="submit" value="Cadastrar">
	</form>
</body>
</html>