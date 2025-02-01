<?php

namespace Controllers;

use MVC\Router;
use Model\Blog;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager as Image;
class BlogControllers
{
    public static function crear(Router $router)
    {
        $blog = new Blog;
        $errores = Blog::getErrores();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //Crear una nueva instancia
            $blog = new Blog($_POST['blog']);

            //Generar un nombre único
            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

            if ($_FILES['blog']['tmp_name']['imagen']) {
                $manager = new Image(Driver::class);
                $image = $manager->read($_FILES['blog']['tmp_name']['imagen'])->cover(800, 600);
                $blog->setImagen($nombreImagen);
            }

            //Validación
            $errores = $blog->validar();

            if (empty($errores)) {
                //Validar la carpeta de imágenes
                if (!is_dir(CARPETA_IMAGENES)) {
                    mkdir(CARPETA_IMAGENES, 0755, true);
                }

                //Guardar la imagen en el servidor
                if (isset($image)) {
                    $image->save(CARPETA_IMAGENES . $nombreImagen);
                }

                //Guardar en la base de datos
                $blog->guardar();
            }
        }

        $router->render('blogs/crear', [
            'blog' => $blog,
            'errores' => $errores
        ]);

    }

    public static function actualizar(Router $router)
    {
        $id = validarORedireccionar('/admin');
        $blog = Blog::find($id);
        $errores = Blog::getErrores();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //Asignar los atributos
            $args = $_POST['blog'];

            $blog->sincronizar($args);

            //Generar un nombre único
            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

            if ($_FILES['blog']['tmp_name']['imagen']) {
                $manager = new Image(Driver::class);
                $image = $manager->read($_FILES['blog']['tmp_name']['imagen'])->cover(800, 600);
                $blog->setImagen($nombreImagen);
            }

            //Validación
            // $errores = $blog->validar();

            if (empty($errores)) {
               //Almacenar la imagen
               if($_FILES['blog']['tmp_name']['imagen']){
                   $image->save(CARPETA_IMAGENES . $nombreImagen);
               }
                //Guardar en la base de datos
                $blog->guardar();
            
        }

    }

        $router->render('blogs/actualizar', [
            'blog' => $blog,
            'errores' => $errores
        ]);
    }

    public static function eliminar(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);
            
            if($id){
                $tipo = $_POST['tipo'];
                if(validarTipoContenido($tipo)){
                    $blog = Blog::find($id);
                    $blog->eliminar();
                }
            }
        }
    }
}
    









