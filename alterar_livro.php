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
		<title>Alterar Livro</title>
		<meta name="author" content="Pedro e Ygor">
		<meta name="description" content="Gerenciador de Bibliotecas de livros">
		<meta name="keywords" content="Virando a página">
	</head>
	<body>
		<?php
			if(isset($_GET['alte'])){
				$cod=$_GET['alte'];

				$sql='select * from livros where id_livro='.$cod.';';

				$resul=mysqli_query($conexao, $sql);

				$con=mysqli_fetch_array($resul)
				?>
				<main class="bg">
					<div class="box-add rounded">
						<h2 class="text-muted">
							Alterar o Livro
						</h2>
						<hr>
						<form name='alterar' action="#" method="POST" enctype="multipart/form-data">
							<section class="form-group">
								<label for="titulo">
									Titulo do livro
								</label>
								<input type="text" class="form-control" name="titulo" ip
								="titulo" value=<?php echo($con['titulo']); ?>>
							</section>
							<section class="form-group">
								<label for="titulo">
									Autor
								</label>
								<input type="text" class="form-control" name="autor" value=<?php echo($con['autor']); ?>>
							</section>
							<section class="form-group">
								<label for="foto">Adicione uma capa ao livro</label>
								<input id="foto" class="form-control-file" type="file" name="capa">
							</section>
							<section class="form-check">
								<input id="quero" type="radio" class="form-check-input" name="andamento" value="1">
									<label for="quero" class="form-check-label">Quero ler</label>
								</input>
							</section>
							<section class="form-check">
								<input id="estou" type="radio" class="form-check-input" name="andamento" value="2">
									<label for="estou" class="form-check-label">Estou lendo</label>
								</input>
							</section>
							<section class="form-check">
								<input id="ja" type="radio" class="form-check-input" name="andamento" value="3">
									<label for="ja" class="form-check-label">Já li</label>
								</input>
							</section>
							<input type="submit" class="btn btn-success" name="alte_livro" value="Alterar Livro">
						</form>
						<div class="link">
							<a href="biblioteca.php">
								<button class="btn btn-danger" autofocus>
									Cancelar
								</button>
							</a>
						</div>
						<?php
						if(isset($_POST['alte_livro'])){
							$titulo=strtolower($_POST['titulo']);

							if(empty($_POST['autor'])){
								$autor="desconhecido";
							}else{
								$autor=strtolower($_POST['autor']);
							}

							if(empty($_POST['andamento'])){
								$andamento=4;
							}else{
								$andamento=$_POST['andamento'];
							}

							$capa=$_FILES['capa'];

							if(!empty($capa)){
								$largura=3000;
								$altura=3000;
								$tamanho=2018000;

								if(!preg_match("/^image\/(jpg|jpeg|gif|bmp|png)$/",$capa['type'])){
									echo('<script>window.alert("Não é uma imagem!"); window.location="config.php"; </script>');
								}

								$dimensoes=getimagesize($capa["tmp_name"]);

								if($dimensoes[0]>$largura){
									echo('<script>window.alert("A largura da imagem não pode ultrapassar '.$largura.' pixels!"); window.location="config.php"; </script>');
								}

								if($dimensoes[1]>$altura){
									echo('<script>window.alert("A altura da imagem não pode ultrapassar '.$altura.' pixels!"); window.location="config.php"; </script>');
								}

								if($capa['size']>$tamanho){
									echo('<script>window.alert("O tamanho da imagem não pode ultrapassar '.$tamanho.' bites!"); window.location="config.php"; </script>');
								}

								preg_match("/\.(jpg|jpeg|gif|bmp|png){1}$/", $capa['name'], $ext);

								$nome_capa=md5(uniqid(time())).'.'.$ext[1];

								$caminho_capa='img/'.$nome_capa;

								move_uploaded_file($capa['tmp_name'], $caminho_capa);
							
								$sqlalt='update livros set titulo="'.$titulo.'", autor="'.$autor.'", andamento='.$andamento.', foto_capa="'.$nome_capa.'" where id_livro='.$cod.';';
							}else{
								$sqlalt='update livros set titulo="'.$titulo.'", autor="'.$autor.'", andamento='.$andamento.' where id_livro='.$cod.';';
							}

							$alterar=mysqli_query($conexao, $sqlalt);

							$verificar=mysqli_affected_rows($conexao);

							if($verificar){
									if($alterar){
									echo('<script>window.alert("Livro alterado com sucesso!"); window.location="biblioteca.php"; </script>');
									}else{
										echo('<script>window.alert("Houve um erro ao fazer a alteração do livro!"); window.location="adicionar_livro.php?alte='.$_GET['alte'].'; </script>');
									}
							}else{
								echo('<script>window.alert("Nenhum livro foi alterado!"); window.location="biblioteca.php"; </script>');
							}	
						}
					}
				?>
			</div>
		</main>
	</body>
</html>
