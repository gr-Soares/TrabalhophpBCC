<?php

namespace view;

include_once 'C:\xampp\htdocs\web\controller\user.php';
include_once 'C:\xampp\htdocs\web\model\user.php';

use controller\UserController;
use model\User;

class LoginView
{
    public static function login($data)
    {
        $user = new User(0, $data['login'], $data['senha']);
        $result = UserController::verificaSenha($user);
        if($result){
            session_start();
            $_SESSION["token"]=md5($user->getLogin());
            return true;
        }else{
            return false;
        }
    }
}
