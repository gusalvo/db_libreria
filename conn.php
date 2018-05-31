<?php




//DATABASE
	$host = 'localhost';

	$db_user = 'root';

	$db_psw = 'root';

    $db_name = 'db_library';
    
    //



//collegamento
$col = "mysql:host=$host;dbname=$db_name";

try {
    //tentativo di connessione
    $pdo = new PDO($col , "$db_user", "$db_psw");
}
    //gestione errori
catch(PDOException $e) {

    echo 'Attenzione errore: '.$e->getMessage();
}





/*
$username = 'root';
// password dell'utente
$password = 'root';

$pdo = new PDO ('mysql:host=localhost;dbname=libreria',$username,$password);
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
*/



?>

