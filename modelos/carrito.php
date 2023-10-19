<?php
class carrito
{
    private $db;
    private $user_id;
    public function __construct()
    {
        $con = new Conexion();
        $this->db = $con->conectar();
    }

public function obtenerJuegoCarrito($user_id)
    {
        $query = "SELECT * FROM carrito c
        JOIN tiendajuegos.usuario u on u.id_usuario = c.id_usuario
                 JOIN tiendajuegos.juego j on c.id_juego = j.id_juego
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
    public function agregarCarrito($id_usuario, $juegoID)
    {
        // Verificar si el curso ya ha sido comprado por el usuario
        $query = "SELECT COUNT(*) FROM ventas WHERE id_usuario = :id_usuario AND id_juego = :id_juego";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
        $stmt->bindParam(':id_juego', $juegoID, PDO::PARAM_INT);
        $stmt->execute();
        $existeCompra = $stmt->fetchColumn();

        if ($existeCompra > 0) {
            //echo "Este juego ya ha sido comprado, no se puede agregar al carrito.";
            
           header("Location: ../vistas/noExito.html");

        } else {
            // Verificar si el curso ya está en la lista de carrito del usuario
            $query = "SELECT COUNT(*) FROM carrito WHERE id_usuario = :id_usuario AND id_juego = :id_juego";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
            $stmt->bindParam(':id_juego', $juegoID, PDO::PARAM_INT);
            $stmt->execute();
            $existeEnCarrito = $stmt->fetchColumn();

            if ($existeEnCarrito > 0) {
                //echo "Este juego ya está en el carrito";
                header("Location: ../vistas/noExito.html");
            } else {
                $query = "INSERT INTO carrito (id_usuario, id_juego) VALUES (:id_usuario, :id_juego)";
                $rs = $this->db->prepare($query);
                $rs->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
                $rs->bindParam(':id_juego', $juegoID, PDO::PARAM_INT);
                if ($rs->execute()) {
                    //echo "¡Juego agregado a carrito!";
                    header("Location: ../vistas/exito.html");
                } else {
                    //echo "Error al agregar el juego a carrito";
                    header("Location: ../vistas/exito.html");
                }
            }
        }
    }
    public function Total_pagar($id_usuario)
    {
/*vselect sum(juego_precio) from carrito c
join tiendajuegos.juego j on j.id_juego = c.id_juego
where id_usuario=1; */
        $query = "select sum(juego_precio) as total from carrito c
        join tiendajuegos.juego j on j.id_juego = c.id_juego
        where c.id_usuario = :id_usuario";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
        if ($stmt->execute()) {
            $fila = $stmt->fetch(PDO::FETCH_ASSOC);
            $total = $fila["total"];
            return $total; // Devuelve el valor en lugar de imprimirlo
        } else {
            return 0; // Devuelve 0 en caso de error
        }
    }

    public function comprarCarrito($id_usuario)
    {
        // Verificar si hay cursos en el carrito
        $carritoJuego = $this->obtenerJuegoCarrito($id_usuario); // Asegúrate de pasar el ID del usuario
        if (empty($carritoJuego)) {
            //echo "No hay juegos en el carrito.";
            header("Location: ../vistas/noExito.html");
            return;
        }

        
        foreach ($carritoJuego as $juego) {
            $juegoID = $juego['id_juego'];
            $query = "INSERT INTO ventas (id_usuario, id_juego) VALUES (:id_usuario, :id_juego)";
            $rs = $this->db->prepare($query);
            $rs->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
            $rs->bindParam(':id_juego', $juegoID, PDO::PARAM_INT);

            if ($rs->execute()) {
                // La compra se ha registrado correctamente en la base de datos
                //echo "¡Compra registrada en la base de datos!";
                header("Location: ../vistas/exito.html");
                $this->eliminarCarrito($id_usuario);
            } else {
                // Hubo un error al registrar la compra
                header("Location: ../vistas/exito.html");
                //echo "No se logro realizar la compra";
            }
        }
    }


    public function eliminarCarrito($id_usuario)
    {
        // Luego, eliminar los cursos del carrito
        $query = "DELETE FROM carrito WHERE id_usuario = :user_id";
        $rs = $this->db->prepare($query);
        $rs->bindParam(':user_id', $id_usuario, PDO::PARAM_INT);
        if ($rs->execute()) {
            header("Location: ../vistas/exito.html");
        } else {
            //echo "Error al eliminar el juego";
            header("Location: ../vistas/noExito.html");
        }
    }

    public function eliminarProductoDeCarrito($id_usuario, $juegoID)
    {
        // Luego, eliminar los cursos del carrito
        $query = "DELETE FROM carrito WHERE id_usuario = :user_id and id_juego = :id_juego";
        //DELETE from carrito where id_usuario=2 and id_lista_cursos=2;
        $rs = $this->db->prepare($query);
        $rs->bindParam(':user_id', $id_usuario, PDO::PARAM_INT);
        $rs->bindParam(':id_juego', $juegoID, PDO::PARAM_INT);
        if ($rs->execute()) {
            //echo "¡Juego del carrito eliminado";
            header("Location: ../vistas/exito.html");
        } else {
            //echo "Error al eliminar el juego";
            header("Location: ../vistas/noExito.html");
        }
    }

    public function carritosContador($id_usuario)
    {
        $query = "SELECT COUNT(id_juego) AS total FROM carrito WHERE id_usuario = :id_usuario";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
        if ($stmt->execute()) {
            $fila = $stmt->fetch(PDO::FETCH_ASSOC);
            $total = $fila["total"];
            return $total; // Devuelve el valor en lugar de imprimirlo
        } else {
            return 0; // Devuelve 0 en caso de error
        }
    }
}