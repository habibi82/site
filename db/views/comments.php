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

 <form action="" method="post" type="multipart/form-data">
     
<p><b>Ваше имя:</b><br>
   <input type="text" name="uname" size="30">
  </p>
  <p><b>Ваш Emeil:</b><Br>
    <input type="Email" name="Emeil" size="30">
  </p>
  <p>Ваш комментарий<br>
   <textarea name="comment" cols="30" rows="5"></textarea></p>
    <p>
        <input type="submit" value="Отправить">
        <input type="reset" name="clear" value="Очистить">
    </p>




 </form>
 <?php 
 //var_dump($_POST);
  //include_once (dirname(__FILE__).'../../data/db.php');
include_once (dirname(__FILE__).'../../data/db_functions.php');
define('DB_USER', 'root');
define('DB_ADRESS', '127.0.0.1');
define('DB_PASS', '');
define('DB_NAME', 'mybase');

$link = mysqli_connect(DB_ADRESS, DB_USER, DB_PASS, DB_NAME);

// устанавливаем кодировку для корректной работы с русскими буквами
mysqli_set_charset($link, 'utf8');
   
if (isset($_POST['uname'])) {
    $u_name = $_POST['uname'];
} else {
    $u_name = 'Somebody';
}

if (isset($_POST['Emeil'])) {
    $Emeil = $_POST['Emeil'];
} else {
    $Emeil = 'No';
}

if (isset($_POST['comment'])) {
    $feed = $_POST['comment'];
} else {
    $feed = 'Все ОК!';
}

$dsn = 'mysql:host=localhost; dbname=mybase';
$user = 'root';
$password = '';

try {
  $dbh = new PDO($dsn, $user, $password);
  var_dump($dbh); // object(PDO)#1 (0) { }
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
/* $sth = $dbh->prepare('INSERT INTO comments (uname, email, comment) VALUES ( uname = ?, email = ?, comment = ?)');
               $params = array(
              
               $u_name,
               $Emeil,
              $feed);
               print_r($params);
               print_r($sth);

             print_r($sth->execute($params));*/
             $stmt = $dbh->prepare("INSERT INTO comments (uname, email, comment) VALUES (  ?,  ?, ?)");
$stmt->bindParam(1, $u_name);
$stmt->bindParam(2, $Emeil);
 $stmt->bindParam(3, $feed);
 $stmt->execute();
} catch (PDOException $e) {
  echo $e->getMessage();
}


/*define('DB_USER', 'root');
define('DB_ADRESS', 'localhost');
define('DB_PASS', '');
define('DB_NAME', 'mybase');

$link = mysqli_connect(DB_ADRESS, DB_USER, DB_PASS, DB_NAME);

//$feed = mysqli_real_escape_string($link, (string)htmlspecialchars(strip_tags($feed)));
$sql = 'INSERT INTO comments (uname, email, comment) VALUES( "$u_name", "Emeil", "$feed")';

// echo $sql;

$result = mysqli_query($link, $sql);
if (!$result) {
    echo 'Что-то пошло не так.';
} else {
    echo 'Все получилось ';
}*/


//$sql = "INSERT INTO comments (uname, email, comment) VALUES ('olk', 'Emeil', 'feed')";
$sql = 'SELECT * FROM comments  ';
//$result =executeQuery($sql);
$result = getAssocResult($sql);
// echo $sql;
//var_dump($result);
//$result = mysqli_query($link, $sql);



echo "<hr>";
 

  ?>
  <h2>Комментарии</h2>

<div class="comments">
    
     <?php foreach ($result as $item) : ?>
       <div class="uname">Пользователь <?= $item["uname"]?></div>
       <div class="comment">Сказал <?=$item["comment"] ?></div>
    <?php endforeach ?> 
</div>





</body>
</html>
