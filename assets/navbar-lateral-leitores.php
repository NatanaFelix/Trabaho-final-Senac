<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../assets/css/barra-lateral.css">
    <title>Document</title>
</head>
<body>
    <ul class="nav-lateral nav nav-pills justify-content-center">
        <li class="nav-item" id="sub-navegacao">
            <a class="nav-link active" href="./cadastro-leitores.php"><i class="fas fa-user-circle"></i> Cadastro Leitores</a>
        </li>
        <li class="nav-item" id="sub-navegacao">
            <a class="nav-link active" href="./pesquisa-leitores.php"><i class="fas fa-search"></i> Consulta Leitores</a>
        </li>
        <li class="nav-item" id="sub-navegacao">
            <a class="nav-link active" href="./editar-leitores.php"><i class="fas fa-user-edit"></i> Editar Leitores</a>
        </li>
    </ul>
    <?php
    include_once '../controle-principal/bootjs.php';
    ?>
</body>
</html>