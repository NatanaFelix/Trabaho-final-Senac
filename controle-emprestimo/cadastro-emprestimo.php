<?php
include_once '../controle-principal/restrito.php'
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="./css/emprestimo.css">
    <link type="text/javascript" href="./node_modules/jquery/dist/jquery.min.js" />
    <link type="text/javascript" href="./js/javascript.js ">
    <title>Cadastro Emprestimo</title>
</head>

<body>
    <?php
        include_once '../assets/navbar-principal.php';
        include_once '../controle-principal/conexao.php';
        include_once '../controle-principal/funcoes.php';  
    ?>
    <div class="container">
        <div class="card mb-3 p-3 mt-3">
            <img src="../assets/imagens/photo-output.jpg" class="card-img-top">
            <h1 class="card-title display-4 text-center"> Cadastrar Emprestimo</h1>

            <form class="row g-3" action="incluir-emprestimo.php" method="POST">
                <div class="col-md-3">
                    <label for="cod-livro" class="cod-livro">Código do livro</label>
                    <select class="form-control" id="codLivro" name="codLivro" required>
                        <option>Selecione o código do livro</option>
                        <?php
                        
                        $sql = "SELECT * FROM livros";
                        $dados = mysqli_query($conexao, $sql);
                        while ($linha = mysqli_fetch_assoc($dados)) {

                            // pega os valores de cada linha e coloca em options apenas os livros que possuem quantidades disponíveis no banco
                            $codigo = $linha['ISBN'];
                            $titulo = $linha['titulo'];
                            $emprestados = $linha['emprestados'];
                            $quantidade = $linha['quantidade'];
                            if($emprestados < $quantidade){
                                echo "<option>$codigo</option>";
                            }
                        }
                    
                        ?>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="cod-livro" class="cod-livro">CPF do Leitor</label>
                    <select class="form-control" id="CPF" name="CPF" required>
                        <option>Selecione o CPF Leitor</option>
                        <?php
                        $status = "SELECT * FROM leitores WHERE status = 'ativo'";
                        // echo $status;
                        if($status = 'ativo'){ 
                        $sql = "SELECT * FROM leitores";
                        $dados = mysqli_query($conexao, $sql);
                        while ($linha = mysqli_fetch_assoc($dados)) {
                            // pega os valores de cada linha e coloca em options apenas os leitores ativos no banco
                            $chave = $linha['CPF'];  
                            $item = $linha['item'];  
                            $status = $linha['status'];  
                            if($status == 'ativo'){
                            echo "<option>$chave</option>  ";
                            }
                            } 
                        }
                    ?>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="data-saida" class="form-label">Data do Emprestimo</label>
                    <input type="date" class="form-control" id="emprestimo" name="emprestimo"
                        value="<?php echo date('Y-m-d'); ?>" disabled>
                </div>
                <div class="col-md-3">
                    <label for="data-saida" class="form-label">Data de Devolução</label>
                    <input type="date" class="form-control" id="devolucao" name="devolucao" required>
                </div>
                <div class="col-12 pt-3">
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                    <a href="./emprestimo.php" class="btn btn-secondary">Voltar</a>
                </div>
            </form>
        </div>
    </div>
    <?php
		include_once '../controle-principal/bootjs.php';
	?>
    <script>
        $(document).ready(function(){
    $('name["type="codLivro""]').on("keyup input", function(){
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".resultcod");
        if(inputVal.length){
            $.get("cadastro-emprestimo.php", {term: inputVal}).done(function(data){
                // Display the returned data in browser
                resultDropdown.html(data);
            });
        } else{
            resultDropdown.empty();
        }
    });
    // Set search input value on click of result item
    $(document).on("click", ".resultcod p", function(){
        $(this).parents('name["type="codLivro""]').find('input[type="text"]').val($(this).text());
        $(this).parent(".resultcod").empty();
    });
});
    </script>
</body>

</html>