

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NTP</title>
    <link rel="shortcut icon" href="../images/logos/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../css/style-login.css">
    <link rel="stylesheet" href="../css/style.css">
    <script src="../js/main.js"></script>

  </head>

  <body>
    <header>
      <nav>
          <div class="navbar">
              <ul>
                  <li><a href='../index.html'><img src="../images/logos/logo.png" alt="logo"></a></li>
                  <li class="navbar-menu" id="navbar-menu"><img src="../images/icons/menu.svg" alt="Imgem Menu"></li>
                  <li class="navbar-item" id="navbar-item">
                      <li class="navbar-item-li"><a href="../index.html">Pagina Inicial</a></li>
                      <li class="navbar-item-li"><a href="../pages/demonstracao.html">Demonstraçao</a></li>
                  </li>
              </ul>
          </div>
      </nav>
    </header>

    <div class="login-page">
      <div class="form">

      <?php

$codigo = $_GET['codigo'];

      echo <<<HTML
        <form class="login-form" action="cadInteresse.php?codigo={$codigo}" method="post">
            <textarea name="mensagem" placeholder="Digite aqui sua mensagem"></textarea>
          <input type="text" placeholder="Digite aqui seu contato" name="contato" id="contato">
          <button>Enviar</button>
        </form>


HTML;


?>


        
      </div>
    </div>

    <footer class="footer-section">
      <div class="footer">
          <h4>Copyright &copy; 2022, Todos os direitos reservados</h4>
          <ul>
              <li><a href="#">Home</a></li>
              <li><a href="#">Termos</a></li>
              <li><a href="#">Privacidade</a></li>
              <li><a href="#">Politica</a></li>
              <li><a href="#">Contato</a></li>
          </ul>
      </div>
    </footer>
  </body>
</html>
