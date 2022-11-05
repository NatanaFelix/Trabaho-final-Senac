<?php
include_once '../controle-principal/restrito.php'
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/leitores.css">
    <title>Pesquisa Leitores</title>
</head>

<body>
    <?php 
		include_once '../controle-principal/funcoes.php';
		include_once '../controle-principal/conexao.php';
		include_once '../assets/navbar-principal.php';

		if (isset($_POST['busca'])) {
			$pesquisa = $_POST['busca'];
		  }
		  else
		  {
			$pesquisa ='';
		  }

		$sql = "select * from leitores where nome like '%$pesquisa%' or CPF = '$pesquisa'";
		$dados = mysqli_query($conexao,$sql);
		$linha= mysqli_fetch_assoc($dados); 

		$status = $linha['status'];
	?>
    <h1 class="text-white display-4 text-center">Consulta de Leitores</h1>
        <nav class="navbar navbar-light bg-light">
                <form class="d-flex" action="pesquisa-leitores.php" method="POST">
                    <input class="form-control me-1 col-sm-12" type="search" placeholder="Informe nome ou CPF"
                        aria-label="Search" name="busca">
                    <button class="btn btn-outline-dark ml-2" type="submit"><i class="fas fa-search"></i>Pesquisar</button>
                </form>			
				<div class="mr-5">
					<?php 
					 //querys que mostram a quantidade de leitores bloqueados e ativos no banco
					 if($status = 'bloqueado'){
						 $sql = "SELECT COUNT('status') FROM leitores WHERE `status` = 'bloqueado'";
						 if($resultado = mysqli_query($conexao, $sql)){
							 $total = mysqli_fetch_assoc($resultado);
							 $novo_total = array_sum($total);
							 echo "<span class='badge badge-pill badge-danger'ass='text-danger mr-0'>Leitores bloqueados $novo_total</span>";
						 }
					 }
					 if($status = 'ativo'){
						 $sql = "SELECT COUNT('status') FROM leitores WHERE `status` = 'ativo'";
						 if($resultado = mysqli_query($conexao, $sql)){
							 $total = mysqli_fetch_assoc($resultado);
							 $novo_total = array_sum($total);
							 echo "<span class='badge badge-pill badge-success ml-2'>Leitores ativos $novo_total</span>";
						 }
					 }
					?>
				</div>
        </nav>
        <table class="table table-hover table-light">
            <thead>
                <tr>
                    <th scope="col">CPF</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Email</th>
                    <th scope="col">Nascimento</th>
                    <th scope="col">CEP</th>
                    <th scope="col">Endereço</th>
                    <th scope="col">Número</th>
                    <th scope="col">Cidade</th>
                    <th scope="col">UF</th>
                    <th scope="col">Status</th>
                    <th scope="col">Observações</th>
                </tr>
            </thead>
            <tbody>
                <?php 
					while ($linha = mysqli_fetch_assoc($dados)) {
					
					//busca os dados no banco e armazena nas variáveis 
					$cpf = $linha['CPF'];
					$nome = $linha['nome'];
					$telefone = $linha['telefone'];
					$email = $linha['email'];
					$nascimento = formatadata($linha['nascimento']);
					$cep = $linha['cep'];
					$endereco = $linha['endereco'];
					$numero = $linha['numero'];
					$cidade = $linha['cidade'];
					$estado = $linha['estado'];
					$status = $linha['status'];
					$observacao = $linha['observacao'];
					
					echo "<tr>";
					echo "<th scope='row'>$cpf</th>";
					echo "<td>$nome</td>";
					echo "<td>$telefone</td>";
					echo "<td>$email</td>";
					echo "<td>$nascimento</td>";
					echo "<td>$cep</td>";
					echo "<td>$endereco</td>";
					echo "<td>$numero</td>";
					echo "<td>$cidade</td>";
					echo "<td>$estado</td>";
					if($status == 'bloqueado'){
						echo "<td class='text-danger'><strong>$status</strong></td>";
					}else{
						echo "<td  class='text-success'><strong> $status</strong></td>";
					}
					echo "<td>$observacao</td>";
					echo "</tr>";	
				}
				?>
            </tbody>
        </table>
        <a href="./leitores.php" class="btn btn-secondary">Voltar</a>
        <?php 
	include_once '../controle-principal/bootjs.php'
	?>
</body>

</html>