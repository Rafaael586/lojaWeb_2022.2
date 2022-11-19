<?php
include_once("./config/config.php");

$method = $_SERVER["REQUEST_METHOD"];
$router = $_SERVER["PATH_INFO"];

var_dump($_SERVER);

if($method == "POST"){
    if ($router == "/usuario/add"){
        echo "Cadastro do usuario!";
        $dadosEntrada = json_decode(file_get_contents('php://input'));
        var_dump($dadosEntrada);
    }
}

