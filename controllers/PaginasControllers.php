<?php

namespace  Controllers;

use Model\Blog;
use MVC\Router;
use Model\Propiedad;
use PHPMailer\PHPMailer\PHPMailer;

class PaginasControllers {
    public function index(Router $router) {
        $propiedades = Propiedad::get(3);
        $inicio = true;
        $router->render('paginas/index', [
            'propiedades' => $propiedades,
            'inicio' => $inicio
        ]);
    }
    public function nosotros(Router $router) {
        $router->render('paginas/nosotros');    
        
    }
    public function propiedades(Router $router) {
        $propiedades = Propiedad::all();
        $router->render('paginas/propiedades', [
            'propiedades' => $propiedades
        ]);
        
    }
    public function propiedad(Router $router) {
        $id = validarORedireccionar('/propiedades');

        //Buscar la propiedad por el ID
        $propiedad = Propiedad::find($id);

        $router -> render('paginas/propiedad', [           
            'propiedad' => $propiedad
        ]);
    }
    public function blog(Router $router) {
        $blogs = Blog::all();
        $router->render('paginas/blog', [
            'blogs' => $blogs
        ]);
        
    }
    public function entrada(Router $router) {
        $id = validarORedireccionar('/blogs');
        //Buscar la propiedad por el id
        $blog = Blog::find($id);
        $router->render('paginas/entrada',[
            'blog' => $blog
        ]);
        
    }
    public function contacto(Router $router) {

        $mensaje = null;
        
        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            $respuestas = $_POST['contacto'];

            //Crear una nueva instancia de phpmailer
            $phpmailer = new PHPMailer();
            //Configurar SMTP
            $phpmailer->isSMTP();
            $phpmailer->Host = 'sandbox.smtp.mailtrap.io';
            $phpmailer->SMTPAuth = true;
            $phpmailer->Port = 2525;
            $phpmailer->Username = '8285058b5566f5';
            $phpmailer->Password = '5bb6397d58b58e';

            //Configurar el contenido del email
            $phpmailer->setFrom('admin@bienesraices.com');
            $phpmailer->addAddress('admin@bienesraices.com', 'BienesRaices.com');
            $phpmailer->Subject = 'Tienes un nuevo mensaje';

            //Habilitar HTML
            $phpmailer->isHTML(true);
            $phpmailer->CharSet = 'UTF-8';

                //Definir el contenido
                $contenido = '<html>'; 
                $contenido .= '<p>Tienes un nuevo mensaje</p>'; 
                $contenido .= '<p>Nombre:  ' . $respuestas['nombre']  . '</p>' ; 
                //Enviar de forma condicional algunos campos de email o telefono
                if($respuestas['contacto'] === 'telefono') {
                    $contenido .= '<p>Eligio ser contactado por telefono:</p>';
                    $contenido .= '<p>Telefono:  ' . $respuestas['telefono']  . '</p>' ;
                    $contenido .= '<p>Fecha Contacto:   ' . $respuestas['fecha']  . '</p>' ; 
                    $contenido .= '<p>Hora:   ' . $respuestas['hora']  . '</p>' ; 
                }else{
                    //Es email, entonces agregamos el campo de email
                    $contenido .= '<p>Eligio ser contactado por email:</p>';
                    $contenido .= '<p>Email:  ' . $respuestas['email']  . '</p>' ; 
                }
                
                
                $contenido .= '<p>Mensaje:  ' . $respuestas['mensaje']  . '</p>' ; 
                $contenido .= '<p>Vende o Compra:  ' . $respuestas['tipo']  . '</p>' ; 
                $contenido .= '<p>Precio o Presupuesto:   $' . $respuestas['precio']  . '</p>' ; 
                $contenido .= '<p>Prefierer ser contactado por:   ' . $respuestas['contacto']  . '</p>' ; 
            
            $contenido .= '</html>';


            $phpmailer->Body = $contenido;
            $phpmailer->AltBody = 'Esto es texto alternativo de HTML';

            //Enviar el email
            if($phpmailer->send()) {
                $mensaje = "Mensaje enviado correctamente";
            } else {
                $mensaje = "El mensaje no se pudo enviar";
            }


        }




        $router->render('paginas/contacto', [
            'mensaje' => $mensaje
        ]);
    }
}