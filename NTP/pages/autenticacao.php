<?php

function checkLogin($pdo, $email, $senha)
{
  $sql = <<<SQL
    SELECT senhaHash
    FROM anunciante
    WHERE email = ?
    SQL;

  try {
    // Neste caso utilize prepared statements para prevenir
    // ataques do tipo SQL Injection, pois precisamos
    // inserir dados fornecidos pelo usuário na 
    // consulta SQL (o email do usuário)
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$email]);
	$senhaHash = $stmt->fetchColumn();
    //$row = $stmt->fetch();
    if (!$senhaHash)
		return false; // nenhum resultado (email não encontrado)

	if(!password_verify($senha, $senhaHash))
            return false;

    return $senhaHash;
  } 
  catch (Exception $e) {
    //error_log($e->getMessage(), 3, 'log.php');
    exit('Falha inesperada: ' . $e->getMessage());
  }
}
function checkLogged($pdo)
{
	// Verifica se as variáveis de sessão criadas
	// no momento do login estão definidas
	if (!isset($_SESSION['emailUsuario'], $_SESSION['loginString']))
		return false;

	$email = $_SESSION['emailUsuario'];

	// Resgata a senha hash armazenada para conferência
	$sql = <<<SQL
        SELECT senhaHash
        FROM anunciante
        WHERE email = ?
        SQL;

	try {
	$stmt = $pdo->prepare($sql);
	$stmt->execute([$email]);
	$senhaHash = $stmt->fetchColumn();
	if (!$senhaHash) 
		return false; // nenhum resultado (email não encontrado)

	// Gera uma nova string de login com base nos dados
	// atuais do navegador do usuário e compara com a
	// string de login gerada anteriormente no momento do login
	$loginStringCheck = hash('sha512', $senhaHash . $_SERVER['HTTP_USER_AGENT']);
	if (!hash_equals($loginStringCheck, $_SESSION['loginString']))
		return false;

	return true;
	} 
	catch (Exception $e) {
		exit('Falha inesperada: ' . $e->getMessage());
	}
}

function exitWhenNotLogged($pdo)
{
	if (!checkLogged($pdo)) {
		header("Location: ../pages/anuncio.html");
		exit();
	}
}