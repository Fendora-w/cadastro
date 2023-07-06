<?php require_once('validador_acesso.php') ?>
<!DOCTYPE html>
<html>
<head>
    <title>Site de Cadastro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" type="text/css" href="estile.css">
</head>
<body>
    <nav class="navbar navbar-dark bg-dark p-3">
        <a class="navbar-brand" href="#"></a>
        <ul class="nav  me-4 ">
            <li class="nav-item">
                <a class="btn btn-outline-primary me-2" href="remover_usuario.php">REMOVER USUÁRIO</a>
            </li>
            <li class="nav-item">
                <a class="btn btn-outline-primary me-2" href="listar_usuarios.php?acao=listar_usuarios">LISTAR USUÁRIOS</a>
            </li>
            <li class="nav-item">
                <a class="btn btn-outline-danger ms-3" href="logoff.php">SAIR</a>
            </li>
        </ul>
    </nav>
    
    <!-- Início mostra msg que o usuário foi cadastrado com sucesso! -->
    <?php if(isset($_GET['inclusao']) && $_GET['inclusao'] == 1) { ?>
        <div class="container">
            <div id="successMessage" class="alert bg-success mx-auto mt-4 format text-center" role="alert">
                <span class="text-white">Registro inserido com sucesso!</span>
             </div>
        </div> 
            
        <script>
            setTimeout(function() {
                document.getElementById('successMessage').classList.add('d-none');
             }, 4000); // Oculta a div após 5 segundos (4000 milissegundos)
        </script>     
    <?php } ?>
    <!-- Fim -->
   
    <!-- Início mostra msg se o usuário já existe e não pode cadastra o mesmo usário 
         com o mesmo CPF -->
    <?php if(isset($_GET['usuario']) && $_GET['usuario'] == 'existe') { ?>
        <div class="container">
            <div id="successMessage" class="alert bg-success mx-auto mt-4 format text-center" role="alert">
                <span class="text-white">Usuário já existe!</span>
             </div>
        </div> 
            
        <script>
            setTimeout(function() {
                document.getElementById('successMessage').classList.add('d-none');
             }, 4000); // Oculta a div após 5 segundos (4000 milissegundos)
        </script>     
    <?php } ?>
   <!-- Fim -->


    <p class="h3 text-center mt-4">Cadastro do Usuário</p>

    <form method="POST" action="controller.php?acao=inserir">
    
        <div class="mb-4 mt-4 mx-auto format">
            <label for="name">Nome completo</label>
            <input type="text" name='name' class="form-control"  autocomplete="off" placeholder="Joaquin da silva">
        </div>
        
        <div class="mb-3 mx-auto format">
            <label for="cpf" class="form-label">CPF</label>
            <input type="text" name="cpf" class="form-control"  autocomplete="off" placeholder="777.666.888-55">
        </div>

        <div class="mb-3 mx-auto format">
            <label for="endereco" class="form-label">Endereço</label>
            <input type="text" name="endereco" class="form-control"  autocomplete="off" placeholder="Endereco">
        </div>
            
        <div class="mb-3 mx-auto format">
            <label for="telefone" class="form-label">Telefone</label>
            <input type="text" name='telefone' class="form-control" autocomplete="off" placeholder="(63) 99999-9999">
        </div>

        <div class="mb-3 mx-auto format">
            <label for="localizacao" class="form-label">Localização</label>
            <input type="text" name="localizacao" class="form-control"  autocomplete="off" placeholder="Palmas-TO">
        </div>
        <div class="d-grid gap-2 mx-auto format">
            <button class="btn btn-primary" type="submit">Registrar</button>
        </div>

        <!-- Início mostra que o sistema não aceita campos vazios -->
        <?php if(isset($_GET['erro']) && $_GET['erro'] == 1) { ?>
        
           <div class='text-danger format mx-auto mt-2' id="limparBurfer">
              Preencha todos os campos para o cadastro *
           </div>
           
           <Script>

                function limparTela() {
                    const limparBurfer = document.getElementById('limparBurfer')
                    limparBurfer.innerHTML = ''
                }
                
                setTimeout(limparTela, 5000);

            </Script>
        <?php } ?>
        <!-- Fim -->

    </form>

</body>
</html>
