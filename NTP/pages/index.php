<?php

require "conexaoMySql.php";
require "autenticacao.php";

session_start();
$pdo = mysqlConnect();
exitWhenNotLogged($pdo);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NTP</title>

    <link rel="shortcut icon" href="../images/logos/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../css/style.css">
    <script src="../js/main.js"></script>
</head>

<body>
    <header>
        <nav>
            <div class="navbar">
                <ul>
                    <li><a href='index.php'><img src="../images/logos/logo.png" alt="Imagem logo"></a></li>
                    <li class="navbar-menu" id="navbar-menu"><img src="../images/icons/menu.svg" alt=""></li>
                    <div class="navbar-item" id="navbar-item">
                        <li class="navbar-item-li"><a href="index.php">Pagina Inicial</a></li>
                        <li class="navbar-item-li"><a href="demonstracao.html">Demonstraçao</a></li>
                        <li class="button-login navbar-item-li"><a href="login.html">Login</a></li>
                        <li class="button-login navbar-item-li"><a href="cadastrarAnuncio.html">Anunciar</a></li>
                        <li class="button-login navbar-item-li"><a href="listar.php">Meus anúncios</a></li>
                        <li class="button-login navbar-item-li"><a href="interesses.php">Chat</a></li>
                        <li class="button-login navbar-item-li"><a href="perfil.php">Meu perfil</a></li>
                        <li class="button-login navbar-item-li"><a href="logout.php">Sair</a></li>
                    </div>
                </ul>
            </div>
        </nav>
    </header>
    <hr>
    <div class="container">
        <section class="title-section">
            <div class="title">
                <ul>
                    <li class="texts">
                        <h1>O que o cliente anda pensando!?<br></h1>
                        <h2>NTP MARKETPLACE</h2>
                        <h4>O portal de anuncios que mais vende.</h4>
                    </li>
                    <li class="rigth">
                        <img src="https://cdn-icons-png.flaticon.com/512/2230/2230606.png" alt="Icone">
                    </li>
                </ul>
            </div>
        </section>
        <hr>
        <section class="section-cards">
            <h2 class="none">a</h2>
            <div class="search">
                <ul>
                    <li class="button-img">
                        <button type="submit">
                            <img src="../images/icons/search.svg" alt="">
                        </button>
                    </li>
                    <li>
                        <input type="text" placeholder="Pesquise aqui seu novo produto!">
                    </li>
                </ul>
            </div>
            <div class="cards">
                <div class="card">
                    <a href="anuncio.html?productId=iphone">
                        <div class="product-item">
                            <div class="img">
                                <img src="../images/index/iphone.jpg" alt="imagem do iphone">
                            </div>
                            <div class="txt">
                                <p class="product-title">Iphone de 258 gb</p>
                                <p class="product-price">R$ 2.300</p>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="card">
                    <a href="#">
                        <div class="product-item">
                            <div class="img">
                                <img src="../images/index/touca.png" alt="imagem touca de natacao">
                            </div>
                            <div class="txt">
                                <p class="product-title">Touca de Natacao</p>
                                <p class="product-price">R$ 20</p>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="card">
                    <a href="#">
                        <div class="product-item">
                            <div class="img">
                                <img src="../images/index/jeep_compass.jpg" alt="Imagem do jeep compass">
                            </div>
                            <div class="txt">
                                <p class="product-title">JEEP COMPASS</p>
                                <p class="product-price">R$ 83.500</p>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="card">
                    <a href="#">
                        <div class="product-item">
                            <div class="img">
                                <img src="../images/index/camisa-da-rota.png" alt="Imagem da peita da rota">
                            </div>
                            <div class="txt">
                                <p class="product-title">Camisa da ROTA-SP</p>
                                <p class="product-price">R$ 70.00</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </section>

        
    </div>
    <!--Footer-->
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