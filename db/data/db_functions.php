<?php
//$sql запрос
define('HOST', 'localhost');
define('USER', "root");
define('PASS', '');
define('DB', 'mybase');


 function getAssocResult($sql) {
    // везде используем библиотеку mysqli !!! i на конце!
    $db = mysqli_connect(HOST, USER, PASS, DB);
    $result = mysqli_query($db, $sql);
    $array_result = array();
    while($row = mysqli_fetch_assoc($result)) {
        $array_result[] = $row;
    }
    mysqli_close($db); // обязательно закрываем соединение
    
    return $array_result; // возвращаем результат
}

// функция выполнения действий с данными
function executeQuery($sql)
{
    $db = mysqli_connect(HOST, USER, PASS, DB);
    $result = mysqli_query($db, $sql); // если все получилось - true, иначе - false
    mysqli_close($db);
    
    return $result; // возвращаем результат в булевой форме
} ?>
