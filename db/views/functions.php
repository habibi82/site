<?php 

  var_dump($_FILES);
    $uploads_dir = (dirname(__FILE__).'../../img');

    if($_FILES["pic"]["size"] > 300000)
   {
     echo ("Размер файла превышает три мегабайта");
     exit;
   }
        $tmp_name = $_FILES["pic"]["tmp_name"];
        // basename() может предотвратить атаку на файловую систему;
        // может быть целесообразным дополнительно проверить имя файла
        $name = basename($_FILES["pic"]["name"]);
        move_uploaded_file($tmp_name, "$uploads_dir/$name");
    


/*if($_FILES["filename"]["size"] > 1024*3*1024)
   {
     echo ("Размер файла превышает три мегабайта");
     exit;
   }
   // Проверяем загружен ли файл
   if(is_uploaded_file($_FILES["filename"]["tmp_name"]))
   {
     // Если файл загружен успешно, перемещаем его
     // из временной директории в конечную
     move_uploaded_file($_FILES["filename"]["tmp_name"], "/path/to/file/".$_FILES["filename"]["name"]);
   } else {
      echo("Ошибка загрузки файла");
   }
*/
 require_once (dirname(__FILE__).'../../controllers/index.php');
 action();
?>