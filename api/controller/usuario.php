<?php
include_once("./model/Usuario.php");

function usuarioController($method, $router)
{
    if ($method == "POST") {
        if ($router == "/usuario/add") {
            try {
                $dados = json_decode(file_get_contents('php://input'));
                //var_dump($dados);
                $user = new Usuario();
                $user->nome = $dados->nome;
                $user->email = $dados->email;
                $user->senha = $dados->senha;
                $user->cpf = $dados->cpf;
                $user->foto = $dados->foto;
                $user->telefone = $dados->telefone;
                $user->data_nasc = $dados->data_nasc;
                $user->ativo = $dados->ativo;
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