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
       							<a class="dropdown-item" href="deslogar.php">Sair</a>
        					</div>
			    		</li>
			    	</ul>
	    		</div>
			</nav>
			<script type="text/javascript">
				function validar(){
					var n_senha=update.n_senha.value;
					var c_senha=update.c_senha.value;

					if(n_senha!=c_senha){
						alert('As senhas são diferentes!');
						return false;
					}else{
						return true;
					}
				}
			</script>
		</header>
		<!--Form do Update-->
		<main>
			<form name="update" method="POST" action="#" class="container" onsubmit="return validar()" enctype="multipart/form-data">
				<div class="row">
					<div class="col-md-6">
						<section class="form-grup">
							<label for="nome_usuario">Nome de usuário</label>
							<input type="text" class="form-control" id="nome_usuario" name="nome" value=	
									<?php
										echo('"'.ucwords($_SESSION['login']).'"');
									?>>
						</section>
						<section class="form-grup">
							<label for="email">Email</label>
							<input type="text" class="form-control" id="email" name="email" value=	
									<?php
										echo('"'.$_SESSION['email'].'"');
									?>>
						</section>
						<section>
							<label for="file">
								Imagem de usuário
								<?php
									if(empty($_SESSION['foto_usuario'])){
										echo('<img class="rounded-circle user" src="./img/user.jpg" alt="imagem do usuário">');
									}else{
										echo('<img class="rounded-circle user" src="./img/'.$_SESSION['foto_usuario'].'" alt="imagem do usuário">');
									}
								?>
							</label>
							<input class="form-control-file" id="file" type="file" name="img_usuario">
						</section>
					</div>
					<div class="col-md-6">
						<section class="form-grup">
							<label for="a_senha">Antiga Senha</label>
							<input type="password" class="form-control" id="a_senha" name="a_senha">
						</section>
						<section class="form-grup">
							<label for="n_senha">Nova Senha</label>
							<input type="password" class="form-control" id="n_senha" name="n_senha">
						</section>
						<section class="form-grup">
							<label for="c_senha">Confirme a Senha</label>
							<input type="password" class="form-control" id="c_senha" name="c_senha">
						</section>
					</div>
					<section class="botoes">
						<input class="btn btn-success" type="submit" name="aplicar" value="Aplicar">
						<input class="btn btn-danger" type="submit" name="excluir" value="Excluir">
					</section>
				</div>
			</form>
			<?php
				if(isset($_POST['aplicar'])){
					$nome=$_POST['nome'];
					$email=$_POST['email'];
					$senha_a=sha1(trim($_POST['a_senha']));
					$senha_n=sha1(trim($_POST['n_senha']));
					if($_FILES['img_usuario']){
						$foto=$_FILES['img_usuario'];
					}

					if($senha_a==$_SESSION['senha']){
						if(!empty($_FILES['img_usuario'])){
							$largura=1500;
							$altura=1500;
							$tamanho=2018000;

							if(!preg_match("/^image\/(jpg|jpeg|gif|bmp|png)$/",$foto['type'])){
								echo('<script>window.alert("Não é uma imagem!"); window.location="config.php"; </script>');
							}

							$dimensoes=getimagesize($foto["tmp_name"]);

							if($dimensoes[0]>$largura){
								echo('<script>window.alert("A largura da imagem não pode ultrapassar '.$largura.' pixels!"); window.location="config.php"; </script>');
							}

							if($dimensoes[1]>$altura){
								echo('<script>window.alert("A altura da imagem não pode ultrapassar '.$altura.' pixels!"); window.location="config.php"; </script>');
							}

							if($foto['size']>$tamanho){
								echo('<script>window.alert("O tamanho da imagem não pode ultrapassar '.$tamanho.' bites!"); window.location="config.php"; </script>');
							}

							preg_match("/\.(jpg|jpeg|gif|bmp|png){1}$/", $foto['name'], $ext);

							$nome_foto=md5(uniqid(time())).'.'.$ext[1];

							$caminho_imagem='img/'.$nome_foto;

							move_uploaded_file($foto['tmp_name'], $caminho_imagem);
						
							$sqlalt='update usuarios set nome="'.$nome.'", email="'.$email.'", senha="'.$senha_n.'", foto_usuario="'.$nome_foto.'" where id_usuario='.$_SESSION['id_usuario'].';';
						}else{
							$sqlalt='update usuarios set nome="'.$nome.'", email="'.$email.'", senha="'.$senha_n.'" where id_usuario='.$_SESSION['id_usuario'].';';
						}

						$alterar=mysqli_query($conexao, $sqlalt);

						$verificar=mysqli_affected_rows($conexao);

						$sqlbu='select * from usuarios where nome="'.$nome.'" and senha="'.$senha.'";';

						$resul=mysqli_query($conexao, $sqlbu);

						$con=mysqli_fetch_array($resul);

						if(mysqli_num_rows($resul)){
							$_SESSION['login']=$con['nome'];
							$_SESSION['id_usuario']=$con['id_usuario'];
							$_SESSION['email']=$con['email'];
							$_SESSION['senha']=$con['senha'];
							$_SESSION['foto_usuario']=$con['foto_usuario'];
						}

						if($verificar){
								if($alterar){
									echo('<script>window.alert("Conta alterada com sucesso!"); window.location="config.php"; </script>');
								}else{
									echo('<script>window.alert("Houve um erro ao fazer a alteração!"); window.location="config.php"; </script>');
								}
						}else{
							echo('<script>window.alert("Nenhum campo foi alterado!"); window.location="config.php"; </script>');
						}
					}else{
						echo('<script>window.alert("Senha incorreta!"); window.location="config.php";</script>');
					}
				}
				if(isset($_POST['excluir'])){
					header('location:excluir_conta.php');
				}
			?>
			<footer class="absolute area-copy">
				<!--Rodapé-->
				<div class="container">
					<div class="row">
						<p class="col-md-12">
							Copyright &copy; 2020 Virando a Página.
						</p>
					</div>
				</div>
			</footer>
		</main>
	</body>
</html>