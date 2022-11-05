<?php
include_once '../controle-principal/restrito.php'
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" type="text/css" href="./css/emprestimo.css">
  <title>Editar Empréstimo</title>
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
  $sql = "SELECT * FROM `emprestimolivros` where codEmprestimo  like '%$pesquisa%' or codigoLivro = '$pesquisa'";
  // executa a query e coloca o resultado em $dados
  $dados = mysqli_query($conexao,$sql);

  ?>
  <h1 class="text-white display-4 text-center">Editar de Emprestimos</h1>
    <div class="row">
      <div class="col">
        <nav class="navbar navbar-light bg-light">
          <div class="container-fluid">
            <form class="d-flex" action="editar-emprestimo.php" method="POST">
              <input class="form-control me-2" name="busca" type="search" placeholder="Pesquisar" aria-label="Search">
              <button class="btn btn-outline-dark ml-2" type="">Pesquisar</button>
            </form>
          </div>
        </nav>

        <table class="table table-hover bg-light">
          <thead>
            <tr>
              <th scope="col">Código Empréstimo</th>
              <th scope="col">CPF do Leitor</th>
              <th scope="col">Código do Livro</th>
              <th scope="col">Data do Empréstimo</th>
              <th scope="col">Data de Devolução</th>
              <th scope="col">Comando</th>
            </tr>
          </thead>
          <tbody>
          <?php 
          while ($linha = mysqli_fetch_assoc($dados)) { 
          $codigoEmprestimo = $linha['codEmprestimo'];
          $chave = $linha['leitorcpf'];
          $codigo = $linha['codigoLivro'];
          $emprestimo = mostradata($linha['emprestimo']);
          $devolucao = mostradata($linha['devolucao']);;
          echo "<tr>
                    <th scope='row'>$codigoEmprestimo</th>
                    <td >$chave</th>
                    <td>$codigo</td>
                    <td>$emprestimo</td>
                    <td>$devolucao</td>
                    <td width=200px>
                      <a href='./mostrar-emprestimo.php?codEmprestimo=$codigoEmprestimo' class='btn btn-success btn-sm'><i class='fas fa-edit'></i>Editar</a>
                    </td>
                  </th>
              </tr>";
          }
          ?>
          </tbody>
        </table>
      </div>
      
    </div>
    <a href="./emprestimo.php" class="btn btn-secondary">Voltar</a>
  <?php 
    include_once '../controle-principal/bootjs.php';
  ?>
</body>
</html>