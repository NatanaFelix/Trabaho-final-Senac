<?php
include_once '../controle-principal/restrito.php'
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/emprestimo.css">
    <title>Editar Empéstimo</title>
</head>
<body>
    <?php
        include_once '../assets/navbar-principal.php';
        include_once '../controle-principal/conexao.php';
        include_once '../controle-principal/funcoes.php';  

		$codigoEmprestimo = $_GET['codEmprestimo'];
		$sql = "SELECT * FROM emprestimolivros WHERE codEmprestimo = '$codigoEmprestimo'";
		$resultado = mysqli_query($conexao, $sql);
		$campo = mysqli_fetch_array($resultado);

		$codigo = $campo['codigoLivro'];
		$chave = $campo['leitorcpf'];
		$emprestimo = $campo['emprestimo'];
		$devolucao = $campo['devolucao'];

    ?>
    <div class="container">
        <div class="card mb-3 p-3 mt-3">
            <img src="../assets/imagens/photo-output.jpg" class="card-img-top">
            <h1 class="card-title display-4 text-center"> Alterar Emprestimo</h1>
            <form class="row g-3" action="alterar-emprestimo.php" method="POST">
                <div class="col-md-3">
                    <label for="CPF" class="form-label">Código do emprestimo</label>
                    <input type="text" class="form-control" id="codEmprestimo " name="codEmprestimo" value="<?php echo $codigoEmprestimo; ?>" disabled>
                </div>               
                <div class="col-md-3">
                    <label for="CPF" class="form-label">Código do livro</label>
                    <input type="text" class="form-control" id="codEmprestimo " name="codigoLivro" value="<?php echo $codigo; ?>" disabled>
                </div>               
                <div class="col-md-3">
                    <label for="CPF" class="form-label">CPF do leitor</label>
                    <input type="text" class="form-control" id="codEmprestimo " name="CPF" value="<?php echo $chave; ?>" disabled>
                </div>
               
                <div class="col-md-3">
                    <label for="data-saida" class="form-label">Data do Emprestimo</label>
                    <input type="date" class="form-control" id="emprestimo" name="emprestimo" disabled value="<?php echo $emprestimo; ?>" required>
                </div>
                <div class="col-md-3">
                    <label for="data-saida" class="form-label">Data de Devolução</label>
                    <input type="date" class="form-control" id="devolucao" name="devolucao" value="<?php echo $devolucao; ?>" required>
                </div>
                <div class="col-12 pt-3">
					<input type="hidden" name="codEmprestimo" value="<?php echo $codigoEmprestimo; ?>">
                    <button type="submit" class="btn btn-succsess" name="alterar">Salvar</button>
                    <a href="./emprestimo.php" class="btn btn-secondary">Voltar</a>
                </div>
            </form>
        </div>
    </div>
    <?php
		include_once '../controle-principal/bootjs.php';
		?>
</body>
</html>