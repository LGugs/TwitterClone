<?php
	session_start();

	//verifica se a sessao esta aberta (fez login corretamente), caso nao, apresenta erro
	if(!isset($_SESSION['username']))
		header('Location: index.php?error=2');
	
?>


<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">

		<title>Twitter Clone - Procurar Pessoas</title>
		
		<!-- jquery - link cdn -->
		<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

		<!-- bootstrap - link cdn -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

		<script type="text/javascript">
			
			$(document).ready( function(){
				
				//funcao de click botao 'Procurar' 
				$('#btn-search').click(function(){
					//recupera o que esta digitado no campo input 
					var pessoa = $('#corpo-search').val();
					
					//se nao estiver vazio
					if(pessoa.length > 0){
						$.ajax({
							url: 'get_pessoas.php',
							method: 'post',
							data: { corposearch: $('#corpo-search').val()}, //manda o que esta no campo input como 'parametro' pro script .php
							success: function(data){
								$('#pessoas').html(data); //seta o campo input pra vazio
								
								//follow function
								$('.btn-follow').click(function(){
									var id_following = $(this).data('iduser');
									
									$('#btn-follow-'+id_following).hide();
									$('#btn-unfollow-'+id_following).show();
									
									$.ajax({
										url: 'follow.php',
										method: 'post',
										data: {idfollowing: id_following},
										success: function(data){
											refreshNumFollowers();
											refreshNumFollowing();
										}
									});
									
								});
								
								//unfollow function
								$('.btn-unfollow').click(function(){
									var id_unfollowing = $(this).data('iduser');
									
									
									$('#btn-unfollow-'+id_unfollowing).hide();
									$('#btn-follow-'+id_unfollowing).show();
									
									$.ajax({
										url: 'unfollow.php',
										method: 'post',
										data: {idunfollowing: id_unfollowing},
										success: function(data){
											refreshNumFollowers();
											refreshNumFollowing();
										}
									});
									
								});
								
							}
						});
					}else{
						alert('Campo vazio');
					}
				});
				
				function refreshNumTweets(){
					$.ajax({
						url: 'attntweets.php',
						success: function(data){
							//similar ao .innerHTML
							$('#ntweets').html(data); //passa o retono do script get_tweet.php para a div de timeline
						}
					});
				}
				
				function refreshNumFollowers(){
					$.ajax({
						url: 'attnfollowers.php',
						success: function(data){
							//similar ao .innerHTML
							$('#nfollowers').html(data); //passa o retono do script get_tweet.php para a div de timeline
						}
					});
				}

				function refreshNumFollowing(){
					$.ajax({
						url: 'attnfollowing.php',
						success: function(data){
							//similar ao .innerHTML
							$('#nfollowing').html(data); //passa o retono do script get_tweet.php para a div de timeline
						}
					});
				}
				refreshNumTweets();
				refreshNumFollowers();
				refreshNumFollowing();
			});
			
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
	          <img src="imagens/icone_twitter.png" />
	        </div>
	        
	        <div id="navbar" class="navbar-collapse collapse">
	          <ul class="nav navbar-nav navbar-right">
            	<li><a href="home.php">Home</a></li>
	            <li><a href="logout.php">Sair</a></li>
	          </ul>
	        </div><!--/.nav-collapse -->
	      </div>
	    </nav>


	    <div class="container">
	    	
	    	<div class="col-md-3">
	    		<div class="panel panel-default">
	    			<div class="panel-body"style="text-align: center">
	    				<h4><?= $_SESSION['username']?></h4>
	    				<hr>
	    				<div class="row">
	    					<div class="col-md-4" style="text-align: center">
								<span id="ntweets"></span>
							</div>
							<div class="col-md-4" style="text-align: center">
								<span id="nfollowers"></span>
							</div>
							<div class="col-md-4" style="text-align: center">
								<span id="nfollowing"></span>
							</div>
	    				</div>
	    				<div class="row">
	    					<div class="col-md-4" style="text-align: center">
								tweets
							</div>
							<div class="col-md-4" style="text-align: center">
								seguidores
							</div>
							<div class="col-md-4" style="text-align: center">
								seguindo
							</div>
	    				</div>
	    			</div>
	    		</div>
	    	</div><!-- primeira col -->
	    	
	    	<div class="col-md-6">
	    		<div class="panel panel-default">
	    			<div class="panel-body">
	    				<div class="input-group">
	    					<input type="text" id="corpo-search" class="form-control" placeholder="Quem você procura?" maxlength="140">
							<span class="input-group-btn"> <button id="btn-search" class="btn btn-default" type="button">Procurar</button> </span>
	    				</div>
	    			</div>
	    		</div>
	    		<div id="pessoas" class="list-group">
	    			
	    		</div>
	    	</div><!-- segunda col -->
	    	
	    	<div class="col-md-3">
	    		<div class="panel panel-default">
	    			<div class="panel-body">
	    				
	    			</div>
	    		</div>
	    	</div><!-- terceira col -->

		</div>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
	</body>
</html>