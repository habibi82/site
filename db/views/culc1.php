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
echo "Задание 1";
var_dump($_POST);
//var_dump($_POST["operation"]);
//require_once 'clear.php';
if(!empty($_POST["operation"])){
	switch ($_POST["operation"] )
	{
	case 'add':
		echo "Сумма чисел ".((int)$_POST['num1']+(int)$_POST['num2']);
		break;
	case 'substr':
		echo "Разность чисел ". ((int)$_POST['num1']-(int)$_POST['num2']);
		break;
	case 'mult':
		echo  "Произведение чисел ".((int)$_POST['num1']*(int)$_POST['num2']);
		break;
	case 'div':
	if ((int)$_POST['num2']==0) {
		echo "Деление на ноль";
		break;
	} else {
		echo "Частное чисел " .((int)$_POST['num1']/(int)$_POST['num2']);
	}
	
		
		break;
	default:
		echo('Выберите операцию');
		break;
}


if (empty($_POST['clear'])) {
	//$_POST['num1']="";
	//$_POST['num2']="";
	unset($_POST['num1']);
	unset($_POST['num2']);
	unset($_POST['clear']);
	unset($_POST["operation"]);
}
}

 ?>
 <form action="" type="multipart/form-data"	method="post">
 	<input name="num1" type="text" placeholder="Введите первое число" value="<?= empty($_POST['num1'])? "" : $_POST['num1']?>">
 	<input  name="num2" type="text" placeholder="Введите второе число" value="<?= empty($_POST['num2'])? "" : $_POST['num2']?>">
 	<select name="operation" >
 		<option disabled selected="">Выберите операцию</option>
 		<option value="add">+</option>
 		<option value="substr">-</option>
 		<option value="mult">*</option>
 		<option value="div">/</option>
 	</select>
 	<button>Посчитать</button>
 	<input type="submit" name ="clear" value="Очистить форму"> 
 







 </form>

</body>
</html>
