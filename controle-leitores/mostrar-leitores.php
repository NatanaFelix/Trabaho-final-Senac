<?php
include_once '../controle-principal/restrito.php'
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="./css/leitores.css">
    <link rel="shortcut icon" href="../assets/IMG_9038.jpg" type="image/x-icon">    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<title>Alterar Leitores</title>
</head>
<body>
    <?php
			include_once '../controle-principal/conexao.php';
			include_once '../assets/navbar-principal.php';
			include_once '../controle-principal/funcoes.php';

            // pega o name(cpf) que veio do formulário anterior (clientes.php) e coloca na variavel $chave
            $chave = $_GET['CPF'];

            // monta a query que vai ser executada na variavel $sql
            $sql = "SELECT * FROM leitores WHERE CPF = '$chave'";

            // realiza uma busca na tabela clientes usando a chave de busca cpf = $chave com a query $sql
            $resultado = mysqli_query($conexao,$sql);

            // separa $resultado em $campo (array) para poder chamar ex: $campo['endereco'], onde endereco é o nome do campo na tabela
            $campo = mysqli_fetch_array($resultado);

            // coloca em variaveis todos os campos da tabela clientes que foi selecionada pela chave passada no método POST
            $nome = $campo['nome'] ?? '' ;
            $endereco = $campo['endereco'] ?? '';
            $cep = $campo['cep'] ?? '';
            $numero = $campo['numero'] ?? '';
            $cidade = $campo['cidade'] ?? '';
            $uf = $campo['estado'] ?? '';
            $nascimento = $campo['nascimento'] ?? '';
            $telefone = $campo['telefone'] ?? '';
            $email = $campo['email'] ?? '';;
            $status= $campo['status'] ?? '';;
            $observacao = $campo['observacao'] ?? '';;
            
		?>

    <div class="container">
        <div class="card mb-3 p-3 mt-3">
            <img src="../assets/imagens/photo-output.jpg" class="card-img-top">
            <h1 class="card-title display-4 text-center">Alterar Leitor</h1>
            <form class="row g-3" action="alterar-leitores.php" method="POST">
                <div class="col-md-3">
                    <label for="CPF" class="form-label">CPF</label>
                    <input type="text" class="form-control" id="CPF" name="CPF" maxlength="14"
                        value="<?php echo $chave; ?>" disabled>
                </div>
                <div class="col-md-8">
                    <label for="nome" class="form-label">Nome Completo</label>
                    <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $nome; ?>">
                </div>
                <div class="col-md-3">
                    <label for="nascimento" class="form-label">Data de Nascimento</label>
                    <input type="date" class="form-control" id="nascimento" name="nascimento"
                        value="<?php echo $nascimento ?>">
                </div>
                <div class="col-md-8">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>">
                </div>
                <div class="col-md-2">
                    <label for="numero" class="form-label">CEP</label>
                    <input type="number" class="form-control" id="cep" name="cep" value="<?php echo $cep; ?>">
                </div>
                <div class="col-md-7">
                    <label for="endereco" class="form-label">Endereço</label>
                    <input type="text" class="form-control" id="endereco" name="endereco"
                        value="<?php echo $endereco; ?>">
                </div>
                <div class="col-md-1">
                    <label for="numero" class="form-label">Número</label>
                    <input type="number" class="form-control" id="numero" name="numero" value="<?php echo $numero; ?>">
                </div>
                <div class="col-md-2">
                    <label for="cidade" class="form-label">Cidade</label>
                    <input type="text" class="form-control" id="cidade" name="cidade" value="<?php echo $cidade; ?>">
                </div>
                <div class="col-md-2">
                    <label for="estado" class="form-label">Estado</label>
                    <input type="text" class="form-control" id="estado" name="estado" placeholder="UF" required
                        value="<?php echo $uf; ?>">
                </div>
                <div class="col-md-3">
                    <label for="telefone" class="form-label">Telefone para Contato</label>
                    <input type="text" class="form-control" id="telefone" name="telefone"
                        value="<?php echo $telefone; ?>">
                </div>
                <div class="col-sm-10">
                    <label for="status">Status do Cliente</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="gridRadios1" value="ativo"
                            checked>
                        <label <?php if ($status == 'ativo') {echo "checked";}; ?> class="form-check-label" for="gridRadios1">
                            Ativo
                        </label>
                    </div>
                    <div class="form-check">
                        <input <?php if ($status == 'bloqueado') {echo "checked";}; ?> class="form-check-input" type="radio" name="status" id="gridRadios2" value="bloqueado">
                        <label class="form-check-label" for="gridRadios2">
                            Bloqueado
                        </label>
                    </div>
                    <div class="col-sm-12">
                        <label for="observacao" class="observacaoArea">Observações</label>
                        <textarea class="form-control observacao" id="observacao" rows="3" name="observacao" placeholder="Observações do leitor"><?php echo $observacao; ?></textarea>
                    </div>
                    <div class="col-12 pt-3">
                        <input type="hidden" name="CPF" value="<?php echo $chave ?>">
                        <button type="submit" name="alterar" class="btn btn-succsess">Salvar</button>
                        <button type="button" class="btn btn-secondary"
                            onclick="location.href='../controle-leitores/editar-leitores.php'">Voltar</button>
                    </div>
            </form>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            
            // Método para pular campos teclando ENTER
            $('.pula').on('keypress', function(e) {
                var tecla = (e.keyCode ? e.keyCode : e.which);
                
                if (tecla == 13) {
                    campo = $('.pula');
                indice = campo.index(this);

                if (campo[indice + 1] != null) {
                    proximo = campo[indice + 1];
                    proximo.focus();
                    e.preventDefault(e);
                }
            }
        });

        // Método para consultar o CEP
        $('#cep').on('blur', function() {

            if ($.trim($("#cep").val()) != "") {
                
                $("#mensagem").html('(Aguarde, consultando CEP ...)');
                $.getScript(
                    "http://cep.republicavirtual.com.br/web_cep.php?formato=javascript&cep=" +
                    $("#cep").val(),
                    function() {

                        if (resultadoCEP["resultado"]) {
                            $("#endereco").val(unescape(resultadoCEP["tipo_logradouro"]) + " " +
                            unescape(resultadoCEP["logradouro"]));
                            $("#cidade").val(unescape(resultadoCEP["bairro"]));
                            
                            $("#estado").val(unescape(resultadoCEP["uf"]));
                        }

                        $("#mensagem").html('');
                    });
            }
        });
    });
    </script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<?php 
    include_once '../controle-principal/bootjs.php';
?>
</body>
</html>