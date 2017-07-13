<?php
$host='localhost';
    $db_user= 'root';
    $db_password= '';
    $db= 'task2';
	$connection=mysqli_connect($host,$db_user,$db_password) or die (mysql_error());
    mysqli_select_db($connection,$db) or die (mysql_error());
if(isset($_POST['user_email']))
{
 $emailId=$_POST['user_email'];
 $checkdata= mysqli_query($connection," SELECT * FROM udetails WHERE email='$emailId'");
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