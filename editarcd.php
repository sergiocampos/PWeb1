<?php 
	include_once('funcoes.php');
	$msg = "";

	if(!estaLogado()){
		header("Location:home.php", "refresh");
	}

	$cantores = getCantores($bd);
	if(isset($_GET['codigo'])){
		$id = $_GET['codigo'];
		$cd = getCDs($bd, $id);
		if(count($cd) == 0){
			header("Location:erro.php?erro=1", "refresh");
		}
		$cd = $cd->fetch();

	}else{
		header("Location:erro.php?erro=1", "refresh");
	}
	

	if(isset($_POST['titulo']) && isset($_POST['cantor'])){
		$titulo = $_POST['titulo'];
		$cantor = $_POST['cantor'];
		$capa = null;

		if(isset($_FILES['capa']) && $_FILES['capa']['error'] == 0 && validarcapa($_FILES['capa'])){
			$capa = $_FILES['capa'];
		}


		if($titulo != "" && regex_titulo($titulo) && $cantor != ""){
			alterarcd($bd, $id, $_POST, $capa);
			header("Location:editarcd.php?codigo=$id&info=alterado", "refresh");
		}else{
			$msg = "Erro: O servidor não recebeu o formulario completo ou restrições foram violadas.";
		}

	}
?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="UTF-8">
	<title>Gravadora WEB</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
	<script src="js/script.js"></script>
</head>
<body>
	<div id="tudo">
		<div id="cabecalho">
			<div id="title">
				<h1><a href="home.php">Gravadora WEB</a></h1>
			</div>
		</div>
		<div id="conteudo">
			<div id="main_col">
				<div id="loginbox">
					
					<!-- SESSION -->
					<?php if(estaLogado()): ?>
					
						<h4>Olá, <?php echo $dados_usuario['nome']; ?></h4>
						<h5><a href="sair.php">Sair</a></h5>
					
					<?php else: ?>
					
						<h4>Olá, visitante!</h4>
						<h5>Faça <a href="entrar.php">login</a> ou <a href="cadastro_user.php">cadastre-se!</a></h5>
					
					<?php endif; ?>
					
				</div>
				<div id="menu">
					<h4>Menu</h4>
					<ul>
						<li><a href="home.php">Início</a></li>
						<li>Cadastrar
							<ul>
								<li><a href="cadastro_cd.php">CD</a></li>
								<li><a href="cadastro_cantor.php">Cantor</a></li>
								<li><a href="cadastro_user.php">Usuário</a></li>
							</ul>
						</li>
						<li><a href="xml_cd.php">Backup CDs</a></li>
					</ul>
				</div>
			</div>
			<div id="direita_col">
				<h2>Editar CD</h2>
				
				<?php if($msg != ""):?> <p class="erro"><?php echo $msg; ?></p> <?php endif; ?>
				<?php if(isset($_GET['info'])):?> <p class="sucesso">CD alterado com sucesso!</p> <?php endif; ?>
				
				<form action="editarcd.php?codigo=<?php echo $cd['codigo_cd']; ?>" enctype="multipart/form-data" method="post">
						<label for="titulo">Titulo:</label>
						<input type="text" name="titulo" id="titulo" value="<?php echo $cd['titulo']; ?>" required pattern=".[a-zA-Z0-9áéíóúàâêôãõüç ]{4,20}" title="Necessário ter entre 4 e 20 caracteres, e sem caracter especial (ex: - , _ / ?)"><br>
						<label for="cantor">Cantor:</label>
						<select name="cantor" id="cantor" required>
							<option value=""></option>
							<?php 
								foreach ($cantores as $cantor) {
									echo "<option value='" . $cantor['codigo_cantor'] . "'";
									if($cantor['codigo_cantor'] == $cd['cantor_fk']){
										echo "selected";
									}
									echo ">" . $cantor['nome'] . "</option>";
								}
							?>
						</select>
						<div style="width: 250px; float: right; margin-top: -160px; text-align: center;"><h4>Imagem da capa:</h4><img src="imagemCD/<?php echo $cd['codigo_cd'] ?>.jpg" alt=""></div>
						<label for="capa">Alterar imagem da capa:</label>
						<input type="file" name="capa" id="capa"><br><br>
						<input type="submit" value="Alterar">
				</form>
			</div>
		</div>
	</div>
</body>
</html>