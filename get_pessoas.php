<?php

	session_start();
	//verifica se a sessao esta aberta (fez login corretamente), caso nao, apresenta erro
	if(!isset($_SESSION['username']))
		header('Location: index.php?error=2');

	//importa a classe db
	require_once('database.class.php');

	//recupera os valores atraves da superglobal
	$user = $_POST['corposearch'];
	$id_user = $_SESSION['id_user'];

	//instancia e faz a conexao com o database
	$db = new db();
	$conn = $db->mysql_connection();
	$query = "SELECT u.*, r.* FROM USERS AS u LEFT JOIN USER_RELATION as r ON (r.id_user = $id_user AND u.id = r.id_following) WHERE u.username like '%$user%' AND u.id <> $id_user";
	
	//recupera o retorno da query
	$result = mysqli_query($conn, $query);

	if($result){
		while($dado = mysqli_fetch_array($result, MYSQLI_ASSOC)){
			//cria o elemento tweet
			echo '<a href="#" class="list-group-item">';
			echo '<strong>'.$dado['username'].'</strong> <small>'.$dado['email'].'</small>';	
			
			$isfollowing = isset($dado['id_relation']) && !empty($dado['id_relation']) ? 'S' : 'N';
			
			
			$display_follow = 'block';
			$display_unfollow = 'block';
			
			
			if($isfollowing == 'S')
				$display_follow = 'none';
			else 
				$display_unfollow = 'none';
			
			echo '<button type="button" id="btn-unfollow-'.$dado['id'].'" class="btn btn-danger btn-sm btn-unfollow" data-iduser="'.$dado['id'].'" style="display: '.$display_unfollow.'; float: right;">Deixar de Seguir</button>';	
			echo '<button type="button" id="btn-follow-'.$dado['id'].'" class="btn btn-info btn-sm btn-follow" data-iduser="'.$dado['id'].'" style="display: '.$display_follow.'; float: right;">Seguir</button>';
			echo '<div class="clearfix"></div>';
			echo '</a>';
		}
	}else{
		echo 'Erro na consulta ao database :(';
	}

?>