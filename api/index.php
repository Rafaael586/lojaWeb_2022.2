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
    if ($router == "/usuario/add") {
        try {
            $dadosEntrada = json_decode(file_get_contents('php://input'));
            $user = new Usuario();
            $user->nome = $dadosEntrada->nome;
            $user->email = $dadosEntrada->email;
            $user->senha = $dadosEntrada->senha;
            $user->add();
            echo "Usuario Cadastrado!";
        } catch (Exception $e) {
            echo json_encode("error:" . $e->getMessage());
        }
    }
}

if($method == "GET"){
    if ($router == "/usuario/list"){
        try {     
            $user = new Usuario();
            $result = $user->getAll();
            echo json_encode($result);
        } catch (Exception $e) {
            echo json_encode("error:" . $e->getMessage());
        }
    }
    if (!empty(strstr($router,"/usuario/get"))){
        try {
            //$id = $_GET["id"];
            //var_dump($_GET);
            //var_dump(explode("/", $router)); 
            $id = explode("/", $router)[3];
            $user = new Usuario();
            $result = $user->get($id);
            echo json_encode($result);
        } catch (Exception $e) {
            echo json_encode("error:" . $e->getMessage());
        }
    }
}

