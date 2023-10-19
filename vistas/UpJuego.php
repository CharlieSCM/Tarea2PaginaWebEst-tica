<?php
include '../controladores/ctrMostrarCategoria.php';

?> 
<!DOCTYPE html>

<html>

<head>
    <title>Subir Juego</title>

    <link rel="stylesheet" type="text/css" href="../css/agregarJuego.css">
</head>

<body>
    <h1></h1>
    <form action="../controladores/ctrUpJuego.php" method="post" enctype="multipart/form-data">
        <div>
            <!-- <form action="../Controladores/ctrlSubirVideo.php" method="post" enctype="multipart/form-data">-->
            <label for="titulo">Título</label>
            <input type="text" name="titulo" id="titulo" required>

            <div class="drag-drop-area">
                <p>Agregar imagen</p>
                <input type="file" name="imagen" id="imagen" required accept="image/*" multiple="false">
            </div>
            <br><br>
            <label for="titulo">Precio</label>
            <input type="text" name="juego_precio" id="precio" required>
            <br><br>

            <label for="titulo">Descripcion</label>
            <input type="text" name="descripcion" id="descripcion" required>
            <br><br>

            <label for="categorias">Selecciona una categoría:</label>
            <select name="categoria" id="categoria">
                <?php foreach ($categoria as $juego) : ?>
                    <option value="<?php echo $juego['id_categoria']; ?>"><?php echo $juego['categoria']; ?></option>
                <?php endforeach; ?>
                <br><br>

        </div>
        <div>
        </div>
        <div>
            <input type="submit" value="Registrar juego">
        </div>
    </form>
</body>

</html>

</html>