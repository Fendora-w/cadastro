<?php
   require_once('validador_acesso.php');
   require "controller.php";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
        <!-- Estilo customizado -->
        <link rel="stylesheet" type="text/css" href="estile.css">
        <title>Lista de Usuarios</title>
    </head>
    <body>

    <nav class="navbar navbar-dark bg-dark p-3">
        <a class="navbar-brand" href="#"></a>
        <ul class="nav  me-4">
            <li class="nav-item  d-inline me-2">
                <a class="btn btn-outline-primary" href="home.php">VOLTAR</a>
            </li>
            <li class="nav-item">
                <a class="btn btn-outline-danger ms-3" href="logoff.php">SAIR</a>
            </li>
        </ul>
    </nav>
       
    <div class="table-responsive mx-auto" style="max-width: 90%;">
        <table class="table table-striped table-hover caption-top  mt-4">
            <caption>
                <div class="d-flex justify-content-between align-items-center">
                    <p class="h3 mt-4">Lista de usuários cadastrados</p>
                    <button type="button" class="btn btn-outline-primary" onclick="window.print()">IMPRIMIR</button>
                </div>
            </caption>
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">NOME</th>
                <th scope="col">CPF</th>
                <th scope="col">ENDEREÇO</th>
                <th scope="col">TELEFONE</th>
                <th scope="col">LOCALIZAÇÃO</th>
                </tr>
            </thead>
            <tbody>
                <? foreach($resultado as $usuarios){?> 
                    <tr>       
                    <th scope="row"><?= $usuarios['id']?></th>
                    <td><?= $usuarios['nome']?></td>
                    <td><?= $usuarios['cpf']?></td>
                    <td><?= $usuarios['endereco']?></td>
                    <td><?= $usuarios['telefone']?></td>
                    <td><?= $usuarios['localizacao']?></td>
                    </tr>
                <? }?>
            </tbody>
            
        </table>
    </div>
   
    </body>
</html>