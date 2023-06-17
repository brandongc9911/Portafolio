<main class="content">
    <h1>Crear</h1>
    <?php foreach ($errores as $error) : ?>
        <div class="alerta error">
            <?php echo  $error; ?>
        </div>
    <?php endforeach; ?>
    <form  class="formulario" method="POST">
        <div class="row">
            <label for="titulo">Titulo:</label>
            <input type="text" name="proyectos[titulo]" placeholder="titulo" value="<?php echo $proyectos->titulo?>">
        </div>

        <div class="row">
            <label for="imagen">Imagen:</label>
            <input type="text" name="proyectos[imagen]" placeholder="imagen">
        </div>
        <input type="submit" class="btn" value="Guardar">
        
    </form>
</main>