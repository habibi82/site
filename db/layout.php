

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<header>
    <ul>
        <li>
            <a href="?page=index">
                Галерея
            </a>
        </li>
        <li>
            <a href="?page=about">
                Фото
            </a>
        </li>
    </ul>
</header>
<?php

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
?>
<?php include_once ('index.php'); ?>
  <h2>Галерея товаров</h2>
    <div class="gallery" >
    <?php foreach ($data as $item) : ?>
        <div class="img" >
            <a href="img/<?=$item["url"]?>" target ="_blank"><img src="img/<?=$item["url"] ?>"></a>
            <div class="product_name">Медведь <?= $item["name"]?> </div>
            <div class="product_price">Цена <?= $item["price"]?> рублей</div>
            <div class="product_id">ID <?= $item["id"]?> </div>
        </div>

    <?php endforeach ?>    
        
    </div>
    

</body>
</html>