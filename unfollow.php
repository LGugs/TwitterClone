<?php

	session_start();
	//verifica se a sessao esta aberta (fez login corretamente), caso nao, apresenta erro
	if(!isset($_SESSION['username']))
		header('Location: index.php?error=2');

	//importa a classe db
	require_once('database.class.php');

	//recupera os valores atraves das superglobais _POST e _SESSION
	$id_user = $_SESSION['id_user'];
	$idunfollowing = $_POST['idunfollowing'];
	
	//tratativa caso o script registra_tweet.php seja acessado sem permissao
	if($idunfollowing == '' || $id_user == '')
		die();

	//instancia a classe db e cria a conexao com o database
	$db = new db();
	$conn = $db->mysql_connection();
	

	$query = "DELETE FROM USER_RELATION WHERE id_user = $id_user AND id_following = $idunfollowing";

	//executa a query no database
	mysqli_query($conn, $query);

?>