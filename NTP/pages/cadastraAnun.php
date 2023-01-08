<?php

require "conexaoMySql.php";
$pdo = mysqlConnect();

$titulo = $_POST["titulo"]?? "";
$descr = $_POST["descr"]?? "";
$preco = $_POST["preco"]?? "";
$dataHora = $_POST["dataHora"]?? "";
$cep = $_POST["cep"]?? "";
$bairro = $_POST["bairro"]?? "";
$cidade = $_POST["cidade"]?? "";
$estado = $_POST["estado"]?? "";
$categoria = $_POST["codCategoria"]?? "";



try {

    
    $sql = <<<SQL
    INSERT INTO anuncio (titulo,descr,preco,dataHora,cep,cidade,estado,codCategoria,codAnunciante)
    VALUES (?,?,?,?,?,?,?,?,?);
    SQL;  
  
    
  
    //USANDO PREPARE STATEMENTS - ARRUMADO PARA EVITAR SQL INJECTIONS
    
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$titulo,$descr,$preco,$dataHora,$cep,$bairro,$cidade,$estado,$categoria,$codAnunciante]);

  } 
  catch (Exception $e) {  
    exit('Falha ao cadastrar os dados: ' . $e->getMessage());
  }

?>
