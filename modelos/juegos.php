<?php

class upJuego
{
    private $db;

    public function __construct($conexion)
    {
        $this->db = $conexion;
    }

    public function Insert_juego($juego_precio, $imagen, $titulo, $descripcion, $id_categoria, $id_usuario)
    {
        // Subir la imagen
        $imagen = $_FILES["imagen"]["name"];
        $imagen_temp = $_FILES["imagen"]["tmp_name"];
        move_uploaded_file($imagen_temp, "../imagenes/" . $imagen);

        // Preparar la consulta SQL e insertar los datos en la tabla
        $conn = $this->db;

        // Utiliza bindParam para enlazar los valores
        /*insert into lista_curso(titulo, imagen, id_video, precio, id_categoria, id_usuario) values (); */
        $sql = "INSERT INTO juego (juego_precio, imagen, titulo, descripcion, id_categoria, id_usuario) 
        VALUES (:juego_precio, :imagen, :titulo, :descripcion, :id_categoria, :id_usuario)";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':juego_precio', $juego_precio, PDO::PARAM_STR); // Cambiado a PDO::PARAM_STR
        $stmt->bindParam(':imagen', $imagen, PDO::PARAM_STR);
        $stmt->bindParam(':titulo', $titulo, PDO::PARAM_STR);
        $stmt->bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
        $stmt->bindParam(':id_categoria', $id_categoria, PDO::PARAM_INT);
        $stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);

        if ($stmt->execute()) {
            //$lastInsertId = $conn->lastInsertId(); // Obtenemos el ID insertado
        echo "Registro exitoso";
        //$this->insertarEnCursosCreados($id_usuario, $lastInsertId);
            
        } else {
            $errorInfo = $stmt->errorInfo();
            echo "Error al subir el juego: " . $errorInfo[2];
        }
    }
}