<?php

	/* FOTO DE USUARIO */
	if(empty($_SESSION['ft_usu'])){
		echo('<img class="rounded-circle user" src="./_img/_perfil/user.jpg" alt="imagem do usuário">');
	}else{
		echo('<img class="rounded-circle user" src="./_img/_perfil/'.$_SESSION['foto_usuario'].'" alt="imagem do usuário">');
	}
	
?>