<?php

$emailError = false;
$fNameError = false;

if( (isset($_POST["r_f_name"]) and $_POST["r_f_name"]) and 
    (isset($_POST["r_l_name"]) and $_POST["r_l_name"]) and
    (isset($_POST["r_mail"]) and $_POST["r_mail"]) and
    (isset($_POST["r_password"]) and $_POST["r_password"])){

        // Walidacja do poprawy tak samo w logowaniu
        if (!filter_var($_POST["r_mail"], FILTER_VALIDATE_EMAIL)) {
            $emailError = "Zły adress email";
        }
        

    $result = $pdo->prepare('SELECT * FROM users WHERE f_name = :name');
    $result->bindParam(':name', $_POST["r_f_name"]);
    $result->execute();
    $user = $result->fetch();

    if( isset($user['f_name'])){
        $fNameError = "Nazwa uzytkownika zajeta";
    }

    if( !isset($user['f_name']) and !$emailError ){
        $result = $pdo->prepare('INSERT INTO users (f_name, l_name, password, mail) VALUES(:fname, :lname, :passwd, :mail)');
        $result->bindParam(':fname', $_POST["r_f_name"]);
        $result->bindParam(':lname', $_POST["r_l_name"]);
        $result->bindParam(':passwd', $_POST["r_password"]);
        $result->bindParam(':mail', $_POST["r_mail"]);
        $result->execute();
    }

}


?>

<form method="post" class="form register-form">
    <h1>Zarejestruj się</h1>
    <input type="text" name="r_f_name" placeholder="Login">
    <?php echo $fNameError ?>
    <input type="text" name="r_l_name" placeholder="Imię">
    <input type="text" name="r_mail" placeholder="Adres e-mail">
    <?php echo $emailError ?>
    <input type="text" name="r_password" placeholder="Hasło">
    <button>Dodaj uzytkownika</button>
</form>