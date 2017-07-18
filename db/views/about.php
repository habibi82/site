

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
   
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

<?php //$data = json_decode(file_get_contents(dirname(__FILE__).'../../data.json'), true);
include_once (dirname(__FILE__).'../../data/db.php');
include_once (dirname(__FILE__).'../../data/db_functions.php');
$count ="Просмотров нет";
$sql = ('SELECT * FROM pictures  ');
$data = getAssocResult($sql);


 ?>
  <h2>Фото</h2>
    <div class="gallery" >
    
        <div class="img" >
            
            <div class="product_id">
            <h3>Выберите фото по ID</h3>
            <form action="" method="post">
            <select name="fotoID" id="" size="5">
            <?php foreach ($data as $item) : ?>
                <option value="<?=$item["id"]?>"><?=$item["id"]?></option>
                <?php endforeach ?>   
                </select>
                <p><input type="submit" value="ПОКАЗАТЬ"></p>
            </form>
           <?php 
           //var_dump($_POST);
           $picture ='';
           if(!empty($_POST["fotoID"])){
           
           
           
           foreach ($data as $item){
            if($item["id"]==$_POST["fotoID"]){
              $count = (int) $item["views"];
              $count++;
              $item["views"] = $count.'';
             // var_dump($item["id"]);
              // var_dump($item["views"] );
               $data[(int)$item["id"]-1]["views"]=$count.'';
              // $item["count"]=$count.'';
             //  var_dump($data);
               //file_put_contents(dirname(__FILE__).'../../data.json', json_encode($data));
               $sth = $dbh->prepare('UPDATE pictures SET views = :count WHERE  id = :id');
               $params = array(
              'count' => $count,
              'id' => $item["id"] );

               $sth->execute($params);
               //$sql = ( 'UPDATE pictures SET views= $count  WHERE id = $item["id"]');
               
                    $picture = $item["link"];
            }
        }
           }else  $picture = $data[0]["link"];


            ?>
            <img src="img/<?=$picture ?>">
            

            }
            <h3>Количество просмотров <?php echo (!($count==null) ? $count :  "Просмотров нет") ;?>  </h3>

        </div>

     
        
    </div>
    

</body>
</html>