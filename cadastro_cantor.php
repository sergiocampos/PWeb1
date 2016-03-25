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
		try{
			$bd = new PDO("mysql:host=localhost;dbname=gravadora","root","tguide");
			echo "Conectado ao banco!"."<br><br>";
			$nome = $_POST['nomeCantor'];
			
			$count = $bd->exec("insert into cantor (nome) values ('$nome')");

			echo $count;
			//$bd = null;
			if (empty($count)) {
					echo "Nenhum registro inserido!";
				} else {
					echo $count." registro inserido!";	
				}
		} catch(PDOException $e){
				echo $e->getMessage();	
			}
		$bd = null;	
	 ?>
	<form action="" method="POST">
		Cadastro de Cantor<br>
		Nome:<input type="text" name="nomeCantor"><br>
		<input type="submit" value="Cadastrar">
	</form>
</body>
</html>