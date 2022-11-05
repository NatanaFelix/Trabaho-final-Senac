<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/navbar-principal.css">
    <title>Navbar</title>
</head>

<body>
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <a class="navbar-brand" href="../controle-principal/index.php">
            <img src="../assets/imagens/IMG_9038.jpg" width="30" height="30" class="d-inline-block align-top" alt="">
            Fox Books
        </a>

        <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link active" href="../controle-principal/index.php">Principal</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="../controle-leitores/Leitores.php">Leitores</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="../controle-emprestimo/emprestimo.php">Emprestimo</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="../controle-livros/index.php">Controle Livros</a>
                </li>
            </ul>
            <?php
              include_once '../controle-principal/conexao.php';

              //resgata o usuário da sessão 
              $sql = "SELECT * FROM usuarios";
              $resultado = mysqli_query($conexao, $sql);
		      $campo = mysqli_fetch_array($resultado);
              $usuario = $campo['usuario'];
            //   echo $usuario
              ?>
              <a class="navbar-brand" href="#"><i class="fas fa-user"></i> <?php echo ucfirst($_SESSION['usuario']) ?></a>
            <a href="../controle-principal/fechar.php"><button type="submit" class="btn btn-secondary mb-2 float-right botao"><i class="fas fa-sign-out"></i> Sair</button></a>
        </div>
    </nav>
</body>
</html>