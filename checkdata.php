<?php
$host='localhost';
    $db_user= 'root';
   //$db_password = '';
    $db_password = 'root';
    $db= 'task2';
	$connection=mysqli_connect($host,$db_user,$db_password) or die (mysql_error());
    mysqli_select_db($connection,$db) or die (mysql_error());
if(isset($_POST['user_email']))
{
 $emailId=$_POST['user_email'];
 $id = $_POST['id'];
 $checkdata= mysqli_query($connection," SELECT * FROM udetails WHERE email='$emailId' and id <> $id");
 if(mysqli_num_rows($checkdata)>0)
 {
  echo "\n Email Already Exist";
 }
 else
 {
  echo "OK";
 }
 exit();
}
?>