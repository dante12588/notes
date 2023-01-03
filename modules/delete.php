<?php

if(!isset($_GET['id'])){
    header('location: index.php?v=view');
}

$result = $pdo->prepare('DELETE FROM notes WHERE id = :id');
$result->bindParam(':id', $_GET['id']);
$result->execute();
header('location: index.php?v=view');