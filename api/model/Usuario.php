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
                throw new Exception("Erro ao cadastra o usuario! ".$e->getMessage());
            }
        }

        function getAll(){
            try {
                $dao = new DAO;
                $conn = $dao->conecta();
                $sql = "SELECT id_usuario, nome, foto, cpf, email, telefone, data_nasc, ativo from usuario where usuario.ativo = true";
                $stman = $conn->prepare($sql);
                $stman->execute();
                $result = $stman->fetchAll();
                return $result;
                //return $stman->fetchAll();
            } catch (PDOException $pdoe) {
                throw new Exception("Erro ao executar comando na base de dados! ".$pdoe->getMessage());
            } catch (JsonException $jsone) {
                throw new Exception("Erro ao montar o json! ".$jsone->getMessage());
            } catch (Exception $e) {
                throw new Exception("Erro ao listar todos os usuario! ".$e->getMessage());
            }
        }

        function get($id){
             try {
                $dao = new DAO;
                $conn = $dao->conecta();
                $sql = "SELECT id_usuario,nome, foto, cpf, email, telefone, data_nasc, ativo 
                from usuario 
                where usuario.id_usuario=:id 
                and usuario.ativo = true";
                $stman = $conn->prepare($sql);
                $stman->bindParam(":id", $id);
                $stman->execute();
                $result = $stman->fetchAll();
                return $result;
                //return $stman->fetchAll();
            } catch (PDOException $pdoe) {
                throw new Exception("Erro ao executar comando na base de dados! ".$pdoe->getMessage());
            } catch (JsonException $jsone) {
                throw new Exception("Erro ao montar o json! ".$jsone->getMessage());
            } catch (Exception $e) {
                throw new Exception("Erro ao listar todos os usuario! ".$e->getMessage());
            }
        }
    }
?>