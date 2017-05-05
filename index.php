<?php
	//verifica se as variáveis foram inicializadas, caso positivo, atribuir valor do GET (tratativas de erro)
	$error = isset($_GET['error']) ? $_GET['error'] : 0;
	$register = isset($_GET['register']) ? $_GET['register'] : 0;
	$logout = isset($_GET['logout']) ? $_GET['logout'] : 0;
?>


<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">

		<title>Twitter Clone - Página Inicial</title>

		<!-- jquery - link cdn -->
		<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

		<!-- bootstrap - link cdn -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

		<link rel="stylesheet" type="text/css" href="css/estilo.css"/>
	
		<script>
			// código javascript						
		</script>
	</head>

	<body>

		<!-- Static navbar -->
	    <nav class="navbar navbar-default navbar-static-top">
	      <div class="container">
	        <div class="navbar-header">
	          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	            <span class="sr-only">Toggle navigation</span>
	            <span class="glyphicon glyphicon-menu-hamburger"></span>
	          </button>
	          <img style="width:40px; height: 40px;" src="imagens/Twitter_Logo_Blue.png"/>
	        </div>
	        
	        <div id="navbar" class="navbar-collapse collapse">
	          <ul class="nav navbar-nav navbar-right">
	            <li><a href="inscrevase.php">Inscrever-se</a></li>
	            <li class="">
	            	<a id="entrar" data-target="#formLogin" data-toggle="modal" role="button">Entrar</a>
	            </li>
	          </ul>
	          
	        </div><!--/.nav-collapse -->
	      </div>
	    </nav>

    	<!-- formulario de login -->
	    <form method="post" action="valida_usuario.php" id="formLogin" class="modal fade">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Entrar</h4>

					</div>

					<div class="modal-body">
						<div class="form-group">
							<input type="text" class="form-control" id="usuario" name="usuario" required placeholder="Usuário">
						</div>
						<div class="form-group">
							<input type="password" class="form-control" id="pw" name="senha" required placeholder="Senha">
						</div>
					</div>

					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
						<button type="submit" class="btn btn-primary">Entrar</button>
					</div>
				</div>
			</div>
		</form> <!-- fim do formulario de login -->

	    <div class="container">
	    	
			<?php
				//tratativas
			
				//login invalido
				if($error == 1)
					echo '<div class="alert alert-danger" role="alert">
            				<button type="button" class="close" data-dismiss="alert">
                				<span>&times;</span>
            				</button>
            				<strong>Usuário e/ou senha inválido(s)!</strong>
						</div>';
			
				//nao logado
				if($error == 2)
					echo '<div class="alert alert-danger" role="alert">
            				<button type="button" class="close" data-dismiss="alert">
                				<span>&times;</span>
            				</button>
            				<strong>Usuário não está logado!</strong>
						</div>';	
				
				//usuario cadastrado
				if($register == 1)
					echo '<div class="alert alert-success" role="alert">
            				<button type="button" class="close" data-dismiss="alert">
                				<span>&times;</span>
            				</button>
            				<strong>Cadastrado com sucesso! Faça login para utilizar o site.</strong>
						</div>';
			
				//usuario desconectado
				if($logout == 1)
					echo '<div class="alert alert-info" role="alert">
            				<button type="button" class="close" data-dismiss="alert">
                				<span>&times;</span>
            				</button>
            				<strong>Usuário desconectado! Nos vemos em breve :)</strong>
						</div>';
			?>
	      <div class="jumbotron">
	        <h1>Bem vindo ao Twitter Clone</h1>
	        <p>Aplicação clone do twitter desenvolvida por <a target="_blank" href="http://github.com/giovannifiori">Giovanni Fiori</a></p>
			</div>	
      		
	      <div class="clearfix"></div>
		</div>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
	</body>
</html>