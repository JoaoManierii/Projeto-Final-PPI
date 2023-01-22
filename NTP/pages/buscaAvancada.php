<?php

require "conexaoMySql.php";

$pdo = mysqlConnect();

$produto = $_POST["produto"];
$min = $_POST["min"];
$max = $_POST["max"];
$categoria = $_POST['codCategoria'];

try{
    $sql = <<<sql
        SELECT
        codigo,titulo, descr,preco,dataHora,cep,bairro,cidade,estado,codCategoria,codAnunciante
        FROM anuncio
        WHERE descr like '%{$produto}%'AND preco between {$min} and {$max} AND codCategoria = {$categoria}
        sql;    
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
                    <li><a href='./index.html'><img src="../images/logos/logo.png" alt="Imagem logo"></a></li>
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
<div class="cards">
 
<?php

while ($row = $stmt->fetch()) {
    $codigo = htmlspecialchars($row['codigo']);
    $titulo = htmlspecialchars($row['titulo']);
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

<div class="card">
                    <a href="acessar.php?codigo={$codigo}">
                        <div class="product-item">
                            <div class="img">
                                <img src="../images/icons/un.png" alt="imagem do iphone">
                            </div>
                            <div class="txt">
                                <p class="product-title">$titulo</p>
                                <p class="product-price">$preco</p>
                            </div>
                        </div>
                    </a>
                </div>



HTML;
}

?>

</div>


</body>

</html>