<?php

	//inicia a sessao
	session_start();
	//verifica se a sessao esta aberta (fez login corretamente), caso nao, apresenta erro
	if(!isset($_SESSION['username']))
		header('Location: index.php?error=2');

	//importa a classe db
	require_once('database.class.php');

	//recupera os valores atraves da superglobal SESSION
	$id_user = $_SESSION['id_user'];
	
	//instancia e faz a conexao com o database
	$db = new db();
	$conn = $db->mysql_connection();
	$query = "SELECT u.username, DATE_FORMAT(t.data, '%d %b %Y %T') AS data, t.tweet FROM TWEET AS t, USERS AS u WHERE (t.id_user = $id_user OR t.id_user IN(SELECT id_following FROM USER_RELATION WHERE id_user = $id_user)) AND u.id = t.id_user ORDER BY data DESC";
	
	//recupera o retorno da query
	$result = mysqli_query($conn, $query);

	if($result){
		while($dado = mysqli_fetch_array($result, MYSQLI_ASSOC)){
			//cria o elemento tweet
			echo '<a href="#" class="list-group-item">';
			echo '<h4 class="list-group-item-heading">'.$dado['username'] .'<small> - '.$dado['data'].'</small></h4>';
			echo '<p class="list-group-item-text">'.$dado['tweet'].'</p>';
			echo '</a>';
		}
	}else{
		echo 'Erro na consulta ao database :(';
	}

?>