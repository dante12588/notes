<?php

if( (isset($_POST["f_name"]) and $_POST["f_name"]) and
    (isset($_POST["password"]) and $_POST["password"])){

    $result = $pdo->prepare('SELECT * FROM users WHERE f_name = :name and password = :passwd');
    $result->bindParam(':name', $_POST["f_name"]);
    $result->bindParam(':passwd', $_POST["password"]);
    $result->execute();
    $user = $result->fetch();

    if(isset($user)){
        $_SESSION['user'] = $user['f_name'];
        $_SESSION['l_name'] = $user['l_name'];
        $_SESSION['mail'] = $user['mail'];
        $_SESSION['id'] = $user['id'];
        header('location: index.php');
    }

}

?>
<form method="post" class="form login-form">
    <h1>Zaloguj się</h1>
    <input type="text" name="f_name" placeholder="Login">
    <input type="text" name="password" placeholder="Hasło">
    <button>Zaloguj</button>
</form>