<?php 
	session_start();
	include('verificacao_login.php');
	include('conexao.php');
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
			<nav class="navbar navbar-expand-md navbar-dark bg-dark">
				<div class="container">
					<a class="navbar-brand" href="home.php">
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
		     				<li class="nav-item active">
		        				<a class="nav-link" href="#">Minha Biblioteca</a>
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
       							<a class="dropdown-item" href="deslogar.php">Sair</a>
        					</div>
			    		</li>
			    	</ul>
	    		</div>
			</nav>	
		</header>
		<main class="container">
			<section class="botoes">
				<form class="form-inline" name='buscar' action='#' method="GET">
					<label for=busca class="mr-sm-2">
						Busque seu livro
					</label>
					<input class="form-control mr-sm-2" type="text" name="busca" placeholder="Pesquisar" id="busca">
					<input class="btn btn-outline-success my-2 my-sm-0" type="submit" name="procurar" value="Procurar">
				</form>
				<br>
			</section>
			<section>
				<?php
					if(isset($_GET['ex'])) {
						$cod=$_GET['ex'];

						$sqlex= 'delete from livros where id_livro = '.$cod.';';

						$excluir=mysqli_query($conexao,$sqlex);

						if($excluir){
							echo('<script>window.alert("Registro excluido com sucesso!"); window.location="biblioteca.php"; </script>');
						}else{
							echo('<script>window.alert("Houve um erro ao excluido o registro!"); </script>');
						}
					}
					?>
					<p>
						Todos os seus livros
					</p>
					<section>
						<a href="adicionar_livro.php">
							<button class="btn btn-success">
								Adicionar
							</button>
						</a>
					</section>
					<?php
					if(isset($_GET['procurar'])){
						$busca=$_GET['busca'];

						$sqlbu='select * from livros where titulo like "%'.$busca.'%" and id_usuario='.$_SESSION['id_usuario'].';';

						$busca_resul=mysqli_query($conexao, $sqlbu);

						$linhas=mysqli_num_rows($busca_resul);

						if($linhas==0){
							echo('<script>window.alert("Não existe nenhum registro desse livro na sua conta"); window.location="biblioteca.php";</script>');
						}else{
							while($con=mysqli_fetch_array($busca_resul)){
								if(!empty($con['foto_capa'])){
									echo('<div class="dados-livros row">
											<div class="col-md-2">
												<img class="livro" src="./img/'.$con['foto_capa'].'" alt="imagem do livro">
											</div>');
								}else{
									echo('<div class="row">
											<div class="col-md-1">
										<img class="livro" src="./img/" alt="imagem do livro">');
								}

							echo('
									<div class="col-md-10">
										<h6>
											'.ucwords($con['titulo']).'
										</h6>
								');

							echo('
									<p>
										Autor: '.ucwords($con['autor']).'
									</p>
									<p>								
								');

							switch ($con['andamento']) {
								case 1:
									echo('Quero ler');
								break;
								case 2:
									echo('Estou lendo');
								break;
								case 3:
									echo('Já foi lido');
								break;
								default:
									echo('Indefinido');
								break;
							}
							echo('</p>
								<p>
									<a class="btn btn-success btn-sm" href="alterar_livro.php?alte='.$con['id_livro'].'">
										Alterar
									</a>');
							echo(	'<a class="btn btn-danger btn-sm" href="biblioteca.php?ex='.$con['id_livro'].'">
										Excluir
									</a>
								</p>');
							}
							if($linhas==1){
								echo('Foi encontrado '.$linhas.' resultado para sua pesquisa');
							}else{
								echo('Foram encontrados '.$linhas.' resultados para sua pesquisa');
							}
							?>
								<a href="biblioteca.php">Clique aqui para voltar para todos os seus livros.</a>
							<?php
						}
					}else{
						$sql='select * from livros where id_usuario='.$_SESSION['id_usuario'].';';

						$resul=mysqli_query($conexao, $sql);

						while($con=mysqli_fetch_array($resul)){
							if(!empty($con['foto_capa'])){
									echo('<div class="dados-livros row">
											<div class="col-md-2">
												<img class="livro" src="./img/'.$con['foto_capa'].'" alt="imagem do livro">
											</div>');
								}else{
									echo('<div class="row">
											<div class="col-md-2">
										<img class="livro" src="./img/" alt="imagem do livro">');
								}

							echo('
									<div class="col-md-10">
										<h6>
											'.ucwords($con['titulo']).'
										</h6>
								');

							echo('
									<p>
										Autor: '.ucwords($con['autor']).'
									</p>
									<p>								
								');

							switch ($con['andamento']) {
								case 1:
									echo('Quero ler');
								break;
								case 2:
									echo('Estou lendo');
								break;
								case 3:
									echo('Já foi lido');
								break;
								default:
									echo('Indefinido');
								break;
							}
							echo('</p>
								<p>
									<a class="btn btn-success btn-sm" href="alterar_livro.php?alte='.$con['id_livro'].'">
										Alterar
									</a>');
							echo(	'<a class="btn btn-danger btn-sm" href="biblioteca.php?ex='.$con['id_livro'].'">
										Excluir
									</a>
								</p>
							</div>
						</div>');
						}
					}
				?>
			</section>
		</main>
		<footer class="fixed area-copy">
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