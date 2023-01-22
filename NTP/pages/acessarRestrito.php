<?php

require "conexaoMySql.php";

$pdo = mysqlConnect();

$codigo = $_GET['codigo'];


try{
    $sql = <<<sql
        SELECT
        codigo,titulo, descr,preco,dataHora,cep,bairro,cidade,estado,codCategoria,codAnunciante
        FROM anuncio
        WHERE codigo = {$codigo}
        sql;    
        $stmt = $pdo->query($sql);

        
}
catch(Exception $e){
    exit("Ocorreu uma falha: " . $e->getMessage());
}



?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AnúncioNTP</title>
    <link rel="shortcut icon" href="../images/logos/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../css/style-anuncio.css">
    <script src="../js/main.js"></script>
    
</head>

<body>
    <header>
        <nav>
            <div class="navbar">
                <ul>
                    <li><a href='../index.html'><img src="../images/logos/logo.png" alt="imagem logo"></a></li>
                    <li class="navbar-menu" id="navbar-menu"><img src="../images/icons/menu.svg" alt=""></li>
                    <div class="navbar-item" id="navbar-item">
                        <li class="navbar-item-li"><a href="../index.html">Pagina Inicial</a></li>
                        <li class="navbar-item-li"><a href="../demonstracao.html">Demonstraçao</a></li>
                        <li class="button-login navbar-item-li"><a href="./login.html">Login</a></li>
                    </div>
                </ul>
            </div>
        </nav>
    </header>

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


    try{
        $sql1 = <<<sql
    SELECT nome, email
    FROM anunciante
    WHERE codigo = {$codAnunciante}
   sql;  
   $stmt2 = $pdo->query($sql1);
   }
   catch(Exception $e){
       exit("Ocorreu uma falha: " . $e->getMessage());
   }
    

    echo <<<HTML


    
    <div class="container">
        <div class="anuncio-container">
            <div class="anuncio-title">
                <h1 id="title">$titulo</h1>
            </div>
            <div class="anuncio-img">
                <img src="../images/icons/un.png" id="productPhoto" alt="imagem logo">
                <h2 id="price">$preco</h2>
                <div class="small" id="published">Publicado em $dataHora</div>
            </div>
            <div class="anuncio-info">
                <div class="anuncio-descricao">
                    <h3>Descrição</h3>
                    <p id="description">$descr</p>
                </div>
            </div>
        </div>
HTML;

    while ($row = $stmt2->fetch()) {
        $nome = htmlspecialchars($row['nome']);
        $email = htmlspecialchars($row['email']);




        echo <<<HTML

        <div class="anuncio-anunciante">
            <img src="../images/icons/pessoa.png" alt="" id="photo">
            <h2 class="anunciante-name" id="name">$nome</h2>
            <h2 class="anunciante-tel" id="tel">$email</h2>
            <button class="button-comprar">Comprar</button>
            
        </div>

HTML;

    }

}


?>


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


