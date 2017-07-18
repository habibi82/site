<?php 

//$data = json_decode(file_get_contents('data.json'), true);
//include_once ('views/layout.php');
//include_once ('views/about.php');
$page = empty($_GET['page']) ? 'index' : $_GET['page'];

$controller_file = "controllers/$page.php";
if (!file_exists( $controller_file )) {
    throw new Exception('Файл контроллера не существует!');
}

require_once( $controller_file );

if ( !function_exists( 'action' )) {
    throw new Exception('Функции action нет в контроллере!');
}

action();
//var_dump($data);

 ?>