<?php

require "conexaoMySql.php";

$pdo = mysqlConnect();

$msg = $_POST['mensagem'];
$contato = $_POST['contato'];
$codigo = $_GET['codigo'];





try {

    
    $sql = <<<SQL
    INSERT INTO interesse (mensagem,dataHora,contato,codAnuncio)
    VALUES (?,now(),?,?);
    SQL;  
  
    
  
    //USANDO PREPARE STATEMENTS - ARRUMADO PARA EVITAR SQL INJECTIONS
    
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$msg,$contato,$codigo]);

  } 
  catch (Exception $e) {  
    exit('Falha ao cadastrar os dados: ' . $e->getMessage());
  }

?>