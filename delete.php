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
header("Location: http://localhost:8081/mywork/task2/fileupload.php");
?>

