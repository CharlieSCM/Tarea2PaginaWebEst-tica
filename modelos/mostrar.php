<?php
 require('conexion.php');

class mostrar{
    private $db;
    public function __construct() {
        $con = new Conexion();
        $this->db = $con->conectar();
    } 
    public function mostrarJuegosTerror() {
      //  $query = "SELECT id_lista_cursos,titulo, imagen,precio FROM lista_curso";
      $query = "SELECT id_juego,juego_precio,imagen,titulo FROM juego where id_categoria = 5 limit 5";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
    
        $cursos = array(); // Inicializa un array para almacenar los cursos
    
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $cursos[] = $row;
        }
        return $cursos; // Devuelve el array de cursos
    }

    public function mostrarJuegosAventura() {
        //  $query = "SELECT id_lista_cursos,titulo, imagen,precio FROM lista_curso";
        $query = "SELECT id_juego,juego_precio,imagen,titulo FROM juego where id_categoria = 2 limit 5";
          $stmt = $this->db->prepare($query);
          $stmt->execute();
      
          $cursos = array(); // Inicializa un array para almacenar los cursos
      
          while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
              $cursos[] = $row;
          }
          return $cursos; // Devuelve el array de cursos
      }

      public function mostrarJuegosEstrategia() {
        //  $query = "SELECT id_lista_cursos,titulo, imagen,precio FROM lista_curso";
        $query = "SELECT id_juego,juego_precio,imagen,titulo FROM juego where id_categoria = 3 limit 5";
          $stmt = $this->db->prepare($query);
          $stmt->execute();
      
          $cursos = array(); // Inicializa un array para almacenar los cursos
      
          while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
              $cursos[] = $row;
          }
          return $cursos; // Devuelve el array de cursos
      }

      public function mostarJuegosCarrito($user_id)
    {
        $query = "SELECT j.titulo, j.precio, j.imagen, j.id_juegos
                  FROM carrito c
                  JOIN juegos j ON j.id_juegos = c.id_juego
                  WHERE c.id_usuario = :user_id";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->execute();

        $cursos = array(); // Inicializa un array para almacenar los cursos

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $cursos[] = $row;
        }
        return $cursos; // Devuelve el array de cursos
    }
      
    }
?>