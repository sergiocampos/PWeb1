<?php 

	include_once("classes.cla");

	session_start();

	$dados_usuario = estaLogado();

		

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