<?php
include "../model/Usuario.php";

$request = $_REQUEST; //$_GET e $_POST = $_REQUEST


$usuario = new Usuario();
$usuario->nome = $request["nome"];
$usuario->email = $request["email"];
var_dump($usuario);

echo "Editar";