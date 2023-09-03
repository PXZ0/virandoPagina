<?php
	//SESSION
	session_start();
	
	//INCLUDES
	include('conexao.php');
?>

<script type="text/javascript">

	/* Validação - Senhas */
	function validarSenha(){
		var f_senha = registro.senha.value;
		var f_senhaC = registro.senha_c.value;

		if(f_senha != f_senhaC){
			alert('As senhas são diferentes!');
			return false;
		}else{
			return true;
		}
	}
</script>

<!DOCTYPE html>
<html lang="pt-br">
	<head>

		<!-- METAS -->
		<meta charset="UTF-8">
		<meta name="author" content="Equipe Virando a Página">
		<meta name="description" content="Registro - Virando a Página">
		<meta name="keywords" content="Virando a Página">

		<!-- LINKS -->
		<link rel="stylesheet" href="./_css/styles.css">
		<link rel="stylesheet" href="./_css/bootstrap.min.css">

		<!-- SCRIPTS -->
		<script type="text/javascript" src="./_js/jquery-3.5.1.min.js"></script>
		<script type="text/javascript" src="./_js/bootstrap.min.js"></script>
		<script src='https://kit.fontawesome.com/a076d05399.js'></script>
		
		<title>Virando a página</title>
		
	</head>

	<body>
		
		<main class="bg">
			<div class="box-regi rounded">

				<h1 class="text-muted">
					Registre-se
				</h1>

				<hr/>

				<!-- Formulário - Registro -->
				<form name="registro" method="POST" action="#">

					<section class="form-group">
						<label for="f_nome">Nome de Usuário</label>
						<input class="form-control" type="text" name="f_nome" id="f_nome" placeholder="Digite seu nome" required autofocus>
					</section>

					<section class="form-group">
						<label for="f_email">E-mail</label>
						<input class="form-control" type="email" name="f_email" id="f_email" placeholder="Digite seu E-mail" required>
					</section>

					<section class="form-group">
						<label for="f_senha">Senha</label>
						<input class="form-control" type="password" name="f_senha" id="f_senha" placeholder="Digite sua Senha" required>
					</section>

					<section class="form-group">
						<label for="f_senhaC">Confirmar Senha</label>
						<input class="form-control" type="password" name="f_senhaC" id="f_senhaC" placeholder="Confirme a senha" required>
					</section>

					<button class="btn btn-success" type="submit" name="btn_registrar">Registre-se</button>

				</form>

				<!-- Link - Usuário que possiu uma conta -->
				<section>
					<a href="index.php">
						Já possui uma conta? Clique aqui.  
			 		</a>
		 		</section>

		 	</div>

		 	<section>
			 	<?php 

			 		/* REGISTRO DE USUARIO */
			 		if(isset($_POST['btn_registrar'])){
			 			
						/* Variaveis */
						$f_nome = $_POST['f_nome'];
						$f_email = strtolower($_POST['f_email']);
						$f_senha = sha1(trim($_POST['f_senha']));
						
						/* Busca de existencia de usuario igual */
						$sqlbu = 'SELECT * FROM usuarios WHERE nome = "'.$f_nome.'" or email = "'.$f_email.'";';

						$resul = mysqli_query($conexao, $sqlbu);

						if(!mysqli_num_rows($resul)){
							echo "aqui";

							/* Registro de usuario no banco */
							$ins = $pdo->prepare('INSERT INTO usuarios SET nome = :nome, email = :email, senha = :senha');

							$ins->BindValue("nome", $f_nome);
							$ins->BindValue("email", $f_email);
							$ins->BindValue("senha", $f_senha);

							$ins->execute();

							if($ins->rowCount()){

								//Busca do usuario para pegar os dados
								$sqlbu = 'SELECT * FROM usuarios WHERE nome = "'.$f_nome.'" and email = "'.$f_email.'";';

								$resul = mysqli_query($conexao, $sqlbu);

								if(!mysqli_num_rows($resul)){

									$usu = mysqli_fetch_array($resul);

									/* Variaveis de Sessão */
									$_SESSION['nome'] = $usu['nome'];
									$_SESSION['id_usuario'] = $usu['id_usuario'];
									$_SESSION['email'] = $usu['email'];
									$_SESSION['senha'] = $usu['senha'];
									$_SESSION['ft_usu'] = $usu['ft_usu'];

									echo('<script>window.alert("Cadastrado com sucesso!"); window.location="home.php";</script>');
								}
								
							}else{
								echo('<script>window.alert("Falha ao cadastrar!"); window.location="registro.php";</script>');
							}
						}else{
							echo('<script>window.alert("Este usuario já existe!"); window.location="registro.php";</script>');
						}
					}
					
				?>
			</section>
		</main>
	</body>
</html>