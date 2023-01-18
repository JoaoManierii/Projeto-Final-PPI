<?php
	require 'conexaoMySql.php';
	$pdo = mysqlConnect();

	class endereco
	{
	
	  public $estado;
	  public $cidade;
      public $bairro;

	  function __construct($cidade, $estado,$bairro)
	  {
		
		$this->cidade = $cidade;
		$this->estado = $estado; 
        $this->bairro = $bairro; 
	  }
	}

	$sql = <<<SQL
		SELECT cep, bairro, cidade, estado
		FROM enderecoAjax
	SQL;

	$stmt = $pdo->query($sql);

	while($row = $stmt->fetch()){
		$enderecos[$row['cep']] = new Endereco($row['bairro'], $row['cidade'], $row['estado']);
	}

	$cep = $_GET['cep'] ?? '';

	$endereco = array_key_exists($cep, $enderecos) ? 
	  $enderecos[$cep] : new Endereco('', '', '');
	  
	echo json_encode($endereco);

?>