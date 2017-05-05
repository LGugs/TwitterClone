<?php
	session_start();

	//remove os valores das variaveis super globais _SESSION, finalizando a sessao
	unset($_SESSION['username']);
	unset($_SESSION['email']);

	//retorna para a página inicial (index)
	header('Location: index.php?logout=1');
?>