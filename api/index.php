<?php
include_once("./config/config.php");
include_once("./model/Usuario.php");

$method = $_SERVER["REQUEST_METHOD"];
$router = $_SERVER["PATH_INFO"];

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST, GET, PUT, OPTIONS");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Max-Age: 3600"); //1hora == 3600 seg;
header("Access-Control-Allow-Credentials: true");

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

