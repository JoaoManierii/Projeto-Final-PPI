<?php

require "conexaoMySql.php";
$pdo = mysqlConnect();

$nome = $_POST["nome"]?? "";
$cpf = $_POST["cpf"]?? "";
$email = $_POST["email"]?? "";
$senha = $_POST["senha"]?? "";
$telefone = $_POST["telefone"]?? "";


$hashSenha = password_hash($senha,PASSWORD_DEFAULT);

try {

    
    $sql = <<<SQL
    INSERT INTO anunciante (nome,cpf,email,senhaHash,telefone)
    VALUES (?,?,?,?,?);
    SQL;  
  
    
  
    //USANDO PREPARE STATEMENTS - ARRUMADO PARA EVITAR SQL INJECTIONS
    
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nome,$cpf,$email,$hashSenha,$telefone]);

  } 
  catch (Exception $e) {  
    exit('Falha ao cadastrar os dados: ' . $e->getMessage());
  }

?>



<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NTP</title>
    <link rel="shortcut icon" href="./images/logos/favicon.ico" type="image/x-icon">
    <script src="./js/main.js"></script>
    <style>
      @import url('https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300&display=swap');

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    transition: 1s;
}

body {
    min-height: 100%;
    background-color: #232323;
    font-family: 'Nunito Sans';
}

a {
    text-decoration: none;
}

.none {
    display: none;
}

.container {
    padding-left: 300px;
    padding-right: 300px;
    min-height: 100vh
}

.navbar {
    background-color: #333;

}

.navbar img {
    max-width: 45px;
}

.navbar-menu {
    display: none;
}

.navbar ul {
    list-style-type: none;
    overflow: hidden;
}

.navbar li {
    float: left;
    height: 55px;
}

.navbar li:hover {
    background-color: lightgray;
}

.navbar .button-login {
    float: right;
}

.navbar li a {
    display: block;
    padding: 16px;
    text-align: center;
    text-decoration: none;
    color: white;
}

.title-section {
    color: white;
    padding: 50px;
}

.title ul {
    list-style-type: none;
    overflow: hidden;
}

.title li {
    float: left;
}

.title h1 {
    font-size: 50px;
    margin-bottom: 20px;
}

.title h2 {
    font-size: 30px;
    -webkit-text-stroke-width: 1px;
    -webkit-text-stroke-color: hsl(47, 100%, 49%);
    -webkit-text-fill-color: transparent;
    margin-bottom: 20px;
}

.title .rigth {
    float: right;
}

.title img {
    width: 200px;
}

.search {
    margin: 0 auto;
    width: 100%;
    position: relative;
    margin: 50px 15px 20px 10px;
}

.search input {
    width: 30em;
    border: 3px solid hsl(47, 100%, 49%);
    border-left: none;
    padding: 5px;
    height: 36px;
    border-radius: 0 5px 5px 0;
    outline: none;
    color: #9DBFAF;
}

.search input:focus {
    color: hsl(47, 100%, 49%);
}

.search button {
    width: 40px;
    height: 36px;
    border: 1px solid hsl(47, 100%, 49%);
    background: hsl(47, 100%, 49%);
    text-align: center;
    color: #fff;
    border-radius: 5px 0 0 5px;
    cursor: pointer;
    font-size: 20px;
}

.search img {
    width: 25px;
    margin: 5px;
    filter: invert(100%);
}

.search ul {
    list-style-type: none;
    overflow: hidden;
}

.search li {
    float: left;
}

.section-cards {
    padding: 0 50px;
    margin-bottom: 50px;
}

.cards {
    display: grid;
    grid-template-columns: auto auto auto auto auto;
    row-gap: 10px;
}

.card {
    margin: 10px;
    padding: 10px;
    background-color: whitesmoke;
    border-radius: 8px;
    max-width: 200px;
}

.card:hover {
    background-color: #fff;
    transform: scale(1.05);
}

.card img {
    width: 100%;
    height: 170px;
    border-radius: 8px;
}

.card .txt {
    font-size: 18px;
    margin: 6px 6px;
    color: #232323;
}

.footer {
    padding: 20px;
    text-align: center;
    background-color: #333;
}

.footer h4 {
    margin-bottom: 20px;
    color: rgb(163, 160, 160);
}

.footer ul {
    display: inline-block;
    text-align: left;
    list-style-type: none;
    overflow: hidden;
}

.footer li {
    float: left;
    margin: 5px;
}

.footer li a {
    color: whitesmoke;
}

@media (max-width: 1440px) {
    .container {
        padding: 0;
    }
}

@media (max-width: 1024px) {
    .title img {
        width: 100px;
    }

    .cards {
        grid-template-columns: auto auto auto;
    }
}

@media (max-width: 768px) {
    .cards {
        grid-template-columns: auto auto;
    }
}

@media (max-width: 600px) {
    .title-section {
        padding: 20px;
    }
    
    .title img {
        display: none;
    }

    .navbar li:hover {
        background-color: transparent;
        cursor: pointer;
    }

    .navbar li:active {
        filter: invert(100%);
    }

    .navbar .navbar-item {
        display: none;
    }

    .navbar .navbar-item li:hover {
        background-color: lightgray;
    }

    .navbar .navbar-item-li {
        width: 100%;
    }

    .navbar .navbar-menu {
        display: block;
        margin: 0 15px;
        float: right;
    }

    .navbar .navbar-menu img {
        margin: 5px;
    }

    .cards {
        grid-template-columns: auto;
    }
    
    .card {
        margin: 10px 60px;
        max-width: 100%;
    }

    .card img {
        width: 100%;
    }

    .search input {
        width: 70vw;
    }

    .footer li{
        width: 100%;
        text-align: center;
    }
}

@media (max-width: 530px) {
    .search input {
        width: 60vw;
    }
    
    .card {
        margin: 10px;
        max-width: 100%;
    }
}

@media (max-width: 400px) {
    .search input {
        width: 50vw;
    }
}
    </style>
</head>

<body>
    <header>
        <nav>
            <div class="navbar">
                <ul>
                    <li><a href='./index.html'><img src="images/logos/logo.png" alt="Imagem logo"></a></li>
                    <li class="navbar-menu" id="navbar-menu"><img src="./images/icons/menu.svg" alt=""></li>
                    <div class="navbar-item" id="navbar-item">
                        <li class="navbar-item-li"><a href="./index.html">Pagina Inicial</a></li>
                        <li class="navbar-item-li"><a href="./pages/demonstracao.html">Demonstraçao</a></li>
                        <li class="button-login navbar-item-li"><a href="./pages/login.html">Login</a></li>
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
    </div>

    <p>Cadastro realizado com sucesso</p>
    <a href="login.html">Realizar Login</a>
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