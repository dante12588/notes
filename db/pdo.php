<?php
$mysql_host = 'localhost';
$port = '8889';
$username = 'root';
$password = 'root';
$database = 'notatki';

try{
	$pdo = new PDO('mysql:host='.$mysql_host.';dbname='.$database.';port='.$port, $username, $password );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    print_r($e);
}
?>