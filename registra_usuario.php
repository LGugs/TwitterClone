<?php

	//importa a classe db
	require_once('database.class.php');

	//indice da super global _POST é o atributo name do elemento
	$username = $_POST['usuario'];
	$email =  $_POST['email'];
	//md5 criptografia resulta num hash de tamanho 32
	$pw = md5($_POST['senha']);
	
	//instancia o objeto db
	$db = new db();
	$conn = $db->mysql_connection();

	$usererror = false;
	$emailerror = false;
	//verifica se o username ja existe
	$checkusername = "SELECT * FROM USERS WHERE username = '$username' ";
	$checkresult = mysqli_query($conn, $checkusername);
	if($checkresult){
		$userdata = mysqli_fetch_array($checkresult);
		if(isset($userdata['username'])){
			$usererror = true;
		}	
	}else{
		echo 'Erro ao localizar registro no database!';
	}

	//verifica se o email ja existe
	$checkemail = "SELECT * FROM USERS WHERE email = '$email' ";
	$checkresult = mysqli_query($conn, $checkemail);
	if($checkresult){
		$userdata = mysqli_fetch_array($checkresult);
		if(isset($userdata['email'])){
			$emailerror = true;
		}	
	}else{
		echo 'Erro ao localizar registro no database!';
	}
		
	if($usererror || $emailerror){
		$retorno = '';
		if($usererror)
			$retorno.= "usererror=1&";
		if($emailerror)
			$retorno.= "emailerror=1&";
		header('Location: inscrevase.php?'.$retorno);
		die();
	}
	

	$query = "INSERT INTO USERS(username, email, pw) values ('$username', '$email', '$pw')";

	//executa a query
	if(mysqli_query($conn, $query)){
		header('Location: index.php?register=1');
	}else{
		echo 'Erro ao cadastrar novo usuário! :(';
	}
	
	

?>