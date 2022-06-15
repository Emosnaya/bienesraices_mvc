<?php

namespace Controllers;

use MVC\Router;
use Model\Admin;

class LoginController {

    public static function login(Router $router){
        $errores = [];

        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            $auth = new Admin($_POST);

            $errores = $auth->validar();

            if(empty($errores)){
                //Verficar el usuario
                $resultado = $auth->existe();

                if(!$resultado){
                    //Verificar si el usuario existe
                    $errores = Admin::getErrores();
                } else {
                    //Verificar el password
                    $auteticado = $auth->comprobarPassword($resultado);
                    if($auteticado){
                        //Autenticar al usuario
                        $auth->autenticar();
                    }else {
                        //Paswors incorrecto
                        $errores = Admin::getErrores();
                    }
                }
                

            }

        }

        $router->render('auth/login',[
            'errores' => $errores
        ]);    
    }
    public static function logout() {
        session_start();

        $_SESSION = [];

        header('Location: /');
    }
}