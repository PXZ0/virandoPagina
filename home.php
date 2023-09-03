<?php 
	//SESSION
	session_start();
	
	//INCLUDES
	include('conexao.php');
	include('verificacao_login.php');

?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>

		<!-- METAS -->
		<meta charset="UTF-8">
		<meta name="author" content="Equipe Virando a Página">
		<meta name="description" content="Home - Virando a Página">
		<meta name="keywords" content="Virando a página">

		<!-- LINKS -->
		<link rel="stylesheet" href="./_css/styles.css">
		<link rel="stylesheet" href="./_css/bootstrap.min.css">

		<!-- SCRIPTS -->
		<script type="text/javascript" src="./_js/jquery-3.5.1.min.js"></script>
		<script type="text/javascript" src="./_js/bootstrap.min.js"></script>
		<script src='https://kit.fontawesome.com/a076d05399.js'></script>
		
		<title>Virando a Página</title>
		
	</head>

	<body>

		<header>
			<nav class="navbar navbar-expand-md navbar-dark bg-dark">

				<section class="container">

					<a class="navbar-brand" href="#">
						<img class="logo" src="./_img/_logo/logo.png" alt="logo">
					</a>

	 				<button class="navbar-toggler mr-auto" type="button" data-toggle="collapse" data-target="#NavbarVaP">
		    			<span class="navbar-toggler-icon"></span>
		 			</button>

	  				<div class="collapse navbar-collapse" id="NavbarVaP">
		   				<ul class="navbar-nav mr-auto">

		      				<li class="nav-item active">
		      					<a class="nav-link" href="#">Home</a>
		     				</li>

		     				<li class="nav-item">
		        				<a class="nav-link" href="biblioteca.php">Minha Biblioteca</a>
		      				</li>

		    			</ul>
		    		</div>

		    		<ul class="navbar-nav ml">

		    			<li class="nav-item dropdown">

		    				<a class="nav-link dropdown-toggle" href="#" id="navDrop" data-toggle="dropdown">
       					 		<?php
									include('img_usuario.php');
								?>
       						</a>

    						<div class="dropdown-menu">
       							<a class="dropdown-item" href="config.php">Config</a>
       							<a class="dropdown-item" href="logout.php">Sair</a>
        					</div>

			    		</li>

			    	</ul>

	    		</section>
			</nav>	
		</header>

		<main>

			<!--CARROSSEL -->
			<section id="carouselhome" class="carousel slide" data-ride="carousel">

				<ol class="carousel-indicators">
					<li data-target="#carouselhome" data-slide="0" class="active"></li>
					<li data-target="#carouselhome" data-slide="1"></li>
					<li data-target="#carouselhome" data-slide="2"></li>
				</ol>

			  	<section class="carousel-inner">

			   		<figure class="carousel-item active">
			  			<img src="./_img/_banners/banner1.jpg" class="d-block w-100" alt="Gerenciamento de livros">
			  			<section class="carousel-caption d-none d-md-block">
			  				<h2 class="text-white">Tenha uma biblioteca só sua</h2>
			  			</section>
			   		</figure>

					<figure class="carousel-item">
				  		<img src="./_img/_banners/banner2.jpg" class="d-block w-100" alt="Organizador de prioridades para leitura">
				  		<section class="carousel-caption d-none  d-md-block">
			  				<h2 class="text-white">Programe melhor sua lista de leitura</h23>
			  			</section>
				  	</figure>

				  	<figure class="carousel-item">
				  		<img src="./_img/_banners/banner3.jpg" class="d-block w-100" alt="Organizador de prioridades para leitura">
				  		<section class="carousel-caption d-none  d-sm-block">
			  				<h2 class="text-dark">Organize sua biblioteca pelo seu celular</h2>
			  			</section>
				  	</figure>

				</section>

				<a class="carousel-control-prev" href="#carouselhome" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>

				<a class="carousel-control-next" href="#carouselhome" role="button" data-slide="next">
				    <span class="carousel-control-next-icon" aria-hidden="true"></span>
				    <span class="sr-only">Next</span>
				</a>

			</section>

			<!--Sobre a Virando a página-->
			<section class="container">
				<div class="row">
					<div class="col-12">
						<h3 class="main-title">
							Sobre a Virando a Página
						</h3>
					</div>

					<figure class="col-md-6">
						<img class="img-fluid" src="./_img/figure1.jpg">
					</figure>

					<div class="col-md-6">
						<h3 class="slogan-title">"Tenha uma biblioteca só sua."</h3>

						<p>
							Virando a Página é um website que administra sua biblioteca, facilitando a organização de seus livros e ajudando a criar uma ordem de leitura, além de também salvar titulos que não possui mas sente vontade ler futuramente.
						</p>

						<ul class="sobre-list">
							<li>
								<i class='fas fa-caret-right'></i>
								Privacidade com sua biblioteca;
							</li>

							<li>
								<i class='fas fa-caret-right'></i>
								Disponivel para todos os dispositivos.
							</li>
						</ul>

					</div>
				</div>
			</section>
		</main>

		<footer class="area-copy">	
			<section class="container">
				<div class="row">
					<p class="col-md-12">
						Copyright &copy; 2020 Virando a Página.
					</p>
				</div>
			</section>
		</footer>
	</body>
</html>