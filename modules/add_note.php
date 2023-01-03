<?php

if ( isset($_POST['note']) ){
    $result = $pdo->prepare('INSERT INTO notes (body, id_user) VALUES(:note, :id_user)');
    $result->bindParam(':note', $_POST['note']);
    $result->bindParam(':id_user', $_SESSION['id']);
    $result->execute();
    header('location: index.php?v=view');
}
?>

<h1>Dodaj nową notatkę</h1>

<form method="post" class="add-note">
    <textarea type="text" name="note" placeholder="Uzupełnij swoją notatkę..."></textarea>
    <button>Dodaj</button>
</form>