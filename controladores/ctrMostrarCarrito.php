<?php
require_once '../modelos/carrito.php';
require_once '../modelos/conexion.php';
require_once '../modelos/auth.php';

$auth = new Auth(); 
if ($auth->isLoggedIn()) {
    //mandamos llamar de la clse auth, lo que es el id
    $userID = $auth->getUserId();
    // nos enlazamos a perfil, para despues poder tomar el valor del id de la sesion, que esta en auth
    $mostrar = new carrito();
    $juegosC= $mostrar->obtenerJuegoCarrito($userID); // Obtiene la lista de cursos
    // mandamos llamar la clase de obtener de la variable perfil que es la clase perfil
} else {
    // El usuario no ha iniciado sesión, redirige a la página de inicio de sesión
    $auth->redirectToLogin();
}