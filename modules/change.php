<?php

$result = $pdo->prepare("SELECT notes.id, notes.body, notes.date, users.f_name FROM notes INNER JOIN users on notes.id_user=users.id WHERE notes.id_user = :id_user");
$result->bindParam(':id_user', $_SESSION['id']);
$result->execute();
$notes = $result->fetchAll();

?>

<h1>Edytuj lub</h1>

<div class="edit_notes">

  <?php foreach($notes as $note){ ?>
    <?php echo $note['date']; ?>
    <?php echo $note['body']; ?>
    <a href="index.php?v=edit&id=<?php echo $note['id'] ?>">Edytuj</a>
    <a href="index.php?v=delete&id=<?php echo $note['id'] ?>">Usuń</a>
  <?php } ?>

</div>