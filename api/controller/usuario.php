<?php

include_once("./model/Usuario.php");
function usuarioController($method, $router)
{
    if ($method == "POST") {
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

    if ($method == "GET") {
        if ($router == "/usuario/list") {
            try {
                $user = new Usuario();
                $result = $user->getAll();
                echo json_encode($result);
            } catch (Exception $e) {
                echo json_encode("error:" . $e->getMessage());
            }
        }
        if (!empty(strstr($router, "/usuario/get"))) {
            try {
                //$id = $_GET["id"];
                //var_dump($_GET);
                //var_dump(explode("/", $router)); //explode: separa uma string em vetor com base em um caracter. No exemplo o "/"
                $id = explode("/", $router)[3];
                $user = new Usuario();
                $result = $user->get($id);
                echo json_encode($result);
            } catch (Exception $e) {
                echo json_encode("error:" . $e->getMessage());
            }
        }
    }
}