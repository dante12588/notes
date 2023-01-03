<?php

$result = $pdo->prepare("SELECT notes.id, notes.body, notes.date FROM notes INNER JOIN users on notes.id_user=users.id WHERE notes.id_user = :id_user");
$result->bindParam(':id_user', $_SESSION['id']);
$result->execute();
$notes = $result->fetchAll();

?>

<h1>Moduł podglądu</h1>

<div class="notes">

  <?php foreach ($notes as $note) { ?>

    <div class="note">
      <p><?php  echo $note['date'] ?></p>
      <p><?php  echo $note['body'] ?></p>
      <div class="note__btn">
        <a href="index.php?v=edit&id=<?php echo $note['id'] ?>">Edytuj</a>
        <a href="index.php?v=delete&id=<?php echo $note['id'] ?>">Usuń</a>
      </div>
    </div>

  <?php }?>

</div>




