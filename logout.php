<?php
	session_start();

	//remove os valores das variaveis super globais _SESSION, finalizando a sessao
	unset($_SESSION['username']);
	unset($_SESSION['email']);

	header('Location: index.php?logout=1');
?>