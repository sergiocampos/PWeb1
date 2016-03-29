<?php 
	include_once('funcoes.php');
	$msg = "";

	if(!estaLogado()){
		header("Location:home.php", "refresh");
	}

	if(isset($_GET['codigo'])){
		$id = $_GET['codigo'];
		$cd = getCDs($bd, $id);
		if(count($cd) == 0){
			header("Location:erro.php?erro=1", "refresh");
		}
		$cd = $cd->fetch();

	}

	

	if(isset($_POST['removeid'])){
		if(removercd($bd, $_POST['removeid'])){
			header("Location:removercd.php?info=alterado", "refresh");
		}else{
			$msg = "Erro: CD não encontrado.";
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
				<?php if($msg != ""):?> 
					<p class="erro"><?php echo $msg; ?></p> 
				<?php elseif(isset($_GET['info'])): ?>
					<p class="sucesso">CD removido com sucesso!</p>
					<a href="home.php">Voltar</a>
				<?php else: ?>
					<h2>Deseja remover '<?php echo $cd['titulo']; ?>'?</h2>
					<div style="width: 400px; margin-left: 110px; margin-top: 45px; text-align: center;">
						<img src="img/capas/<?php echo $cd['codigo_cd'] ?>.jpg" alt=""><br><br>
						<form id="removecd" action="removercd.php" method="post">
							<input type="hidden" name="removeid" value="<?php echo $cd['codigo_cd']; ?>">
							<input id="removecdbtn" type="submit" class="btn btn-primary" value="Remover">
						</form>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</body>
</html>