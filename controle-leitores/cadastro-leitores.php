<?php
include_once '../controle-principal/restrito.php'
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="./css/leitores.css">
    <title>Cadastrar Leitores</title>
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
            <h1 class="card-title display-4 text-center"> Cadastrar Leitores</h1>
            <form class="row g-3" action="busca-cpf.php" method="GET">
                <div class="form-group col-md-3">
                    <label for="CPF" class="form-label">CPF</label>
                    <input type="text" class="form-control" id="CPF" name="CPF" maxlength="14"
                        placeholder='000.000.000-00'>
                </div>
                <div class="form-group col-md-6 pt-4 mt-2">
                    <button type="submit" class="btn btn-primary">Buscar</button>
                </div>
                <div class="col-md-8">
                    <label for="nome" class="form-label">Nome Completo</label>
                    <input type="text" class="form-control" id="nome" name="nome" placeholder='Insira o nome completo'
                        disabled>
                </div>
                <div class="col-md-3">
                    <label for="nascimento" class="form-label">Data de Nascimento</label>
                    <input type="date" class="form-control" id="CPF" name="nascimento" placeholder="00/00/0000" disabled>
                </div>
                <div class="col-md-8">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="email@email.com"
                        disabled>
                </div>
                <div class="col-md-2">
                    <label for="cep">CEP</label>
                    <input type="number" class="form-control" id="cep" name="cep" maxlength="9" placeholder="00000-000"
                        disabled>
                </div>
                <div class="col-md-8">
                    <label for="endereco" class="form-label">Endereço</label>
                    <input type="text" class="form-control" id="endereco" name="endereco" placeholder="Seu endereço"
                        disabled>
                </div>
                <div class="col-md-1">
                    <label for="numero" class="form-label">Número</label>
                    <input type="number" class="form-control" id="numero" name="numero" disabled>
                </div>

                <div class="col-md-2">
                    <label for="numero" class="form-label">Estado</label>
                    <select class="form-control" id="ufdoestado" name="uf" disabled >
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
                <div class="col-md-4">
                    <label for="cidade" class="form-label">Cidade</label>
                    <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Cidade" disabled>
                </div>
                <div class="col-md-3">
                    <label for="telefone" class="form-label">Telefone para Contato</label>
                    <input type="text" class="form-control" id="telefone" name="telefone" maxlength="15"
                        placeholder="(00)00000-0000" disabled>
                </div>
                <div class="col-sm-10">
                    <legend class="col-form-label col-sm pt-0">Status do Cliente</legend>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="gridRadios1" value="ativo"
                            disabled>
                        <label class="form-check-label" for="gridRadios1">
                            Ativo
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="gridRadios2" value="bloqueado"
                            disabled>
                        <label class="form-check-label" for="gridRadios2">
                            Bloqueado
                        </label>
                    </div>
                </div>
                <div class="col-12 pt-3">
                    <button type="submit" class="btn btn-primary" disabled>Cadastrar</button>
                    <button type="button" class="btn btn-secondary"
                        onclick="location.href='../controle-leitores/Leitores.php'">Voltar</button>
                </div>
            </form>
        </div>
    </div>
    <?php
		include_once '../controle-principal/bootjs.php';
	?>
</body>

</html>