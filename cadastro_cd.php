<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Cadastro de Cd</title>
	<link rel="stylesheet" href="">
</head>
<body>
	<?php 
		try{
			$bd = new PDO("mysql:host=localhost;dbname=gravadora","root","tguide");
			echo "Conectado ao banco!"."<br><br>";
			$nome = $_POST['titulo'];
			$data = $_POST['data_lancamento'];
			
			$dataQ = explode('-', $data);
			$data_lancamento = $dataQ[2].'-'.$dataQ[1].'-'.$dataQ[0];
			$capa = $_FILES['capa'];
			$destino = 'imagemCD/' . $_FILES['capa']['name'];
			$arquivo_tmp = $_FILES['capa']['tmp_name'];
			move_uploaded_file($arquivo_tmp, $destino);
			$cantor_fk = $_POST['cantor'];
			
			$count = $bd->exec("insert into cd (titulo, data_lancamento,
				cantor_fk, capa) values ('$nome','$data_lancamento','$cantor_fk',
				'$capa')");

			echo $count;
			//echo "$data_lancamento";
			//$bd = null;
			
		} catch(PDOException $e){
				echo $e->getMessage();	
			}
		//$bd = null;	
	 ?>

	<form enctype="multipart/form-data" action="" method="POST">
		<p>Cadastro de CD</p>
		Título:<input type="text" name="titulo"><br>
		Data de Lançamento:<input type="date" name="data_lancamento"><br>
		Capa:<input type="file" name="capa" size="50"><br>
		Cantor:
		<select name="cantor">
			<?php 
				$sql = "select * from cantor";
					foreach ($bd->query($sql) as $key) {
						print "<option value='".$key['codigo']."'>".$key['nome']."</option>";
					}
				//$bd = null;
			 ?>
		</select><br>

		<input type="submit" value="Cadastrar">
	</form>
</body>
</html>