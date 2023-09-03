<?php
	if(!isset($_SESSION['login'])){
		unset($_SESSION['login']);
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
				<main class="bg">

					<section class="box-veri rounded">

						<p>Você precisa estar logado para acessar essa página.</p>

						<p>Aperte em 'OK' para ir a pagina de login.</p>

						<a href="logout.php" type="button" value="ok">
							<button class="btn btn-success">
								OK
							</button>
						</a>
					</section>
				</main>	
			</body>
		</html>

		<?php
	}
?>