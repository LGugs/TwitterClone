<?php

	//inicia a sessao
	//funciona em todas as paginas enquanto tiver uma instancia do navegador aberta
	session_start();

	//importa classe do database
	require_once('database.class.php');

	//recupera informacoes
	$username = $_POST['usuario'];
	//md5 criptografia resulta num hash de tamanho 32
	$pw = md5($_POST['senha']);

	$query = "SELECT id, username, email FROM USERS WHERE username = '$username' AND pw = '$pw'";

	//faz a conexao com o database
	$db = new db();
	$conn = $db->mysql_connection();

	//executa a query
	$result = mysqli_query($conn, $query);

	//trata a query
	if($result){
		//passa os dados do usuario para um array
		$user_data = mysqli_fetch_array($result);
		if(isset($user_data['username'])){
			
			//variaveis de sessao
			$_SESSION['id_user'] = $user_data['id'];
			$_SESSION['username'] = $user_data['username'];
			$_SESSION['email'] = $user_data['email'];
			
			header('Location: home.php');
		}else{
			header('Location: index.php?error=1');
		}
		
	}else{
		echo 'Erro na consulta ao database!';
	}

	
?>