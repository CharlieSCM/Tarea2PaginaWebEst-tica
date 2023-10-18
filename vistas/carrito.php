<?php 
    include '../controladores/ctrMostrarCarrito.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
   
    <title>Carrito de Compras - Tienda de Videojuegos</title>

    <link rel="stylesheet" href="../css/carrito.css">

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
    $(document).ready(function() {
        $.ajax({
            url: "../controladores/ctrlPagar.php", // Ruta al archivo de servidor
            type: "GET",
            success: function(data) {
                $("#pagar-value").text("" + data); // Muestra el valor en la barra de navegación
            }
        });
    });
    </script>

</head>
<body>
        <!--Inicio de barra de navegacion-->
    <header>
        <nav class="navbar navbar-expand-lg">
            <div class="icon logo">
              <a href="../index.html">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  class="icon icon-tabler icon-tabler-device-gamepad-2"
                  width="30"
                  height="30"
                  viewBox="0 0 24 24"
                  stroke-width="2"
                  stroke="#B9D6F2"
                  fill="none"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                >
                  <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                  <path
                    d="M12 5h3.5a5 5 0 0 1 0 10h-5.5l-4.015 4.227a2.3 2.3 0 0 1 -3.923 -2.035l1.634 -8.173a5 5 0 0 1 4.904 -4.019h3.4z"
                  />
                  <path
                    d="M14 15l4.07 4.284a2.3 2.3 0 0 0 3.925 -2.023l-1.6 -8.232"
                  />
                  <path d="M8 9v2" />
                  <path d="M7 10h2" />
                  <path d="M14 10h2" />
                </svg>
              </a>
            </div>
            <button
              class="navbar-toggler"
              type="button"
              data-toggle="collapse"
              data-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent"
              aria-expanded="false"
              aria-label="Toggle navigation"
            >
              <span class="navbar-toggler-icon"></span>
            </button>
    
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                  <a class="nav-link" href="../vistas/tienda.php"
                    >Inicio<span class="sr-only">(current)</span></a
                  >
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="../vistas/acerca_nosotros.html"
                    >Nosotros</a
                  >
                </li>
              </ul>
          </nav>
    </header>
    
    <div class="carousel">
      <h2 class="categoriaT">Carrito</h2>
        <div class="carousel-row">
          <?php foreach($juegosC as $game): ?>
              <div class="carousel-tile" style="background: #46B1C9;">
                  <p>
                    <?php echo $game['titulo'] ?>
                  </p>
                <img class = imgCarusel src="../imagenes/<?php echo $game['imagen'] ?>" width="25px" >
                <p>
                <?php echo $game['juego_precio'] ?> 
                <a href="../controladores/ctrEliminarJuego.php?id=<?php echo $game['id_juego'] ?>">Eliminar del carrito</a>
                </p>
                
              </div>
          <?php endforeach; ?>

        </div>
    </div>
    <div class="entrada">
      <p class="precio" >TOTAL A PAGAR: <span id="pagar-value"></span></p>
      <a  class="Pagar" href="../controladores/ctrRealizarPago.php"><img class="pagarT" src="../imagenes/metodo-de-pago.png" alt=""></a>
    </div>



</body>
</html>
