<?php
require "conexaoMySql.php";

session_start();
$pdo = mysqlConnect();

$codigo = $_GET["codigo"] ?? "";

try {

  $sql = <<<SQL
  DELETE FROM anunciante
  WHERE codigo = ?
  LIMIT 1
  SQL;

  // Neste caso utilize prepared statements para prevenir
  // ataques do tipo SQL Injection, pois a declaração
  // SQL contem um parâmetro (cpf) vindo da URL
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$codigo]);

  header("location: listar.php");
  exit();
} 
catch (Exception $e) {  
  exit('Falha inesperada: ' . $e->getMessage());
}
