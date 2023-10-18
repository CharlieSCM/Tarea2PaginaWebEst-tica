<?php

require_once '../modelos/carrito.php';
require_once '../modelos/auth.php';
require_once '../modelos/mostrar.php';


// Verifica si se ha enviado el ID del curso por la URL
if (isset($_GET['id'])) 
$auth = new Auth();
    // Recibe el ID del curso
    $juegoID = $_GET['id'];
    echo "$juegoID";
    

    if ($auth->isLoggedIn()) {
        //mandamos llamar de la clse auth, lo que es el id
        $userID = $auth->getUserId();
        $carrito=new carrito();
        $carrito->eliminarProductoDeCarrito($userID,$juegoID);
}
?>