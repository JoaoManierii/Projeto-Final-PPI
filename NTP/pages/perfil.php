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
        nome,cpf, email,senhaHash,telefone
        FROM anunciante
        WHERE codigo = {$id}
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
    <link rel="stylesheet" href="../css/style-interesses.css">
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
    <h1>MEUS CHATS</h1>

 
<?php

while ($row = $stmt->fetch()) {
    $codigo = htmlspecialchars($row['codigo']);
    $nome = htmlspecialchars($row['nome']);
    $cpf = htmlspecialchars($row['cpf']);
    $email = htmlspecialchars($row["email"]);
    $telefone = htmlspecialchars($row["telefone"]);





    echo <<<HTML

    <div class="form">
        <div class="data">
            <p>NOME: $nome</p>
            <p>CPF: $cpf</p>
            <p>Email: $email</p>
            <p>Telefone: $nome</p>
        </div>
    <div>
        <a href="alteraDadosFORM.php?codigo=$codigo">Alterar Dados</a>
    </div>
        

HTML;
}

?>

</div>

</body>

</html>