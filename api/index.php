<?php
include_once("./config/config.php");
include_once("./controller/usuario.php");

$method = $_SERVER["REQUEST_METHOD"];
$router = $_SERVER["PATH_INFO"];

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST, GET, PUT, OPTIONS");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Max-Age: 3600"); //1hora == 3600 seg;
header("Access-Control-Allow-Credentials: true");

var_dump($_SERVER);

usuarioController($method, $router);