<?php 

    if ($handle = opendir('img')) {
   // echo "Дескриптор каталога: $handle\n";
   // echo "Записи:\n";
    $links =[];

    /* Именно этот способ чтения элементов каталога является правильным. */
    while (false !== ($entry = readdir($handle))) {
        //echo "$entry\n";
        if ($entry != "." && $entry != "..") {
           // echo "$entry\n";
             array_push($links, $entry);
        }
        
    }
}
    

    closedir($handle);
    var_dump($links);

?>