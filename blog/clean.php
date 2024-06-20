<?php 

$pdo = new PDO('mysql:dbname=grafikartphp;host=127.0.0.1','root','Trackmania12--!!');

$pdo->query('DELETE FROM posts LIMIT  1');
$pdo->query('DELETE FROM posts LIMIT  1');