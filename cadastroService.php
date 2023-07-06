<?php 


class cadastroService {
    
    private $conexao;
    private $cadastro;

    public function __construct(Conexao $conexao, Cadastro $cadastro){
        $this->conexao = $conexao->conectar();//conectar ao banco de dados
        $this->cadastro = $cadastro;//instancia a classe cadastro com os atributos
    }

    public function validar_acesso(){ //valida o acesso do usuário

        $query = "SELECT * FROM db_usuarios_login";
        $stmt = $this->conexao->prepare($query);
        // $stmt->bindValue(':email', $this->cadastro->__get('email'));
        // $stmt->bindValue(':senha', $this->cadastro->__get('senha'));
        $stmt->execute();
        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $autenticado = false;

        foreach($resultado as $usuario){
            if($usuario['email'] == $_POST['email'] && $usuario['senha'] == $_POST['senha']){
                $autenticado = true;
            }
        }
        return $autenticado;

    }

    public function inserir(){//inserir os dados do usuáio
        $query = "INSERT INTO db_usuarios(nome, cpf, endereco, telefone, localizacao) values (:nome, :cpf, :endereco, :telefone, :localizacao)";
        $stmt  = $this->conexao->prepare($query);
        $stmt->bindValue(':nome', $this->cadastro->__get('name'));
        $stmt->bindValue(':cpf', $this->cadastro->__get('cpf'));
        $stmt->bindValue(':endereco', $this->cadastro->__get('endereco'));
        $stmt->bindValue(':telefone', $this->cadastro->__get('telefone'));
        $stmt->bindValue(':localizacao', $this->cadastro->__get('localizacao'));
        $stmt->execute();
    }

    public function remover(){ //remover o usuário com o cpf
       $query = "DELETE FROM db_usuarios WHERE cpf = :cpf";
       $stmt = $this->conexao->prepare($query);
       $stmt->bindValue(':cpf', $this->cadastro->__get('cpf'));
       return $stmt->execute();
    }

    public function verificar_usuario() {//verificar se o usuário existe no banco de dados.
        $query = "SELECT * FROM db_usuarios WHERE cpf = :cpf";
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':cpf', $this->cadastro->__get('cpf'));
        $stmt->execute();
        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        return $resultado;
    }
    
    public function listar_usuarios(){//lista todos os usuários cadastrados.
        $query = "SELECT * FROM db_usuarios";
        $stmt = $this->conexao->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>