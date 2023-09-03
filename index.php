<?php
	//SESSION
	session_start();
	
	//INCLUDES
	include('conexao.php');

	//Verificação de logado
	if(!isset($_SESSION['login'])){
		unset($_SESSION['login']);
	}else{
		header('location:home.php');
	}
?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>

		<!-- METAS -->
		<meta charset="UTF-8">
		<meta name="author" content="Equipe Virando a Página">
		<meta name="description" content="Login - Virando a Página">
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

			<div class="box rounded">

				<h1 class="text-muted">
					Efetue o Login
				</h1>

				<hr/>

				<!-- Formulario - Login -->
				<form name="form_login" method="POST" action="#">

	  				<section class="form-group">
	    				<label for="f_nome">Nome de Usuario</label>
	    				<input name="f_nome" id="f_nome" type="text" class="form-control" aria-describedby="emailHelp" required autofocus>
	  				</section>

	  				<section class="form-group">
	    				<label for="f_senha">Senha</label>
	    				<input name="f_senha" id="f_senha" type="password" class="form-control" required>
	  				</section>

	 				<button class="btn btn-success" type="submit" name="btn_login">Fazer Login</button>
				</form>

				<!-- Link de registro -->
				<section class="link">
					<a href="registro.php">
						Não possui uma conta? clique aqui.
			 		</a>
		 		</section>
	 		</div>

	 		<section>
		 		<?php
		 		
		 			/* Login do site */
		 			if(isset($_POST['btn_login'])){

						$f_nome = $_POST['f_nome'];
						$f_senha = sha1(trim($_POST['f_senha']));

						//Busca de Usuário
						$sqlbu = 'SELECT * FROM usuarios WHERE nome="'.$f_nome.'" and senha="'.$f_senha.'";';

						$resul = mysqli_query($conexao, $sqlbu);

						$linhas = mysqli_fetch_array($resul);

						if(mysqli_num_rows($resul)){

							$_SESSION['login'] = $linhas['nome'];
							$_SESSION['id_usuario'] = $linhas['id_usuario'];
							$_SESSION['email'] = $linhas['email'];
							$_SESSION['senha'] = $linhas['senha'];
							$_SESSION['ft_usu'] = $linhas['ft_usu'];

							header('location:home.php');

						}else{

							unset($_SESSION['login']);

							echo('<script>window.alert("Desculpe, mas esse usuario não existe!"); window.location="deslogar.php";</script>');
						}
					}
				?>
			</section>
		</main>
	</body>
</html>