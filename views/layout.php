<?php 
  if(!isset($_SESSION)){
    session_start();
  }

  $auth = $_SESSION['login'] ?? false;
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Portafolio de Brandon Gomez" />
    <link rel="me" href="https://github.com/brandongc9911" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dosis&family=Koulen&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/4a87bade47.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/styles/normalize.css" />
    <link rel="stylesheet" href="/styles/style.css" />
    <title>GC Dev</title>
  </head>
<body>
    <header class="header">
        <h1><a href="/">GC DEV</a></h1>
        <div class="navegacion">
        <a href="#projects">PROJECTS</a>
        <?php if ($auth) : ?>
              <a href="/admin">Admin</a>
              <a href="/logout">Log Out</a>
            <?php endif ?>
        </div>
    </header>
    <?php echo $contenido; ?>
    <footer class="footer">
        <h1><a href="/">GC DEV</a></h1>
        
    </footer>
    <script type="module" src="/js/app.js"></script>
  </body>
</html>