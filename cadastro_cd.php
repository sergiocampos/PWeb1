<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Cadastro de Cd</title>
	<link rel="stylesheet" href="">
</head>
<body>
	
	<form action="">
		<p>Cadastro de CD</p>
		Título:<input type="text" name="titulo"><br>
		Data de Lançamento:<input type="text" name="data_lancamento"><br>
		Cantor:
		<select name="cantor">
			<?php 
				$sql = "select * from cantor";
					foreach ($con->query($sql) as $key) {
						print "<option value='".$key['codigo']."'>".$key['nome']."</option>";
					}
			 ?>
		</select><br>

		<input type="submit" value="Cadastrar">
	</form>
</body>
</html>