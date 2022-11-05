<?php
include_once '../controle-principal/restrito.php'
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="./css/leitores.css">
    <link type="text/javascipt" href="./js/script.js">
    <link rel="shortcut icon" href="../assets/IMG_9038.jpg" type="image/x-icon">
    <link type="text/javascript" href="./node_modules/jquery/dist/jquery.min.js" />
    <title>Busca Leitores</title>
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
            $observacao = $campo['observacao'] ?? '';
                     
		?>
    <div class="container">
        <div class="card mb-3 p-3 mt-3">
            <img src="../assets/imagens/photo-output.jpg" class="card-img-top">
            <h1 class="card-title display-4 text-center">Busca Leitor</h1>
            <form class="row g-3" action="incluir-leitores.php" method="POST">
                <div class="form-group col-md-12">
                    <label for="CPF" class="form-label">CPF</label>
                    <input type="text" class="form-control col-3" id="CPF" name="CPF" maxlength="14"
                        value="<?php echo $chave; ?>" placeholder='000.000.000-00' disabled>
                </div>
                <div class="col-md-8">
                    <label for="nome" class="form-label">Nome Completo</label>
                    <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $nome; ?>" required>
                </div>
                <div class="col-md-3">
                    <label for="nascimento" class="form-label">Data de Nascimento</label>
                    <input type="date" class="form-control" id="nascimento" name="nascimento"
                        value="<?php echo $nascimento ?>" required>
                </div>
                <div class="col-md-8">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>"
                        required>
                </div>
                <div class="col-md-2">
                    <label for="numero" class="form-label">CEP</label>
                    <input type="number" class="form-control" id="cep" name="cep" maxlength="9" value="<?php echo $cep; ?>" required>
                </div>
                <div class="col-md-7">
                    <label for="endereco" class="form-label">Endereço</label>
                    <input type="text" class="form-control" id="endereco" name="endereco"
                        value="<?php echo $endereco; ?>" required>
                </div>
                <div class="col-md-1">
                    <label for="numero" class="form-label">Número</label>
                    <input type="number" class="form-control" id="numero" name="numero" value="<?php echo $numero; ?>"
                        required>
                </div>
                <div class="col-md-2">
                    <label for="cidade" class="form-label">Cidade</label>
                    <input type="text" class="form-control" id="cidade" name="cidade" value="<?php echo $cidade; ?>"
                        required>
                </div>
                <div class="col-md-2">
                    <label for="estado" class="form-label">Estado</label>
                        <select class="form-control md-2" id="estado" name="estado" required >
                            <option value="">Selecione</option>
                            <option value="AC">Acre</option>
                            <option value="AL">Alagoas</option>
                            <option value="AP">Amapá</option>
                            <option value="AM">Amazonas</option>
                            <option value="BA">Bahia</option>
                            <option value="CE">Ceará</option>
                            <option value="DF">Distrito Federal</option>
                            <option value="ES">Espirito Santo</option>
                            <option value="GO">Goiás</option>
                            <option value="MA">Maranhão</option>
                            <option value="MS">Mato Grosso do Sul</option>
                            <option value="MT">Mato Grosso</option>
                            <option value="MG">Minas Gerais</option>
                            <option value="PA">Pará</option>
                            <option value="PB">Paraíba</option>
                            <option value="PR">Paraná</option>
                            <option value="PE">Pernambuco</option>
                            <option value="PI">Piauí</option>
                            <option value="RJ">Rio de Janeiro</option>
                            <option value="RN">Rio Grande do Norte</option>
                            <option value="RS">Rio Grande do Sul</option>
                            <option value="RO">Rondônia</option>
                            <option value="RR">Roraima</option>
                            <option value="SC">Santa Catarina</option>
                            <option value="SP">São Paulo</option>
                            <option value="SE">Sergipe</option>
                            <option value="TO">Tocantins</option>
                        </select>
                </div>
                <div class="col-md-3">
                    <label for="telefone" class="form-label">Telefone para Contato</label>
                    <input type="text" class="form-control" id="telefone" name="telefone"
                        value="<?php echo $telefone; ?>" placeholder="(00)00000-0000" required>
                </div>
                <div class="col-sm-10">
                    <label for="status">Status do Cliente</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="gridRadios1" value="ativo"
                            checked required>
                        <label <?php if ($status == 'ativo') {echo "checked";}; ?> class="form-check-label"
                            for="gridRadios1">
                            Ativo
                        </label>
                    </div>
                    <div class="form-check">
                        <input <?php if ($status == 'bloqueado') {echo "checked";}; ?> class="form-check-input"
                            type="radio" name="status" id="gridRadios2" value="bloqueado" required>
                        <label class="form-check-label" for="gridRadios2">
                            Bloqueado
                        </label>
                    </div>
                    <div class="col-sm-12">
                        <label for="observacao" class="observacaoArea">Observações</label>
                        <textarea class="form-control observacao" id="observacao" rows="3" name="observacao"
                            placeholder="Observações do leitor"><?php echo $observacao; ?></textarea>
                    </div>
                    <div class="col-12 pt-3">
                        <input type="hidden" name="CPF" value="<?php echo $chave ?>">
                        <button type="submit" name="alterar" class="btn btn-succsess">Salvar</button>
                        <button type="button" class="btn btn-secondary"
                            onclick="location.href='../controle-leitores/leitores.php'">Voltar</button>
                    </div>
            </form>
        </div>
    </div>
    <script>
    (document).ready(function() {

        function limpa_formulário_cep() {
            // Limpa valores do formulário de cep.
            $("#endereco").val("");
            $("#bairro").val("");
            $("#cidade").val("");
            $("#uf").val("");
            $("#ibge").val("");
        }

        //Quando o campo cep perde o foco.
        $("#cep").blur(function() {

            //Nova variável "cep" somente com dígitos.
            var cep = $(this).val().replace(/\D/g, '');

            //Verifica se campo cep possui valor informado.
            if (cep != "") {

                //Expressão regular para validar o CEP.
                var validacep = /^[0-9]{8}$/;

                //Valida o formato do CEP.
                if (validacep.test(cep)) {

                    //Preenche os campos com "..." enquanto consulta webservice.
                    $("#rua").val("...");
                    $("#bairro").val("...");
                    $("#cidade").val("...");
                    $("#uf").val("...");
                    $("#ibge").val("...");

                    //Consulta o webservice viacep.com.br/
                    $.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function(dados) {

                        if (!("erro" in dados)) {
                            //Atualiza os campos com os valores da consulta.
                            $("#rua").val(dados.logradouro);
                            $("#bairro").val(dados.bairro);
                            $("#cidade").val(dados.localidade);
                            $("#uf").val(dados.uf);
                            $("#ibge").val(dados.ibge);
                        } //end if.
                        else {
                            //CEP pesquisado não foi encontrado.
                            limpa_formulário_cep();
                            alert("CEP não encontrado.");
                        }
                    });
                } //end if.
                else {
                    //cep é inválido.
                    limpa_formulário_cep();
                    alert("Formato de CEP inválido.");
                }
            } //end if.
            else {
                //cep sem valor, limpa formulário.
                limpa_formulário_cep();
            }
        });
    });
    </script>
    <?php 
    include_once '../controle-principal/bootjs.php';
  ?>
</body>

</html>