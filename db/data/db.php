<?php 
$dsn = 'mysql:host=localhost; dbname=mybase';
$user = 'root';
$password = '';

try {
  $dbh = new PDO($dsn, $user, $password);
  //var_dump($dbh); // object(PDO)#1 (0) { }
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sth = $dbh->query('SELECT * FROM pictures  ');
  $pic = $sth->fetchAll(PDO::FETCH_ASSOC);
  //print_r($pic);
} catch (PDOException $e) {
  echo $e->getMessage();
}
 ?>