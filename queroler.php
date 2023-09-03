<?php 
	session_start();
	include('verificacao_login.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<link rel="stylesheet" href="./css/styles.css">
		<link rel="stylesheet" href="./css/bootstrap.min.css">
		<script type="text/javascript" src="./js/jquery-3.5.1.min.js"></script>
		<script type="text/javascript" src="./js/bootstrap.min.js"></script>
		<script src='https://kit.fontawesome.com/a076d05399.js'></script>
		<meta charset="UTF-8">
		<title>Virando a página</title>
		<meta name="author" content="Pedro e Ygor">
		<meta name="description" content="Gerenciador de Bibliotecas de livros">
		<meta name="keywords" content="Virando a página">
	</head>
	<body>
		<!--Cabeçario-->
		<header>
			<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
				<div class="container">
					<a class="navbar-brand" href="#">
						<img class="logo" src="./img/logo.png" alt="logo">
					</a>
	 				<button class="navbar-toggler mr-auto" type="button" data-toggle="collapse" data-target="#NavbarVaP">
		    			<span class="navbar-toggler-icon"></span>
		 			</button>
	  				<div class="collapse navbar-collapse" id="NavbarVaP">
		   				<ul class="navbar-nav mr-auto">
		      				<li class="nav-item">
		      					<a class="nav-link" href="home.php">Home</a>
		     				</li>
		     				<li class="nav-item">
		        				<a class="nav-link" href="biblioteca.php">Minha Biblioteca</a>
		      				</li>
		      				<li class="nav-item active">
		        				<a class="nav-link" href="#">Quero Ler</a>
		      				</li>
		    			</ul>
		    		</div>
		    		<ul class="navbar-nav ml">
		    			<li class="nav-item dropdown">
		    				<a class="nav-link dropdown-toggle" href="#" id="navDrop" data-toggle="dropdown">
       					 		<img class="rounded-circle user" src="./img/user.jpg" alt="imagem do usuário">
       						</a>
    						<div class="dropdown-menu">
       							<a class="dropdown-item" href="login.php">Entrar</a>
       							<a class="dropdown-item" href="formulario.php">Registrar</a>
        					</div>
			    		</li>
			    	</ul>
	    		</div>
			</nav>	
		</header>
		<main class="Container">
		</main>
		<footer class="area-copy">
			<!--Rodapé-->
			<div class="container">
				<div class="row">
					<p class="col-md-12">
						Copyright &copy; 2020 Virando a Página.
					</p>
				</div>
			</div>
		</footer>
	</body>
</html>