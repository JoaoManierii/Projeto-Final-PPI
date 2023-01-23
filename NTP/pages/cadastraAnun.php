<?php

require "conexaoMySql.php";
session_start();
$pdo = mysqlConnect();


$email = $_SESSION['emailUsuario'];

if($email === ""){
  header("Location: ../index.html");
  exit();
} else {      

  $titulo = $_POST["titulo"] ?? "";
  $descr = $_POST["descr"] ?? "";
  $preco = $_POST["preco"] ?? "";
  $cep = $_POST["cep"] ?? "";
  $bairro = $_POST["bairro"] ?? "";
  $cidade = $_POST["cidade"] ?? "";
  $estado = $_POST["estado"] ?? "";
  $categoria = $_POST["codCategoria"] ?? "";
  $img = $_FILES['nomeArqFoto'];
  //$srcImg = "./images/anun/".$img;

  echo $srcImg;


  
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



  try {


    $sql = <<<SQL
    INSERT INTO anuncio (titulo,descr,preco,dataHora,cep,bairro,cidade,estado,codCategoria,codAnunciante)
    VALUES (?,?,?,now(),?,?,?,?,?,?);
    SQL;



    //USANDO PREPARE STATEMENTS - ARRUMADO PARA EVITAR SQL INJECTIONS

    $stmt = $pdo->prepare($sql);
    $stmt->execute([$titulo, $descr, $preco,$cep, $bairro, $cidade, $estado, $categoria, $id]);
		header("Location: valida.html");

  } catch (Exception $e) {
    exit('Falha ao cadastrar os dados: ' . $e->getMessage());
  }
  
    /*$sql = <<<sql
    SELECT codigo FROM anuncio
        WHERE anuncio.titulo = ?
            AND anuncio.codigo = ?
    sql;
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$titulo, $id]);
    $row = $stmt->fetch();
    $codigo_anuncio = $row['codigo']; */




    /*
    try{
      $sql = <<<sql
      INSERT INTO foto VALUES
          (?,?)
  sql;
  $ultimoIdInserido = $pdo->lastInsertId();
  //echo $ultimoIdInserido;
  $stmt = $pdo->prepare($sql);

  $stmt->execute([$ultimoIdInserido,$srcImg]);
  // movendo a foto para o diretorio;
  move_uploaded_file($_FILES['nomeArqFoto'], $img);
    } catch (Exception $e) {
      exit('Falha ao cadastrar os dados: ' . $e->getMessage());
    } */
    
/*
    

    try{

   
    // Check if image file is a actual image or fake image
    if (isset($_POST['submit'])) {


      move_uploaded_file($_FILES['nomeArqFoto']['tmp_name'], './pages/imgAnun/'.$_FILES['nomeArqFoto']['name']);

      $sql = <<<sql
      INSERT INTO foto VALUES
          (?,?)
    sql;

      $src = $_FILES['nomeArqFoto']['name'];
      $stmt = $pdo->prepare($sql);
      $ultimoIdInserido = $pdo->lastInsertId();

      $stmt->execute([$ultimoIdInserido, $src]);
       
  
  
    }

      
    
    //echo $ultimoIdInserido;
    


    // movendo a foto para o diretorio;
  
    } catch (Exception $e) {
      exit('Falha ao cadastrar os dados: ' . $e->getMessage());
    } */


























    try{
      $sql = <<<sql
      SELECT * FROM enderecoAjax
          WHERE enderecoAjax.cep = ?
      sql;

      $stmt = $pdo->prepare($sql);
      $stmt->execute([$cep]);
      $bool = $stmt->fetch();
      if(!$bool){
          $sql = <<<sql
              INSERT INTO enderecoAjax VALUES
                  (?,?,?,?)
          sql;
          $stmt = $pdo->prepare($sql);
          $stmt->execute([$cep, $bairro,$cidade, $estado]);
  }
    }

    catch (Exception $e) {
      exit('Falha ao cadastrar os dados: ' . $e->getMessage());
    }
    



  
    
  
}

?>
