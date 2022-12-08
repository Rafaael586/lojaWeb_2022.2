<?php
include_once("./config/config.php");
include_once("./controller/usuario.php");
include_once("./controller/endereco.php");

if (isset($_SERVER["REQUEST_METHOD"]) && isset($_SERVER["PATH_INFO"])) {
    $method = $_SERVER["REQUEST_METHOD"];
    $router = $_SERVER["PATH_INFO"];

    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST, GET, PUT, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: *");
    header("Access-Control-Max-Age: 3600"); //1hora == 3600 seg;
    header("Access-Control-Allow-Credentials: true");

    //var_dump($_SERVER);

    usuarioController($method, $router);
    enderecoController($method, $router);
} else {
    http_response_code(404);
    echo json_encode(array("message" => "Item does not exist."));
}
