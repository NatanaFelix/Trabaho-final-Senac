<?php
include_once '../controle-principal/restrito.php'
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="./css/leitores.css">
    <title>Leitores</title>
</head>
<body>
    <?php
		include_once '../assets/navbar-principal.php';
		include_once '../controle-principal/Conexao.php';
		include_once '../controle-principal/funcoes.php';			
	?>
    <img class="banner" src="../assets/imagens/photo-output.jpg" alt="">	
	<?php
	include_once '../assets/navbar-lateral-leitores.php';
	?>
    <?php
		include_once '../controle-principal/bootjs.php';
	?>
</body>
</html>