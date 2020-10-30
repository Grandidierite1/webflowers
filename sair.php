<?php
	ob_start();	
	$_SESSION['logado'] = 0;
	//redirecionar o usuario para a página de login
	echo '<script>window.location.href = "index.php";</script>';
?>