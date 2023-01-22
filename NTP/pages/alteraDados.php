<?php
require "conexaoMySql.php";

session_start();
$pdo = mysqlConnect();

$codigo = $_GET["codigo"] ?? "";
$nome = $_POST['nome'] ?? "";
$cpf = $_POST['cpf'] ?? "";
$senha = $_POST['senha'] ?? "";
$telefone = $_POST['telefone'] ?? "";

$hashSenha = password_hash($senha,PASSWORD_DEFAULT);



try {

  $sql = <<<SQL
    UPDATE anunciante
    SET nome = ?, cpf = ?, senhaHash = ?, telefone = ?
    WHERE codigo = ?
  SQL;

  // Neste caso utilize prepared statements para prevenir
  // ataques do tipo SQL Injection, pois a declaração
  // SQL contem um parâmetro (cpf) vindo da URL
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$nome,$cpf,$hashSenha,$telefone,$codigo]);

  header("location: perfil.php");
  exit();
} 
catch (Exception $e) {  
  exit('Falha inesperada: ' . $e->getMessage());
}