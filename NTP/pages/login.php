<?php

require "autenticacao.php";
require "conexaoMySql.php";

session_start();

class RequestResponse
{
	public $success;
	public $detail;

	function __construct($success, $detail)
	{
		$this->success = $success;
		$this->detail = $detail;
	}
}



$email = $_POST['email'] ?? '';
$senha = $_POST['senha']?? '';

$pdo = mysqlConnect();

if ($senhaHash = checkLogin($pdo, $email, $senha)) {
  $_SESSION['emailUsuario'] = $email;
  $_SESSION['loginString'] = hash('sha512', $senhaHash . $_SERVER['HTTP_USER_AGENT']);
  $response = new RequestResponse(true, 'index.php');
}
else{
	$response = new RequestResponse(false, '');
}
  
echo json_encode($response);

?>