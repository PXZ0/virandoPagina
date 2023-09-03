<?php
	session_start();

	/* Destroi a Sessão */
	session_destroy();
	
	header("location:index.php");
?>