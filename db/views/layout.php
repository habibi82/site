

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
        <li>
            <a href="?page=culc1">
                Калькулятор 1
            </a>
        </li>
        <li>
            <a href="?page=culc2">
               Калькулятор 2
            </a>
        </li>
        <li>
            <a href="?page=comments">
               Отзывы
            </a>
        </li>
    </ul>
</header>


<?php include_once (dirname(__FILE__).'../../data/db.php');
//include_once (dirname(__FILE__).'../../data/functions.php'); ?>
  <h2>Галерея товаров</h2>
    <div class="gallery" >
    <?php foreach ($pic as $item) : ?>
        <div class="img" >
            <a href="?page=product&id=<?= $item["id"]?>"><img  src="img/<?=$item["link"] ?>"></a>
            <div class="product_name">Медведь <?= $item["name"]?> </div>
            <div class="product_price">Цена <?= $item["price"]?> рублей</div>
            <div class="product_id">ID <?= $item["id"]?> </div>
        </div>

    <?php endforeach ?>    
        
    </div>
    
    

</body>
</html>