
<?php
   session_start();
  
   require "conexao.php";
   require "cadastroService.php";
   require "cadastro.php";
   
   //Verifica se o atributo $acao existe.
   $acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;
   
   if($acao == 'login'){
     
      $cadastro = new Cadastro(null, null, null, null, null);
      $conexao = new Conexao();
      $cadastroService = new cadastroService($conexao, $cadastro);
      $autenticado = $cadastroService->validar_acesso();
      
      if($autenticado){
         $_SESSION['autenticado'] = 'SIM';
         header("Location: home.php");
      }else {
         $_SESSION['autenticado'] = 'NAO';
         header('Location: index.php?login=erro');
      }
      

   }else if($acao == 'inserir' && $_SERVER['REQUEST_METHOD'] == 'POST'){//Entrada dos dados.

      if(!empty($_POST['name']) && !empty($_POST['cpf'])  && !empty($_POST['endereco'])  && !empty($_POST['telefone'])  && !empty($_POST['localizacao'])){
   
         $cadastro = new Cadastro($_POST['name'], str_replace([".", "-",";",","], "", $_POST['cpf']), $_POST['endereco'], $_POST['telefone'], $_POST['localizacao']);
         $conexao = new Conexao();
         $cadastroService = new cadastroService($conexao, $cadastro);
         
         $resultado = $cadastroService->verificar_usuario();
          
         //antes inserir verifica se o usuário existe
         if(!empty($resultado)){
            header('Location: home.php?usuario=existe');
         }else{
            $cadastroService->inserir();
            header('Location: home.php?inclusao=1');
         }
         
      }else {
         header('Location: home.php?erro=1');
      }

   }else if($acao == 'remover'){//Remover o usuário pelo cpf
      
     
      $cadastro = new Cadastro(null, $_POST['cpf'], null, null, null);
      $conexao = new Conexao();
      $cadastroService = new  cadastroService($conexao, $cadastro);

      $resultado = $cadastroService->verificar_usuario();
      
      //verifica a existência do usuário
      if(!empty($resultado)){
         $cadastroService->remover();
         header('Location: remover_usuario.php?inclusao=2');
      }else {
         header('Location: remover_usuario.php?erro=2');
      }
      
     

   }else if($acao == 'listar_usuarios'){ //lista os usuarios do banco de dados
      
      
      $cadastro = new Cadastro(null, null, null, null, null);
      
      $conexao = new Conexao();
      
      $cadastroService = new  cadastroService($conexao, $cadastro);
      $resultado = $cadastroService->listar_usuarios(); 
      

   }

?>