<?php
	session_start();
	include('verificacao_login.php');
	include('conexao.php');
	?>
	<form name='excluir' action="#" method="POST">
		Deseja mesmo excluir sua conta? Todos os seus dados seram excluidos junto a ela.
		<section class="botoes">
			<input class="btn btn-success" type="submit" name="sim" value="Sim">
			<input class="btn btn-danger" type="submit" name="nao" value="Não">
		</section>
	</form>
	<?php
	if(isset($_POST['sim'])) {

		$sqlex_li= 'delete from livros where id_usuario = '.$_SESSION['id_usuario'].';';

		$excluir=mysqli_query($conexao,$sqlex_li);

		if($excluir){
			$sqlex_usu= 'delete from usuarios where id_usuario = '.$_SESSION['id_usuario'].';';

			$excluir_usu=mysqli_query($conexao,$sqlex_usu);

			if($excluir){
				echo('<script>window.alert("Sua conta foi excluido com sucesso, muito obrigado pelo tempo que esteve conosco!"); window.location="deslogar.php"; </script>');
			}
		}else{
			echo('<script>window.alert("Houve um erro ao excluido sua conta!"); </script>');
		}
	}
?>