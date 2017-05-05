<?php
	session_start();

	//verifica se a sessao esta aberta (fez login corretamente), caso nao, apresenta erro
	if(!isset($_SESSION['username']))
		header('Location: index.php?error=2');

	require_once('database.class.php');
	$db = new db();
	$conn = $db->mysql_connection();

	$id_user = $_SESSION['id_user'];

	//qtde tweets
	$querytweets = "SELECT COUNT(*) AS qtde_tweets FROM TWEET WHERE id_user = $id_user";
	$result = mysqli_query($conn, $querytweets);
	$qtdeTweets = 0;

	if($result){
		$dado = mysqli_fetch_array($result, MYSQLI_ASSOC);
		$qtdeTweets = $dado['qtde_tweets'];
		echo $qtdeTweets;
	}
		
	else
		echo 'Erro na execucao da query';

?>