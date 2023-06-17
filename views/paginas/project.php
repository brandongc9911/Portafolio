
<main class="project">
  <!--<div class="show-project">
    <img src="<?php echo $proyecto->imagen?>" alt="<?php echo $proyecto->titulo?>">
    <h1><?php echo $proyecto->titulo?></h1>
    <div class="show_page">
      <a href="<?php echo $proyecto->url?>" target="_blank">Preview Site</a>
      <a href="<?php echo $proyecto->repo?>" target="_blank">View Code</a>
    </div>

    <div class="show_icon">
     <div class="show_icon-button">
      <i class="fa-regular fa-heart"></i>
      <p><?php echo $proyecto->likes?></p>
     </div>
     <div class="show_icon-button">
      <i class="fa-regular fa-message"></i>
      <p><?php echo $proyecto->comentarios?></p>
     </div>
    </div>
  </div>

  <div class="descripcion content">
    <h2>Descripcion del Proyecto</h2>
    <p><?php echo $proyecto->descripcion?></p>
  </div>
  <div class="comentarios content">
    <h2>Apoyame con tu Feedback</h2>
    <?php foreach($errores as $error):?>
            <div class="alerta error">
                <?php echo $error;?>
            </div>
      <?php endforeach;?>

     
        <?php foreach($comentario as $c):?>
          <div class="comentario">
          <div class="user">
            <i class="fa-solid fa-user"></i>
            <p>User:<?php echo $c->alias ?></p>
          </div>
          <div class="message">
            <p><?php echo $c->comment ?></p>
          </div>
        </div>
        <?php endforeach;?>
   
    <form  method="POST" class="comment">
      <label for="comment">Comentario:</label>
      <textarea name="comment" id="comment" placeholder="Feedback..."></textarea>
      <input type="submit" class="btn" value="Enviar">
    </form>
  </div>
        -->
</main>