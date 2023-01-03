<?php

if(!isset($_GET['id'])){
    header('location: index.php?v=view');
}

if(isset($_POST['body'])){
    $result = $pdo->prepare('UPDATE notes SET body=:body WHERE id = :id');
    $result->bindParam(':id', $_GET['id']);
    $result->bindParam(':body', $_POST['body']);
    $result->execute();
    header('location: index.php?v=view');
}

$result = $pdo->prepare('SELECT * FROM notes WHERE id = :id');
$result->bindParam(':id', $_GET['id']);
$result->execute();
$notes = $result->fetch();

?>

<form method="post">
    <textarea type="text" name="body"><?php echo $notes['body']; ?></textarea>
    <br>
    <button>Zapisz</button>
</form>