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
        titulo, descr,preco,dataHora,cep,bairro,cidade,estado,codCategoria,codAnunciante
        FROM anuncio
        WHERE codAnunciante = "{$id}"
    SQL;    

    $stmt = $pdo->query($sql);
}

catch(Exception $e){
    exit("Ocorreu uma falha: " . $e->getMessage());
}


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
                    <li><a href='index.php'><img src="images/logos/logo.png" alt="Imagem logo"></a></li>
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


        <?php
                    while($row = $stmt->fetch()){
                        $titulo = htmlspecialchars($row['titulo'])   ;
                        $descr = htmlspecialchars($row["descr"]);
                        $preco = htmlspecialchars($row["preco"]);
                        $dataHora = htmlspecialchars($row["dataHora"]);
                        $cep = htmlspecialchars($row["cep"]);
                        $bairro = htmlspecialchars($row["bairro"]);
                        $cidade = htmlspecialchars($row["cidade"]);
                        $estado = htmlspecialchars($row["estado"]);
                        $codCategoria = htmlspecialchars($row["codCategoria"]);
                        $codAnunciante = htmlspecialchars($row["codAnunciante"]);

                        echo <<<HTML
                            <tr>
                                
                                <td>$titulo</td>
                                <td>$descr</td>
                                <td>$preco</td>
                                <td>$dataHora</td>
                                <td>$cep</td>
                                <td>$bairro</td>
                                <td>$cidade</td>
                                <td>$estado</td>
                                <td>$codCategoria</td>
                                <td>$codAnunciante</td>
                                
                            </tr>
                        HTML;
                    }   
                    ?>



    
</body>
</html>