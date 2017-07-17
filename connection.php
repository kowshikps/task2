<?php


$host='localhost';
    $db_user= 'root';
    $db_password= '';
    $db= 'task2';
    $connection=mysqli_connect($host,$db_user,$db_password) or die (mysql_error());
    mysqli_select_db($connection,$db) or die (mysql_error());
	?>