<?php
include_once '../controle-principal/restrito.php'
?>
<?php
include_once '../controle-principal/conexao.php';
include_once '../assets/navbar-principal.php';
include_once '../controle-principal/funcoes.php';

if(isset($_POST['alterar'])){

$codigoEmprestimo = $_POST['codEmprestimo'];
$emprestimo = $_POST['emprestimo'];
$devolucao = $_POST['devolucao'];

$sql = "UPDATE `emprestimolivros` SET emprestimo='$emprestimo', devolucao='$devolucao' WHERE codEmprestimo = '$codigoEmprestimo'";

	if($resultado = mysqli_query($conexao, $sql)){
		echo "<div class='alert alert-success' role='alert'>Emprestimo altualizado com sucesso!</div>";
		echo "<a href='./emprestimo.php' class='btn btn-outline-secondary'>Voltar</a>";    
	}else{
		echo "<div class='alert aleter-danger' role='alert'>Ocorreu um problema </div>";
	}

}
?>