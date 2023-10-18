<?php 
  include '../controladores/ctrMostrar.php';
  include '../controladores/ctrMostrarAventura.php';
  include '../controladores/ctrMostrarEstrategia.php';
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
      integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N"
      crossorigin="anonymous"
    />
    
    <!--inicio carrusel-->
    <link
      href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"
      rel="stylesheet"
      id="bootstrap-css"
    />
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!--texta alaig-->
    <link
      href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"
      rel="stylesheet"
      id="bootstrap-css"
    />
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!--Fin carrusel-->

    <!--inicio tienda-->

    <link rel="stylesheet" href="../css/styles.css" />
    <link rel="stylesheet" href="../css/contadorCarrito.css" />

    <title>Tienda de Videojuegos</title>

    <script>
    $(document).ready(function() {
        $.ajax({
            url: "../Controladores/ctrContadorC.php", // Ruta al archivo de servidor
            type: "GET",
            success: function(data) {
                $("#contador-value").text("" + data); // Muestra el valor en la barra de navegación
            }
        });
    });
    </script>

  </head>
  <body>
    <!--inicio barra de navegacion-->
    <header>
      <!-- barra de navegacion-->
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
              <a class="nav-link" href="../vistas/tienda.html"
                >Inicio<span class="sr-only">(current)</span></a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../vistas/acerca_nosotros.html"
                >Nosotros</a
              >
            </li>
          </ul>

          <ul class="navbar-nav mr-auto">
            <li></li>
          </ul>

          <ul class="navbar-nav mr-auto">
            <li></li>
          </ul>

          <ul class="navbar-nav mr-auto">
            <li></li>
          </ul>

          <ul class="navbar-nav mr-auto">
            <li>
              <div>
                <a class="user" href="../index.html">
                  <svg xmlns="http://www.w3.org/2000/svg" 
                  class="userIcon icon icon-tabler icon-tabler-user-circle" 
                  width="30" height="30" viewBox="0 0 24 24" stroke-width="1.5" 
                  stroke="#B9D6F2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                    <path d="M12 10m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                    <path d="M6.168 18.849a4 4 0 0 1 3.832 -2.849h4a4 4 0 0 1 3.834 2.855" />
                  </svg>
                </a>
              </div>
            </li>
          </ul>

          <ul class="navbar-nav car mr-auto">
            <li>
              <a class="nav-link" href="carrito.php" id="contador">
                    <div class="carrito-container">
                        <img class="icon v" src="../imagenes/carritoC.png" alt="" height="30px">
                        <!--el contador value se usa mas que nada el value para obtener los valores del id que se llama contador-->
                        <span id="contador-value"></span>
                    </div>
                  </a>
            </li>
          </ul>

          <form class="form-inline my-2 my-lg-0">
            <input
              class="form-control mr-sm-2"
              type="search"
              placeholder="Buscar"
              aria-label="Search"
            />
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
              Buscar
            </button>
          </form>
        </div>
      </nav>
    </header>
    <!--Fin barra de navegacion-->

    <!--Inicio de carrusel-->
    <div
      id="carouselExampleCaptions"
      class="carousel slide carousel-fade"
      data-ride="carousel"
    >
      <ol class="carousel-indicators">
        <li
          data-target="#carouselExampleCaptions"
          data-slide-to="0"
          class="active"
        ></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img
            src="https://c4.wallpaperflare.com/wallpaper/229/153/276/halo-infinite-e3-2018-xbox-one-pc-games-wallpaper-preview.jpg"
            class="d-block w-100"
            alt="..."
          />
          <div class="background-overlay"></div>
          <div class="carousel-caption">
            <!--<h5 class="display-4 h4-md mb-4 font-weight-bold">
              A modular UI Kit for Bootstrap
            </h5>
            <p class="h4 mb-5 pb-3 text-white-50">
              Nulla vitae elit libero, a pharetra augue mollis interdum.
            </p>-->
            <a href="vistas/detalle_juego.html" class="btn btn-lg btn-danger">Ver más</a>
          </div>
        </div>
        <div class="carousel-item">
          <img
            src="https://wallpaperbat.com/img/762651-elden-ring-hd-wallpaper-and-background-image.jpg"
            class="d-block w-100"
            alt="..."
          />
          <div class="background-overlay"></div>
          <div class="carousel-caption">
            <!--<h5 class="display-4 h4-md mb-4 font-weight-bold">
              A modular UI Kit for Bootstrap
            </h5>
            <p class="h4 mb-5 pb-3 text-white-50">
              Nulla vitae elit libero, a pharetra augue mollis interdum.
            </p>-->
            <a href="vistas/detalle_juego.html" class="btn btn-lg btn-danger">Ver más</a>
          </div>
        </div>
        <div class="carousel-item">
          <img
            src="https://trumpwallpapers.com/wp-content/uploads/Hollow-Knight-Wallpaper-13-1332x850-1.jpg"
            class="d-block w-100"
            alt="..."
          />
          <div class="background-overlay"></div>
          <div class="carousel-caption">
            <!--<h5 class="display-4 h4-md mb-4 font-weight-bold">
              A modular UI Kit for Bootstrap
            </h5>
            <p class="h4 mb-5 pb-3 text-white-50">
              Nulla vitae elit libero, a pharetra augue mollis interdum.
            </p>-->
            <a href="vistas/detalle_juego.html" class="btn btn-lg btn-danger">Ver más</a>
          </div>
        </div>
      </div>
      <a
        class="carousel-control-prev"
        href="#carouselExampleCaptions"
        role="button"
        data-slide="prev"
      >
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a
        class="carousel-control-next"
        href="#carouselExampleCaptions"
        role="button"
        data-slide="next"
      >
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
    <!--Fin de carrusel-->
    <br><br><br>
    <!--Inicio de tienda-->
    <div class="carousel">
      <h2 class="categoriaT">Terror</h2>
        <div class="carousel-row">
          <?php foreach($juegosT as $game): ?>
            <div class="carousel-tile" style="background: #46B1C9;">
                  <div>
                  <p>
                    <?php echo $game['titulo'] ?>
                  </p>
                  <img class = "imgCarusel" src="../imagenes/<?php echo $game['imagen'] ?>" alt="">
                  </div>
                  <a class="agregar" href="../controladores/agregarCarro.php?id=<?php echo $game['id_juego'] ?>">AGREGAR A CARRITO</a>
                  <p>
                <?php echo $game['juego_precio'] ?> 
                </p>
              </div>
              <?php endforeach; ?>
        </div>
        </div>
    </div>

    <div class="carousel">
      <h2 class="categoriaT">Aventura</h2>
        <div class="carousel-row">
        <?php foreach($juegosA as $game): ?>
          <div class="carousel-tile" style="background: #46B1C9;">
                  <div>
                  <p>
                    <?php echo $game['titulo'] ?>
                  </p>
                  <img class = "imgCarusel" src="../imagenes/<?php echo $game['imagen'] ?>" alt="">
                  </div>
                  <a class="agregar" href="../controladores/agregarCarro.php?id=<?php echo $game['id_juego'] ?>">AGREGAR A CARRITO</a>
                  <p>
                <?php echo $game['juego_precio'] ?> 
                </p>
              </div>
              <?php endforeach; ?>
              </div>
        </div>
    </div>

    <div class="carousel">
      <h2 class="categoriaT">Estrategia</h2>
        <div class="carousel-row">
        <?php foreach($juegosE as $game): ?>
          <div class="carousel-tile" style="background: #46B1C9;">
                  <div>
                  <p>
                    <?php echo $game['titulo'] ?>
                  </p>
                  <img class = "imgCarusel" src="../imagenes/<?php echo $game['imagen'] ?>" alt="">
                  </div>
                  <a class="agregar" href="../controladores/agregarCarro.php?id=<?php echo $game['id_juego'] ?>">AGREGAR A CARRITO</a>
                  <p>
                <?php echo $game['juego_precio'] ?> 
                </p>
              </div>
              <?php endforeach; ?>
              </div>
        </div>
    </div>
    <!--Fin de tienda-->

    <!--Inicio de pie de pagina-->
    <footer >
        <div class="footer">
            <div class="contain">
            <div class="col">
              <h1>Company</h1>
              <ul>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
              </ul>
            </div>
            <div class="col">
              <h1>Products</h1>
              <ul>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
              </ul>
            </div>
            <div class="col">
              <h1>Accounts</h1>
              <ul>
                <a href="../vistas/acerca_nosotros.html"><li>About us</li></a>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
              </ul>
            </div>
            <div class="col">
              <h1>Resources</h1>
              <ul>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
              </ul>
            </div>
            <div class="col">
              <h1>Support</h1>
              <ul>
                <a href="../vistas/contacto.html"><li>Contact us</li></a>
                <li></li>
                <li></li>
              </ul>
            </div>
            <div class="col social">
              <h1>Social</h1>
              <ul>
                <li>
                  <a href="">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-facebook" width="30" height="30" viewBox="0 0 24 24" stroke-width="1.5" stroke="#B9D6F2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M7 10v4h3v7h4v-7h3l1 -4h-4v-2a1 1 0 0 1 1 -1h3v-4h-3a5 5 0 0 0 -5 5v2h-3" />
                    </svg>
                  </a>
                </li>
                <li><a href="">
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-instagram" width="30" height="30" viewBox="0 0 24 24" stroke-width="1.5" stroke="#B9D6F2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M4 4m0 4a4 4 0 0 1 4 -4h8a4 4 0 0 1 4 4v8a4 4 0 0 1 -4 4h-8a4 4 0 0 1 -4 -4z" />
                    <path d="M12 12m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                    <path d="M16.5 7.5l0 .01" />
                  </svg>
                </a></li>
                <li><a href="">
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-twitter" width="30" height="30" viewBox="0 0 24 24" stroke-width="1.5" stroke="#B9D6F2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M22 4.01c-1 .49 -1.98 .689 -3 .99c-1.121 -1.265 -2.783 -1.335 -4.38 -.737s-2.643 2.06 -2.62 3.737v1c-3.245 .083 -6.135 -1.395 -8 -4c0 0 -4.182 7.433 4 11c-1.872 1.247 -3.739 2.088 -6 2c3.308 1.803 6.913 2.423 10.034 1.517c3.58 -1.04 6.522 -3.723 7.651 -7.742a13.84 13.84 0 0 0 .497 -3.753c0 -.249 1.51 -2.772 1.818 -4.013z" />
                  </svg>
                </a></li>
              </ul>
            </div>
          <div class="clearfix"></div>
          </div>
          </div>
    </footer>
  </body>
</html>