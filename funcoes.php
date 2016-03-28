<?php 

	$bd = carregarBanco();

	session_start();

	$dados_usuario = estaLogado();

	function carregarBanco(){

		try{
			$bdtxt = carregarTXT("bd.txt");
			//echo $bdtxt;
			if($bdtxt == null){
				throw new Exception("Erro.");
			}
			$bdarray = txtToArray($bdtxt);
			//var_dump($bdarray);

			if(count($bdarray) != 4){
				throw new Exception("Erro.");
			}
			$host = $bdarray['host'];
			$banco = $bdarray['banco'];
			$bdpdo = new PDO("mysql:host=$host;dbname=$banco", $bdarray['login'], $bdarray['senha']);
		}catch(Exception $e){
			echo "Erro ao conectar o banco de dados.";
			exit;
		}
		return $bdpdo;
		
	}


	function carregarTXT($file){
		$handle = fopen($file,"r");
		
		if ($handle != false && filesize($file) > 0)
		{
			$conteudo = fread($handle,filesize($file));
			fclose($handle);
			return $conteudo;
		}
		return null;
	}

	function txtToArray($string){
		$raw_array = explode(PHP_EOL, $string);
		$array = array();
		foreach ($raw_array as $linha) {
			
			if($linha != ''){
				//var_dump($linha);
				$div = explode(':', $linha);
				if(count($div) == 1){
					$array[$div[0]] = "";
				}else{
					$array[$div[0]] = $div[1];
				}
			}
		}
		return $array;
	}-	

	function estaLogado(){
		if(isset($_SESSION['dados_logado'])){
			return $_SESSION['dados_logado'];
		}
		return false;
	}

	function logoff(){
		if(estaLogado()){
			session_unset($_SESSION['dados_logado']);
			session_destroy();
		}
	}





?>