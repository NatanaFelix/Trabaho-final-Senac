<?php
include_once '../controle-principal/restrito.php'
?>
<link rel="stylesheet" type="text/css" href="./css/leitores.css">

<?php
include_once '../controle-principal/conexao.php';
include_once '../assets/navbar-principal.php';
include_once '../controle-principal/funcoes.php';

if(isset($_POST['alterar'])){
$chave = $_POST['CPF'];
$nome = $_POST['nome'];
$cep = $_POST['cep'];
$endereco = $_POST['endereco'];
$numero = $_POST['numero'];
$cidade = $_POST['cidade'];
$uf = $_POST['estado'];
$nascimento = $_POST['nascimento'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];
$status = $_POST['status'];
$observacao = $_POST['observacao'];

$sql = "UPDATE `leitores` SET nome='$nome', endereco='$endereco', numero='$numero', cep='$cep', cidade ='$cidade', estado ='$uf', nascimento='$nascimento', telefone='$telefone', email='$email', status='$status', observacao='$observacao' WHERE CPF = '$chave'";

	if($resultado = mysqli_query($conexao, $sql)){
		echo "<div class='alert alert-success' role='alert'>Leitor atualizado com sucesso!</div>";
		echo "<a href='./leitores.php' class='btn btn-outline-secondary'>Voltar</a>";    
	}else{
		echo "<div class='alert aleter-danger' role='alert'>Ocorreu um problema </div>";
	}
}
?>