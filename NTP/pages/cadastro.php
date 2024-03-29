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
    <link rel="shortcut icon" href="../images/logos/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../css/style.css">
    <script src="./js/main.js"></script>
    <style>
        .sucesso {
            text-align: center;
            position: relative;
            background: #FFFFFF;
            border-radius: 5px;
        }
        .sucesso p {
            color: rgb(250, 196, 0);
        }
        .sucesso a {
            color: black;
        }
    </style>

</head>

<body>
    <header>
        <nav>
            <div class="navbar">
                <ul>
                    <li><a href='../index.html'><img src="../images/logos/logo.png" alt="Imagem logo"></a></li>
                    <li class="navbar-menu" id="navbar-menu"><img src="./images/icons/menu.svg" alt=""></li>
                    <div class="navbar-item" id="navbar-item">
                        <li class="navbar-item-li"><a href="../index.html">Pagina Inicial</a></li>
                        <li class="navbar-item-li"><a href="../pages/demonstracao.html">Demonstraçao</a></li>
                        <li class="button-login navbar-item-li"><a href="../pages/login.html">Login</a></li>
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
        <div class="sucesso">
            <p>Cadastro realizado com sucesso</p>
            <a href="login.html">Realizar Login</a>
        </div>
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