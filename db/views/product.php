

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


  
        
  <?php 

 include_once (dirname(__FILE__).'../../data/db.php');
$product_id=$_GET['id'];
var_dump($product_id);
//print_r($pic);


   ?>
    
 <h2>Карточка  товара</h2>
    <div class="gallery" >
<?php foreach ($pic as $item) : 
if($item["id"]==$product_id){
$product_name =$item["name"];
$product_price=$item["price"];
 $product_link= $item["link"] ;
 $product_detail= $item["detail"] ;
 break;
}
?>
<?php endforeach ?>  
        <div class="img" >
            <img  src="img/<?=$product_link ?>">
            <div class="product_name">Медведь <?= $product_name ?> </div>            <div class="product_id">ID <?= $product_id ?> </div>

            <div class="product_price">Цена <?= $product_price ?> рублей</div>
            <div class="product_detail">Подробное описание <?= $product_detail ?> </div>
            <a href="?page=cart"><div class="buy-btn"></div></a>
            <div class="back_to_catalogue_btn"><a href="?page=index">Назад в каталог</a></div>
        </div>

      
        
    </div>
</body>
</html>