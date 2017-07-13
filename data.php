<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>


<!DOCTYPE html>
<html>
<head>
<script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
<script>
$(document).ready(function(){
    
$('#delete').on('click',function() {
    console.log("here");
    var values = new Array();
    $.each($("input[name='checkbox[]']:checked"), function() {   
          values.push($(this).val()); 
      });
    console.log(values);
    window.location = 'http://localhost:8081/mywork/task2/delete.php?values='+values;
});
});
</script>

</head>
<body>
<?php
    $host='localhost';
    $db_user= 'root';
    $db_password= '';
    $db= 'task2';
    $connection=mysqli_connect($host,$db_user,$db_password) or die (mysql_error());
    mysqli_select_db($connection,$db) or die (mysql_error());
$sql = mysqli_query($connection,"SELECT * FROM udetails");

?>

<form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<table border="2" style= "  margin: 0 auto;" >
      <thead>
        <tr>
        <th>select</th>
          <th>id</th>
          <th>name</th>
          <th>email</th>
          <th>age</th>
          <th>city</th>
    
    </tr>
      </thead>
      <tbody>
<?php while ($row = mysqli_fetch_array($sql)){
    $id = $row['id'];
    $name = $row['name'];
    $email = $row['email'];
    $age = $row['age'];
    $city = $row['city'];
?>
<tr>
 <th><input name="checkbox[]" type="checkbox" id="checkbox[]" value="<?php echo $id; ?>"/></th>
  <td><?php echo $row["id"]?></td>
              <td><?php echo $row["name"]?></td>
              <td><?php echo $row["email"]?></td>
              <td><?php echo $row["age"]?></td>
              <td><?php echo $row["city"]?></td>

          <?php $x= $row['id']; ?>
          <td><a href=edit.php?id=<?php echo $x; ?> >Edit</a></td>
</tr>
    
            

       
<?php
}
?>
    </tbody>
    </table>
    </head>
  <center>    <p><h3>click here to upload file again<h3> </p>
<form action="fileupload.php">
<input type="submit" name="clickhere" value="Go Back"></center>
</form>
<center><form action="delete.php">
<input type="button" value="Delete" id="delete"/></td> <center>
</form>

</body>
</html>