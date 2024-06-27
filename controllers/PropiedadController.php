<?php 

namespace Controllers;
use MVC\Router;
use Model\Propiedad;
use Model\Vendedor;
use Intervention\Image\ImageManagerStatic as Image;

class PropiedadController {
    public static function index(Router $router) {
        $propiedades = Propiedad::all();
        $resultado = $_GET['resultado'] ?? null;

        $vendedores = Vendedor::all();

        $router->render('propiedades/admin', [
            'propiedades' => $propiedades,
            'resultado' => null,
            'vendedores' => $vendedores
        ]);
    }   

    public static function crear(Router $router) {

        $propiedad = new Propiedad;
        $vendedores = Vendedor::all();
        // Arreglo con mensajes de errores
        $errores = Propiedad::getErrores();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                
            // Crea una nueva instancia
            $propiedad = new Propiedad($_POST['propiedad']);

            /* SUBIDA DE ARCHIVOS */
            // Generar nombre unico
            $nombreImagen = md5( uniqid( rand(), true ) )  . ".jpg";

            // Setear imagen
            // Realiza un resize a la imagen con Intervation
            if($_FILES['propiedad']['tmp_name']['imagen']) {
                $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800, 600);
                $propiedad->setImagen( $nombreImagen );
            }

            // Validar
            $errores = $propiedad->validar();

            // Revisar que el arreglo de errores este vacio
            if(empty($errores)) {
                // Crear carpeta imagenes
                if(!is_dir(CARPETA_IMAGENES)) {
                    mkdir(CARPETA_IMAGENES);
                }

                // Guarda la imagen en el servidor
                $image->save( CARPETA_IMAGENES . $nombreImagen );

                // Guarda en la base de datos
                $propiedad->guardar();
            }
        }

        $router->render('propiedades/crear', [
            'propiedad' => $propiedad,
            'vendedores' => $vendedores,
            'errores' => $errores
        ]);
    }

    public static function actualizar(Router $router) {
        $id = validarORedireccionar('/admin');
        $propiedad = Propiedad::find($id);
        $vendedores = Vendedor::all();
        $errores = Propiedad::getErrores();

            // Metodo POST para actualizar
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){

            // Asignar los atributos
            $args = $_POST['propiedad'];
        
            $propiedad->sync( $args );
        
            // Validacion
            $errores = $propiedad->validar();
        
            /* SUBIDA DE ARCHIVOS */
            // Generar nombre unico
            $nombreImagen = md5( uniqid( rand(), true ) )  . ".jpg";
        
            // Setear imagen
            // Realiza un resize a la imagen con Intervation
            if($_FILES['propiedad']['tmp_name']['imagen']) {
                $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800, 600);
                $propiedad->setImagen( $nombreImagen );
            }
        
            // Revisar que el arreglo de errores este vacio
            if(empty($errores)) {
                if($_FILES['propiedad']['tmp_name']['imagen']) {
                    // Almacenar la imagen
                    $image->save( CARPETA_IMAGENES . $nombreImagen );
                }
                
                $propiedad->guardar();
            }
        }

        $router->render('/propiedades/actualizar', [
            'propiedad' => $propiedad,
            'errores' => $errores,
            'vendedores' => $vendedores
        ]);
    }

    public static function eliminar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);
        
            // var_dump($id);
        
            if ($id) {
        
                $tipo = $_POST['tipo'];
        
                if( validarTipoContenido($tipo) ) {
                    $propiedad = Propiedad::find( $id );
                    $propiedad->eliminar();
                }
            }
        }
    }
}