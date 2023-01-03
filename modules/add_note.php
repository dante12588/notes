<h1>Moduł dodawania notatki</h1>
<?php

dump($_SESSION);

if ( isset($_POST['note']) ){
    $result = $pdo->prepare('INSERT INTO notes (body, id_user) VALUES(:note, :id_user)');
    $result->bindParam(':note', $_POST['note']);
    $result->bindParam(':id_user', $_SESSION['id']);
    $result->execute();
    header('location: index.php?v=view');
}
?>

<form method="post">
    <input type="text" name="note">
    <button>Dodaj</button>
</form>