<?php
    $host='localhost';
    $db_user= 'root';
    $db_password= '';
    $db= 'task2';
    $connection=mysqli_connect($host,$db_user,$db_password) or die (mysql_error());
    mysqli_select_db($connection,$db) or die (mysql_error());

 $id = $_POST["id"];
 $name = $_POST["name"];
  $email = $_POST["email"];
   $city = $_POST["city"];
    $age = $_POST["age"];
$sql=mysqli_query($connection,"Select * from udetails where email = '$email'");
if(mysqli_num_rows($sql) > 0)
{
	echo "user exist";
echo "<script>setTimeout(\"location.href = 'http://localhost:8081/mywork/task2/fileupload.php';\",1500);</script>";
}
else{
	
 $query = mysqli_query($connection,"UPDATE udetails SET name = '$name', email = '$email', age = '$age', city = '$city' WHERE id='$id'");
}
 if(mysqli_affected_rows()>=1)
 {
echo "<p>($id) Record Updated<p>";
header("Location : fileupload.php");
 }else{
	 header("Location : fileupload.php");
echo "<p>($id) Record Updated<p>";
 }
 ?>
 
 <?php
  $host='localhost';
    $db_user= 'root';
    $db_password= '';
    $db= 'task2';
    $connection=mysqli_connect($host,$db_user,$db_password) or die (mysql_error());
    mysqli_select_db($connection,$db) or die (mysql_error());


    $host='localhost';
    $db_user= 'root';
    $db_password= '';
    $db= 'task2';
	$del_id = $_GET['values'];
   $query = mysqli_query($connection,"DELETE FROM udetails WHERE id in ($del_id)");
echo "deleted successfully ";
?>
 
<?php

header("Location: http://localhost:8081/mywork/task2/fileupload.php");
exit;
?>