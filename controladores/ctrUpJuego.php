<?php
require_once '../modelos/juegos.php';
require_once '../modelos/conexion.php';
require_once '../modelos/auth.php';

$conexion = new Conexion();
$crearJuego = new upJuego($conexion->conectar());
$auth = new Auth();
// ...

if ($auth->isLoggedIn()) {
    // El usuario está autenticado, puedes continuar el proceso de creación del juego
    $userID = $auth->getUserId();

    // Recoge los datos del formulario
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $titulo = $_POST['titulo'];
        $juego_precio = $_POST['juego_precio'];
        $categoria = $_POST['categoria'];
        $imagen = $_FILES['imagen']; // Asegúrate de validar la subida de la imagen
        $descripcion = $_POST['descripcion'];
        $juego_precio = intval($juego_precio);
        $categoria = intval($categoria);

        // Realiza la inserción en la base de datos
         $juegoId = $crearJuego->Insert_juego($juego_precio, $imagen, $titulo, $descripcion, $categoria, $userID);
        
        // Ahora, si deseas mostrar información sobre la variable $imagen, puedes hacerlo así:
        //echo "titulo: " . $titulo . " precio: " . $juego_precio . " categoria: " . $categoria . " userID= " . $userID. $imagen;
        // Para mostrar información detallada sobre $imagen, puedes usar var_dump:
        //var_dump($imagen);
    }
}


?>
