<?php
include "../model/Usuario.php";

$request = $_REQUEST; //$_GET e $_POST = $_REQUEST

if (isset($request["add"])){ //isset = verifica de a variavel foi criada ou existe 
    echo "Cadastro";
}

if (isset($request["edit"])){
    echo "Editar";
}

if (isset($request["list"])){
    echo "Lista";
}