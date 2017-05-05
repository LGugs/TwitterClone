<?php

class db {
	
	//host, usuario, senha, banco
	private $host = 'localhost';
	private $user = 'root';
	private $pw = '';
	private $database = 'twitterClone';
	
	public function mysql_connection(){
		
		//cria a conexao
		//local banco - usuario - senha - banco
		$myCon = mysqli_connect($this->host, $this->user, $this->pw, $this->database);
		
		//ajusta o charset da comunicacao entre aplicacao e database
		mysqli_set_charset($myCon, 'utf-8');
		
		//verifica erro de conexao
		// != 0 implica em erro existente
		if(mysqli_connect_errno()){
			echo 'Erro de conexão com o banco de dados: '.mysqli_connect_error();
		}
		
		return $myCon;
		
	}
}

?>