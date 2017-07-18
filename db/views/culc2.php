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
echo '</br>';
echo "<hr>";
echo "Задание 2";

var_dump($_POST);
//var_dump($_POST["operation"]);
//require_once 'clear.php';

	if (isset($_POST["add"])) {
		echo "Сумма чисел ".((int)$_POST['num1']+(int)$_POST['num2']);
		$_POST["result"] ="".((int)$_POST['num1']+(int)$_POST['num2']);
		}
	
	elseif (isset($_POST["substr"])) {
		echo "Разность чисел ". ((int)$_POST['num1']-(int)$_POST['num2']);
		$_POST["result"] ="".((int)$_POST['num1']-(int)$_POST['num2']);
	}
	elseif (isset($_POST["mult"])) {
		echo  "Произведение чисел ".((int)$_POST['num1']*(int)$_POST['num2']);
		$_POST["result"] ="".((int)$_POST['num1']*(int)$_POST['num2']);
	}
	elseif (isset($_POST["div"])) {
	if ((int)$_POST['num2']==0) {
		echo "Деление на ноль";
		return;
	} else {
		echo "Частное чисел " .((int)$_POST['num1']/(int)$_POST['num2']);
		$_POST["result"] ="".((int)$_POST['num1']/(int)$_POST['num2']);
	}
	}
	else{
		echo('Выберите операцию');
	}
	
	
		
		



if (!empty($_POST['clear'])) {
	//$_POST['num1']="";
	//$_POST['num2']="";
	unset($_POST['num1']);
	unset($_POST['num2']);
	unset($_POST['clear']);
	//$_POST["result"]="";
	unset($_POST["result"]);
}



 ?>

<form action="" type="multipart/form-data"	method="post">
 	<input name="num1" type="text" placeholder="Введите первое число" value="<?= empty($_POST['num1'])? "" : $_POST['num1']?>">
 	<input  name="num2" type="text" placeholder="Введите второе число" value="<?= empty($_POST['num2'])? "" : $_POST['num2']?>">
 	<input type="submit" name ="add" value="+">
 	<input type="submit" name ="substr" value="-"> 
 
 	<input type="submit" name ="mult" value="*"> 
 
 	<input type="submit" name ="div" value="/"> 
  <input name="result" type="text" placeholder="Результат" value="<?= empty($_POST['result'])? "" : $_POST['result']?>">
 
 	<!-- <button>Посчитать</button> -->
 	<input type="submit" name ="clear" value="Очистить форму"> 
 







 </form>


</body>
</html>
