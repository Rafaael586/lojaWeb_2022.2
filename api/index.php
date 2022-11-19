<?php
include_once("./config/config.php");
include_once("./model/Usuario.php");

$method = $_SERVER["REQUEST_METHOD"];
$router = $_SERVER["PATH_INFO"];

var_dump($_SERVER);

if($method == "POST"){
    if ($router == "/usuario/add"){
        try {     
            $dadosEntrada = json_decode(file_get_contents('php://input'));
            var_dump($dadosEntrada);
            $user = new Usuario();
            $user->nome = $dadosEntrada->nome;
            $user->email = $dadosEntrada->email;
            $user->senha = $dadosEntrada->senha;
            $user->add();        
            echo "Usuario Cadastrado!";
        } catch (Exception $e) {
            echo "Erro:" . $e->getMessage();
        }
    }
}

