<?php require_once('validador_acesso.php') ?>
<!DOCTYPE html>
<html ang="en">
<head>
    <meta charset="UTF-8">
    <title>Deletar Usuário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
     <!-- Estilo customizado -->
     <link rel="stylesheet" type="text/css" href="estile.css">
</head>
<body>
     
   
    <nav class="navbar navbar-dark bg-dark p-3">
        <a class="navbar-brand" href="#"></a>
        <ul class="nav  me-4 ">
            <li class="nav-item  d-inline me-2">
                <a class="btn btn-outline-primary" href="home.php">VOLTAR</a>
            </li>
            <li class="nav-item">
                <a class="btn btn-outline-danger ms-3" href="logoff.php">SAIR</a>
            </li>
        </ul>
    </nav>
    
    <!-- Início mostra msg que o usuário foi removido com sucesso! -->
    <?php if(isset($_GET['inclusao']) && $_GET['inclusao'] == 2) { ?>
        <div class="container">
            <div id="successMessage" class="alert bg-success mx-auto mt-4 format text-center" role="alert">
                <span class="text-white">Usuário removido com sucesso!</span>
             </div>
        </div> 
            
        <script>
            setTimeout(function() {
                document.getElementById('successMessage').classList.add('d-none');
             }, 4000); // Oculta a div após 5 segundos (4000 milissegundos)
        </script>     
    <?php } ?>
    <!-- Fim -->

    <p class="h3 text-center mt-4">Remover usuário</p>
    
    <form  method="POST" action="controller.php?acao=remover">
        <div class="mb-4 mt-4 mx-auto format">
            <label for="cpf">ID USUÁRIO</label>
            <input type="txt" name='cpf' class="form-control"  autocomplete="off" placeholder="Digita o CPF">
        </div>
        <div class="d-grid gap-2 mx-auto format mb-4">
            <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                Remover
            </button>
        </div>

        <!-- Início Bloco imprimir msg que o usuário não existe no banco de dados. *-->
        <?php if(isset($_GET['erro']) && $_GET['erro'] == 2) { ?>
        
            <div class='text-danger format mx-auto mt-2' id="limparBurfer">
                Usuário inexistente
            </div>
            
            <Script>

                function limparTela() {
                    const limparBurfer = document.getElementById('limparBurfer')
                    limparBurfer.innerHTML = ''
                }
                
                setTimeout(limparTela, 5000);

            </Script>
        <?php } ?>
        <!-- fim  -->
       
    </form>
    
   
    
</body>

</html>
