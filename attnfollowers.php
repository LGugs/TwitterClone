<?php
	session_start();

	//verifica se a sessao esta aberta (fez login corretamente), caso nao, apresenta erro
	if(!isset($_SESSION['username']))
		header('Location: index.php?error=2');

	require_once('database.class.php');
	$db = new db();
	$conn = $db->mysql_connection();

	$id_user = $_SESSION['id_user'];

	//qtde followers
	$queryfollowers = "SELECT COUNT(*) AS followers FROM USER_RELATION WHERE id_following = $id_user";
	$result = mysqli_query($conn, $queryfollowers);
	$qtdeFollowers = 0;

	if($result){
		$dado = mysqli_fetch_array($result, MYSQLI_ASSOC);
		$qtdeFollowers = $dado['followers'];
		echo $qtdeFollowers;
	}
		
	else
		echo 'Erro na execucao da query';

?>