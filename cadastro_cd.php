<?php 
include_once('funcoes.php');
	$msg = "";

	$titulo_regex = "/[a-z0-9áéíóúàâêôãõüç ]{4,20}/i"; //Aceita letras de a-z e numeros, caracteres especiais, que tenha de 4 a 20 caracteres.

	if(!estaLogado()){
		header("Location:home.php", "refresh");
	}

	$cantores = getCantores($bd);

	if(isset($_POST['titulo']) && isset($_POST['data_lancamento']) && isset($_POST['cantor']) && isset($_FILES['capa'])){
		$titulo = $_POST['titulo'];
		$data_lancamento = $_POST['data_lancamento'];
		$cantor = $_POST['cantor'];
		$capa = $_FILES['capa'];
		$destino = 'imagemCD/' . $_FILES['capa']['name'];
			$arquivo_tmp = $_FILES['capa']['tmp_name'];
			move_uploaded_file($arquivo_tmp, $destino);


		if(regex_titulo($titulo) && regex_data($data_lancamento)){
			if($capa['error'] == 0){
				if(validarcapa($capa) === true){
					if($titulo != "" && $data_lancamento != "" && $cantor != ""){
						adicionarCD($bd, $_POST, $capa);
						header("Location:cadastro_cd.php?info=cadastrado", "refresh");
					}else{
						$msg = "Erro: Formulário não está completo!";
					}
					
				}else{
					$msg = validarcapa($capa);
				}
			}
		}else{
			$msg = "Campo Título ou data inválido. (mínimo de 4 e máximo 20 caracteres serão aceitos)";
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
				<h2>Cadastrar CD</h2>
				
				<?php if($msg != ""):?> <p class="erro"><?php echo $msg; ?></p> <?php endif; ?>
				<?php if(isset($_GET['info'])):?> <p class="sucesso">CD cadastrado!</p> <?php endif; ?>
				
				<form action="cadastro_cd.php" enctype="multipart/form-data" method="post">
						<label for="titulo">Titulo:</label>
						<input type="text" name="titulo" id="titulo" required pattern=".[a-zA-Z0-9áéíóúàâêôãõüç ]{4,20}" title="Necessário ter entre 4 e 20 caracteres, e sem caracter especial (ex: - , _ / ?)"><br>
						<label for="data_lancamento">Data de Lançamento:</label>
						<input type="date" name="data_lancamento" id="data_lancamento" required>
						<label for="cantor">Cantor:</label>
						<select name="cantor" id="cantor" required>
							<option value=""></option>
							<?php 
								foreach ($cantores as $cantor) {
									echo "<option value='" . $cantor['codigo_cantor'] . "'>" . $cantor['nome'] . "</option>";
								}
							?>
						</select>
						<label for="capa">Imagem da capa:</label>
						<input type="file" name="capa" id="capa" required><br><br>
						<input type="submit" value="Cadastrar">
				</form>
			</div>
		</div>
	</div>
</body>
</html>