<?php
require "conexaoMySql.php";


session_start();
$pdo = mysqlConnect();


$email = $_SESSION["emailUsuario"];


try{
    $sql = <<<sql
      SELECT codigo FROM anunciante
          WHERE anunciante.email = ?
  sql;
      $stmt = $pdo->prepare($sql);
      $stmt->execute([$email]);
      $row = $stmt->fetch();
      $id = $row['codigo'];
  }catch (Exception $e) {
      exit('Ocorreu uma falha: ' . $e->getMessage());
  }


try{

    $sql = <<<SQL
        SELECT
        interesse.mensagem, interesse.dataHora,interesse.contato,interesse.codAnuncio, anuncio.codAnunciante
        FROM interesse 
        INNER JOIN anuncio ON interesse.codAnuncio = anuncio.codigo
        WHERE codAnunciante = "{$id}" 
    SQL;    

    $stmt = $pdo->query($sql);
}

catch(Exception $e){
    exit("Ocorreu uma falha: " . $e->getMessage());
}

?>



<!DOCTYPE html>
<html lang="pt-br">

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
                        <li class="button-login navbar-item-li"><a href="logout.php">Sair</a></li>
                    </div>
                </ul>
            </div>
        </nav>
    </header>
    <h1>MEUS ANÚNCIOS</h1>
<div class="cards">
 
<?php

while ($row = $stmt->fetch()) {
    $codigo = htmlspecialchars($row['codigo']);
    $mensagem = htmlspecialchars($row['mensagem']);
    $dataHora = htmlspecialchars($row['dataHora']);
    $contato = htmlspecialchars($row["contato"]);
    



    echo <<<HTML


                    
                        <div class="form">
                            <div class="data">
                            <p class="product-price">Contato: $contato</p>
                                <p class="product-title">Mensagem: $mensagem</p>
                                <p class="product-price">Data e hora: $dataHora</p>
                            </div>
                            <a href="exclui-interesse.php?codigo=$codigo">Excluir</a> 
                        </div>
HTML;
}

?>




</body>

</html>