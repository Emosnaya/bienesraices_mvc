<?php

namespace MVC;

class Router {

    public $rutasGet = [];
    public $rutasPost = [];

    public function get($url, $fn){
        $this->rutasGet[$url] = $fn;
    }

    public function post($url, $fn){
        $this->rutasPost[$url] = $fn;
    }


    public function comprobarRutas() {

        session_start();
        $auth = $_SESSION['login'] ?? null;


        //Arrgelo de rutas protegidas
        $rutas_protegidas = ['/admin', '/propiedades/crear','/propiedades/actualizar','/propiedades/eliminar','/vendedores/crear', '/vendedores/actualizar','/vendedores/eliminar'];


        $urlActual = $_SERVER['REQUEST_URI'] === '' ? '/' : $_SERVER['REQUEST_URI'];
        $metodo = $_SERVER['REQUEST_METHOD'];

        $splitURL = explode('?', $urlActual);


        if ($metodo === 'GET'){
            $fn = $this->rutasGet[$splitURL[0]] ?? null;
        }else{
            $fn = $this->rutasPost[$splitURL[0]] ?? null;
        }

        //Proteger las rutas
        if(in_array($urlActual, $rutas_protegidas) && !$auth) {
            header('Location: /');
        }

        if($fn){
            //La url existe y hay una funcion asociada
            call_user_func($fn, $this);
        }else {
            echo "URL no encontrada";
        }
    }

    //Muestra una vista
    public function render($view, $datos = []){
        foreach($datos as $key => $value){
            $$key = $value; //Variable de variable
        } 


        //Almacenar archivo en memoria
        ob_start();
        include __DIR__ . "/views/$view.php";

        //Crear variable 
        $contenido = ob_get_clean();

        include __DIR__ . "/views/layout.php";
    }
}