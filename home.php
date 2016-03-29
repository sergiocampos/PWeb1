<?php 
	include_once('funcoes.php');

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
				<h1><a href="home.php">Projeto Pweb I - Gravadora</a></h1>
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
					
						<h3>Olá, visitante!</h3>
						<h4>Faça <a href="entrar.php">login</a> ou <a href="">cadastre-se!</a></h4>
					
					<?php endif; ?>
					
				</div>
				<div id="menu">
					<h4>Menu</h4>
					<ul>
						<li><a href="index.php">Início</a></li>
						<li>Cadastrar
							<ul>
								<li><a href="cadastrar_cd.php">CD</a></li>
								<li><a href="cadastrar_cantor.php">Cantor</a></li>
								<li><a href="cadastrar_user.php">Usuário</a></li>
							</ul>
						</li>
						<li><a href="download.php">Backup CDs</a></li>
					</ul>
				</div>
			</div>
			<div id="direita_col">
				<h2>Listagem de CDs</h2>
				
				<?php if(estaLogado()): ?>
					
					<input type="text" name="pesquisa" id="pesquisainput" placeholder="Pesquisar...">
					<select name="filtro_select" id="filtro_select">
						<option value="album">Álbum</option>
						<option value="cantor">Cantor</option>
						<option value="lancamento">Data de lançamento</option>
					</select>
					<div id="listagemcd">
					</div>

				<?php else: ?>
					
					<h4>Para ver a listagem de Cds é necessário fazer <a href="entrar.php">login</a> ou se <a href="">cadastrar!</a></h4>
				
				<?php endif; ?>
				
			</div>
		</div>
	</div>
</body>
</html>
</body>
</html>
