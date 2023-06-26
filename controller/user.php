<?php

namespace controller;

include_once 'C:\xampp\htdocs\web\model\user.php';
include_once 'C:\xampp\htdocs\web\model\conn.php';

use model\User;
use model\Conexao;

class UserController
{
    public static function selectByLogin(User $user)
    {
        $login = $user->getLogin();
        $sql = "SELECT * FROM usuario WHERE login='" . $login . "';";
        $conn = Conexao::conectar();
        $result = $conn->query($sql);
        $conn = Conexao::desconectar();

        $users = [];

        foreach ($result as $c) {
            $user = new User($c["id"], $c["login"], $c["senha"]);
            $users[] = $user;
        }

        if (sizeof($users) > 0) {
            return $users[0];
        } else {
            return false;
        }
    }

    public static function verificaSenha(User $user)
    {
        $db_user = UserController::selectByLogin($user);
        if ($db_user) {
            $pass = md5($user->getSenha());
            if ($db_user->getSenha() === $pass) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
