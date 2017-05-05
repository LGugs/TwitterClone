<?php
	$usererror = isset($_GET['usererror']) ? $_GET['usererror'] : 0;
	$emailerror = isset($_GET['emailerror']) ? $_GET['emailerror'] : 0;
?>


<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">

		<title>Twitter Clone - Inscreva-se</title>
		
		<!-- jquery - link cdn -->
		<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

		<!-- bootstrap - link cdn -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	
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
	          <img src="imagens/icone_twitter.png" />
	        </div>
	        
	        <div id="navbar" class="navbar-collapse collapse">
	          <ul class="nav navbar-nav navbar-right">
	            <li><a href="index.php">Voltar para Página Inicial</a></li>
	          </ul>
	        </div><!--/.nav-collapse -->
	      </div>
	    </nav>


	    <div class="container">
	    	
	    	<br /><br />

	    	<div class="col-md-4"></div>
	    	<div class="col-md-4">
	    		<!-- formulario de cadastro -->
	    		<h3>Inscreva-se já.</h3>
	    		<br />
				<form method="post" action="registra_usuario.php" id="formCadastrarse">
					<?php
						if($usererror == 1){
							echo '<div class="alert alert-danger" role="alert">
										<button type="button" class="close" data-dismiss="alert">
											<span>&times;</span>
										</button>
										<strong>Usuário já está cadastrado!</strong>
									</div>';
						}
					
						if($emailerror == 1){
							echo '<div class="alert alert-danger" role="alert">
										<button type="button" class="close" data-dismiss="alert">
											<span>&times;</span>
										</button>
										<strong>E-mail já está cadastrado!</strong>
									</div>';
						}
					?>
					<div class="form-group">
						<input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuário" required>
					</div>

					<div class="form-group">
						<input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
					</div>
					
					<div class="form-group">
						<input type="password" class="form-control" id="senha" name="senha" placeholder="Senha" required>
					</div>
					
					<button type="submit" class="btn btn-primary form-control">Inscreva-se</button>
				</form> <!-- fim do formulario de cadastro -->
			</div>
			<div class="clearfix"></div>
		</div>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</body>
</html>