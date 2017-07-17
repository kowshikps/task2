<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include('connection.php');


if($_GET['value']==1)
{	
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
  echo "updated";
 }
 exit();
}

}
else if($_GET['value']==2){
	


foreach($_FILES["file"]["tmp_name"] as $key=>$tmp_name){
    $temp = $_FILES["file"]["tmp_name"][$key];
    $name = $_FILES["file"]["name"][$key];
     
    if(empty($temp))
    {
        break;
    }
	else
	{
$header1= array('name','email','age','city');
$filename = $_FILES["file-0"]["tmp_name"];
if ($_FILES["file-0"]["size"] > 0) {
    $file = fopen($filename, "r");
	$column_header = fgetcsv($file,1000,",","'");
	$result = array_diff($header1,$column_header);
	if (count($result)==0){
		$i=0;
    while (($emapData = fgetcsv($file, 10000, ",")) !== false) {
		if($emapData[0]!='name' && $emapData[1]!='email' && $emapData[2] != 'age' && $emapData[3] != 'city'){
			$query=mysqli_query($connection,"Select * from udetails where email = '$emapData[1]'");
			if(mysqli_num_rows($query) > 0)
			{
				$i++;
			}
			else
			{
				$sql = mysqli_query($connection,"INSERT into udetails(name,email,age,city)  values ('$emapData[0]','$emapData[1]','$emapData[2]','$emapData[3]')");
				
			}
			
			
		}		
	}
	if($i>0)
	{
		echo " $i duplicate details found ";
	}
    fclose($file);
//        echo 'CSV File has been successfully Inserted';
}
}
    $sql = mysqli_query($connection, "SELECT * FROM udetails");
}
}
}

?>

<!DOCTYPE html>
<html>
<head></head>
<body>
    <form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <table border="2" style= "  margin: 0 auto;" >
            <thead>
                <tr>
                    <th>select</th>
                    
                    <th>name</th>
                    <th>email</th>
                    <th>age</th>
                    <th>city</th>

                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_array($sql)) {
                    $id = $row['id'];
                    $name = $row['name'];
                    $email = $row['email'];
                    $age = $row['age'];
                    $city = $row['city'];
                    ?>
                    <tr>
                        <th><input name="checkbox[]" type="checkbox" id="checkbox[]" value="<?php echo $id; ?>"/></th>
                        
                        <td><?php echo $row["name"] ?></td>
                        <td><?php echo $row["email"] ?></td>
                        <td><?php echo $row["age"] ?></td>
                        <td><?php echo $row["city"] ?></td>
                        <td><a href=edit.php?id=<?php echo $id; ?> >Edit</a></td>
                    </tr>
                    <?php
                }
				
                ?>
				
            </tbody>
        </table>
       
        <input type="button" value="Delete" id="delete" action="delete.php" /></td>
</body>
</html>

