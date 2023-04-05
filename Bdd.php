<?php
define ("DB_URL", "mysql:host=localhost;dbname=portofolio"); 
define ("DB_USER", "root"); 
define ("DB_PASS", "");


function dbConnect() {
	global $pdo;
	try {
		$pdo = new PDO(DB_URL, DB_USER, DB_PASS);
		$pdo->exec('SET NAMES UTF8');
	}
	catch (PDOException $e) {
		die("<p class='error'>Erreur: " . $e->getMessage() . "</p>");	
	}
}

dbConnect();
function inscriptio($nom, $prenom, $email, $password){
	define define ("SQL_INSC","INSERT INTO users(`mail`, `password`) value(?,?)");
	global $pdo;
	$query = $pdo-> prepare(SQL_INSC);
	$query->execute([$mail, password_hash($password, PASSWORD_DEFAULT)]);
}
function checkuser($mail){		
	define("SQL_INSCRIT","SELECT count(*) FROM users WHERE `mail`=?");
	global $pdo;
	$query=$pdo->prepare(SQL_INSCRIT);
	$query->execute([$mail]);
	$data=$query->fetchAll(PDO::FETCH_ASSOC);
	return $data[0]["count(*)"]==0?false:true;
}
