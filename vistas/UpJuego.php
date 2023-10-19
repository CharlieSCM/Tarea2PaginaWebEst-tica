<?php
include '../controladores/ctrMostrarCategoria.php';

?> 
<!DOCTYPE html>

<link rel="stylesheet" href="../assets/CSS/crearcurso.css">
<html>

<head>
    <title>Formulario de Registro de Curso</title>
</head>

<body>
    <h1>crear Curso</h1>
    <form action="../controladores/ctrUpJuego.php" method="post" enctype="multipart/form-data">
        <div>
            <!-- <form action="../Controladores/ctrlSubirVideo.php" method="post" enctype="multipart/form-data">-->
            <label for="titulo">Título del curso</label>
            <input type="text" name="titulo" id="titulo" required>

            <div class="drag-drop-area">
                <p>Arrastra y suelta una imagen aquí</p>
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
            <!-- Agregar otros campos del formulario según tus necesidades -->
        </div>
        <div>
            <input type="submit" value="Registrar juego">
        </div>
    </form>
</body>

</html>

</html>