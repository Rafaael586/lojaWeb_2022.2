<?php

include_once("./service/DAO.php");

    class Usuario{
        public $id_usuario;//PK - primary key (int)
        public $nome;
        public $foto;
        public $cpf;
        public $email;
        public $senha;
        public $telefone;
        public $ative = true;

        function add(){
            try{
                $dao = new DAO;
                $conn = $dao->conecta();//conectar ao banco de dados;
                $sql = "INSERT into usuario (nome, foto, cpf, email, senha, telefone) 
                VALUES (:nome, :foto, :cpf, :email, :senha, :telefone)";//Criar o comando SQL com os paramentos
                $stman = $conn->prepare($sql);//Prepara o comando SQL para executar;
                $stman->bindParam(":nome", $this->nome);
                $stman->bindParam(":email", $this->email);
                $stman->bindParam(":cpf", $this->cpf);
                $stman->bindParam(":foto", $this->foto);
                $stman->bindParam(":senha", $this->senha);
                $stman->bindParam(":telefone", $this->telefone);
                $stman->execute();//grava dos dados no banco de dados;
            }catch(Exception $e){
                //log
                throw new Exception("Erro ao cadastra o usuario! ".$e->getMessage());
            }
        }
    }
?>