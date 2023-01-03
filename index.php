<?php

require_once './db/pdo.php';
require_once './utils/utils.php';
session_start();

if( array_key_exists('v', $_GET) ){
    $module = $_GET['v'];
    
}
else{
    $module = 'view';
}

if( !isset($_SESSION['user']) and $module != 'login' and $module != 'register'){
    $module = 'login';
}

$moduleDir = './modules/' . $module . '.php';

if(file_exists($moduleDir)){

    ob_start();
    include $moduleDir;
    $content = ob_get_contents();
    ob_end_clean();
    include './layouts/home.php';

}else{
    echo "Błąd aplikacji, Problem do obsłuenia";
}
