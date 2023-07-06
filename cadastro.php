<?php

class Cadastro {
     
    private $email;
    private $senha;
    private $id;
    private $name;
    private $cpf;
    private $endereco;
    private $telefone;
    private $localizacao;
     
    public function __construct($name, $cpf, $endereco, $telefone, $localizacao){
        $this->name = $name;
        $this->cpf = $cpf;
        $this->endereco = $endereco;
        $this->telefone = $telefone;
        $this->localizacao = $localizacao;

    }


    public function __get($atributo){
        return $this->$atributo;
    }

    public function __set($atributo, $valor){
        $this->$atributo = $valor;
    }
}

?>