<?php

namespace Controllers;

use Model\Propiedad;
use MVC\Router;
use PHPMailer\PHPMailer\PHPMailer;

class PaginasController {
    public static function index(Router $router){
        $propiedades = Propiedad::get(3);
        $inicio = true;
        $router->render('paginas/index', [
            'propiedades' => $propiedades,
            'inicio' => $inicio
        ]);
    }

    public static function nosotros(Router $router){
        $router->render('paginas/nosotros',[]);
    }
    public static function propiedades(Router $router){
        $propiedades = Propiedad::all();
        $router->render('paginas/propiedades', [
            'propiedades' => $propiedades
        ]);
    }
    public static function propiedad(Router $router){
        $id = validarOredireccionar('/propiedades');

        $propiedad = Propiedad::find($id);

        $router->render('paginas/propiedad', [
            'propiedad' => $propiedad
        ]);
    }
    public static function blog(Router $router){
        $router->render('paginas/blog');
    }
    public static function entrada(Router $router){
        $router->render('paginas/entrada');
    }
    public static function contacto(Router $router){
        $mensaje = null;
        
        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            

            $respuestas = $_POST['contacto'];
            

            //Crear una isntancia de PHPMailer
            $mail = new PHPMailer();
            //Configurar SMTP
            $mail->isSMTP();
            $mail->Host = 'smtp.mailtrap.io';
            $mail->SMTPAuth = true;
            $mail->Username = '6029469c7d4ff0';
            $mail->Password = 'f6bb80f4e172b0';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 2525;

            //Congigurar el contenido del email
            $mail->setFrom('admin@bienesraices.com');
            $mail->addAddress('admin@bienesraices.com', 'BienesRaices.com');
            $mail->Subject = 'Tienes un nuevo mensaje';

            //Habilitar HTML
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';

            //Definir el contenido
            $contenido = '<html>';
            $contenido .= '<p>Tienes un nuevo mensaje</p>';
            $contenido .= '<p>Nombre: ' . $respuestas['nombre'] .'</p>' ;
            
            //Envari condicionalmente los campos

            if($respuestas['contacto'] === 'telefono'){
                $contenido .= '<p>Eligio ser contactado por Tel??fono</p>';
                $contenido .= '<p>Telefono: ' . $respuestas['telefono'] .'</p>' ;
                $contenido .= '<p>Fecha contacto:' . $respuestas['fecha'] .'</p>' ;
                $contenido .= '<p>Hora:' . $respuestas['hora'] .'</p>' ;
            }else {
                $contenido .= '<p>Eligio ser contactado por email </p>';
                //Es un correo
                $contenido .= '<p>Email: ' . $respuestas['email'] .'</p>' ;
            }
            
            $contenido .= '<p>Mensaje: ' . $respuestas['mensaje'] .'</p>' ;
            $contenido .= '<p>Vende o Compra: ' . $respuestas['tipo'] .'</p>' ;
            $contenido .= '<p>Precio o Presupuesto: $' . $respuestas['precio'] .'</p>' ;
            $contenido .= '<p>Prefiere ser contactado por:' . $respuestas['contacto'] .'</p>' ;
            $contenido .=  '</html>';

            $mail->Body = $contenido;

            //Enviar el email
            if($mail->send()){
                $mensaje = "Mensaje enviado Correctamente";
            } else {
                $mensaje = "El mensaje no se pudo enviar";
            }
        }

        $router->render('paginas/contacto', [
            'mensaje' => $mensaje
        ]);
    }
}