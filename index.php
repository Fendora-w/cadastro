<html>
  <head>
    <meta charset="utf-8" />
    <title>App Cadastro</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      .card-login {
        padding: 30px 0 0 0;
        width: 350px;
        margin: 0 auto;
      }
    </style>
  </head>

  <body>

    <nav class="navbar navbar-dark bg-dark p-3">
        <a class="navbar-brand" href="#"></a>
        <ul class="nav  me-4 "></ul>
    </nav>

    <div class="container">    
      <div class="row">

        <div class="card-login">
          <div class="card">
            <div class="card-header">
              Login
            </div>
            <div class="card-body">
              <form action="controller.php?acao=login" method="POST">
                <div class="form-group">
                  <input name="email" type="email" class="form-control" placeholder="E-mail">
                </div>
                <div class="form-group">
                  <input name="senha" type="password" class="form-control" placeholder="Senha">
                </div>
                <button class="btn btn-lg btn-info btn-block" type="submit">Entrar</button>
                 
                <!-- Retorna um erro porque o usuario digitou o email usuario ou senha errado -->
                <?php if(isset($_GET['login']) &&$_GET['login'] == 'erro') { ?>
                    <div class='text-danger'>
                      Usuário ou senha inválidos(s).
                    </div>
                <?php  } ?>
               
                <!-- Retorna o erro porque o usuário tentou acessar o arquivo direto sem autenticação -->
                <?php if(isset($_GET['login']) && $_GET['login'] == 'erro2') { ?>
                    <div class='text-danger'>
                      Faça login, antes de acessar a página
                    </div>
                <?php  } ?>
              </form>
            </div>
          </div>
        </div>
    </div>
  </body>
</html>