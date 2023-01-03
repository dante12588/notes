<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notatki</title>

    <link rel="stylesheet" href="style/style.css">

</head>
<body>

<header>

    <div class="nav">
        <?php if (isset($_SESSION['user']))
        echo '<p class="user-name">Jesteś zalogowany jako: '. $_SESSION['user'] .'</p>';
        ?>
        <a href="index.php?v=view">Podgląd</a>
        <a href="index.php?v=add_note">Dodaj notatkę</a>
        <!-- <a href="index.php?v=change">Edytuj/Usuń notatkę</a> |  -->
        <?php if (!isset($_SESSION['user']))
        echo '<a href="index.php?v=login">Zaloguj</a>';
        ?>
        <?php if (!isset($_SESSION['user']))
        echo '<a href="index.php?v=register">Rejestrecja</a>';
        ?>
        <a href="logout.php">Wyloguj</a>
    </div>

</header>

<div class="content">

    <div class="container">
        <?php  echo $content ?>
    </div>
</div>
    
</body>
</html>