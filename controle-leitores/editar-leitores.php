<?php
include_once '../controle-principal/restrito.php'
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" type="text/css" href="./css/leitores.css">
  <title>Editar Leitores</title>
</head>
<body>
  <?php 

  include_once '../controle-principal/conexao.php';
  include_once '../assets/navbar-principal.php';
  include_once '../controle-principal/funcoes.php';
  
  if (isset($_POST['busca'])) {
    echo "busca <br>";
    $pesquisa = $_POST['busca'];
    echo $pesquisa . "<br>";
    }
    else
    {
    // echo "saiu no else <br>";
    $pesquisa ='';
    }
  // monta a query (o select no banco de dados clientes, procurando no campo nome, na tabela, que tenha a informação da variavel $pesquisa)
  $sql = "SELECT * FROM leitores WHERE nome like '%$pesquisa%' or CPF = '$pesquisa'";
  // executa a query e coloca o resultado em $dados
  $dados = mysqli_query($conexao,$sql);
  ?>
  
  <h1 class="card-title display-4 text-center text-white"> Editar Leitores</h1>
    <div class="row">
      <div class="col">        
        <nav class="navbar navbar-light bg-light">
          <div class="container-fluid">
            <form class="d-flex" action="editar-leitores.php" method="POST">
              <input class="form-control me-2" name="busca" type="search" placeholder="Pesquisar" aria-label="Search">
              <button class="btn btn-outline-dark ml-2" type="">Pesquisar</button>
            </form>
            <div class="mr-5">
				<?php 
				if($status = 'bloqueado'){
					$sql = "SELECT COUNT('status') FROM leitores WHERE `status` = 'bloqueado'";
					if($resultado = mysqli_query($conexao, $sql)){
						$total = mysqli_fetch_assoc($resultado);
						$novo_total = array_sum($total);
						echo "<span class='badge badge-pill badge-warning'>Leitores bloqueados $novo_total</span>";
					}
				}
				if($status = 'ativo'){
					$sql = "SELECT COUNT('status') FROM leitores WHERE `status` = 'ativo'";
					if($resultado = mysqli_query($conexao, $sql)){
						$total = mysqli_fetch_assoc($resultado);
						$novo_total = array_sum($total);
						echo "<span class='badge badge-pill badge-info ml-2'>Leitores ativos $novo_total</span>";
					}
				}
				?>
				</div>
          </div>
        </nav>

        <table class="table table-hover bg-light">
          <thead>
            <tr>
              <th scope="col">CPF</th>
              <th scope="col">Nome</th>
              <th scope="col">Email</th>
              <th scope="col">Nascimento</th>
              <th scope="col">Status</th>
              <th scope="col">Comando</th>
            </tr>
          </thead>
          <tbody>
          <?php 
          while ($linha = mysqli_fetch_assoc($dados)) { 
          $chave = $linha['CPF'];
          $nome = $linha['nome'];
          $email = $linha['email'];
          $nascimento = mostradata($linha['nascimento']);        
          $status = $linha['status'];
          echo "<tr>
                  <th scope='row'>$chave</th>
                    <td>$nome</td>
                    <td>$email</td>
                    <td>$nascimento</td>
                    <td>$status</td>
                    <td width=200px>
                      <a href='./mostrar-leitores.php?CPF=$chave' class='btn btn-success btn-sm'><i class='fas fa-edit'></i> Editar</a>
                      <a href='./excluir-leitores.php?CPF=$chave' class='btn btn-danger btn-sm'><i class='fas fa-trash-alt'></i> Apagar</a>
                    </td>
                  </th>
              </tr>";
          }
          ?>
          </tbody>
        </table>
      </div>      
    </div>
    <a href="./leitores.php" class="btn btn-secondary">Voltar</a>
  <?php 
    include_once '../controle-principal/bootjs.php';
  ?>

</body>
</html>