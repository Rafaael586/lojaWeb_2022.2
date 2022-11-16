<?php

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
            return "Cadastrado";
        }
    }
?>