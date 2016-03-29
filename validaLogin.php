<?php 
	
	function validaLogin($login){
	try {
	$con = new PDO("mysql:host=localhost;dbname=gravadora","root","tguide");
		foreach ($con->query("SELECT * FROM usuario WHERE login = '$login'") as $user) {
		if ($user['login'] == $login) {	
			echo "usuário já cadastrado";
			exit();
		}
	}				
	$con = null;	
	} catch (Exception $e) {
		echo $e->getMessage();
	}
	
	}
 ?>