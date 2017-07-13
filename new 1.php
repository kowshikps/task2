`<h1>Deleting Multiple Records using PHP &amp; MySQL</h1>
<p>&nbsp;</p>
<?php

  $host='localhost';
    $db_user= 'root';
    $db_password= '';
    $db= 'task2';
    $connection=mysqli_connect($host,$db_user,$db_password) or die (mysql_error());
    mysqli_select_db($connection,$db) or die (mysql_error());

$sql=mysqli_query($connection,"SELECT * FROM udetails");
$count=mysqli_num_rows($sql);
?>
<table width="400" border="0" cellspacing="1" cellpadding="0">
<tr><td><form name="form1" method="post" action="">
<table width="400" border="0" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC"><tr>
<td bgcolor="#FFFFFF">&nbsp;</td>
<td colspan="4" bgcolor="#FFFFFF"><strong>Delete multiple rows in mysql</strong> </td>           </tr>
<tr><td align="center" bgcolor="#FFFFFF">#</td>
<td align="center" bgcolor="#FFFFFF"><strong>Id</strong></td>
<td align="center" bgcolor="#FFFFFF"><strong>Name</strong></td>
<td align="center" bgcolor="#FFFFFF"><strong>email</strong></td>
<td align="center" bgcolor="#FFFFFF"><strong>age</strong></td>
<td align="center" bgcolor="#FFFFFF"><strong>city</strong></td></tr>
<?php while($rows=mysqli_fetch_array($count)){ ?>

<tr><td align="center" bgcolor="#FFFFFF">
<input name="checkbox[]" type="checkbox" id="checkbox[]" value="<? echo $rows['id']; ?>">
</td><td bgcolor="#FFFFFF"><?php echo $rows['id']; ?></td><td bgcolor="#FFFFFF">
<?php echo $rows['name']; ?></td><td bgcolor="#FFFFFF"><?php echo $rows['email']; ?>    </td>
<td bgcolor="#FFFFFF"><?php echo $rows['age']; ?><td bgcolor="#FFFFFF"><?php echo $rows['city']; ?>
</td>
</td></tr>
<?php } ?>
<tr><td colspan="5" align="center" bgcolor="#FFFFFF">
<input name="delete" type="submit" id="delete" value="Delete"></td></tr>
<?php

if(isset($_POST['delete'])){
$checkbox = $_POST['checkbox'];
for($i=0;$i<count($_POST['checkbox']);$i++){
$del_id = $checkbox[$i];
$sql = "DELETE FROM $tbl_name WHERE id='$del_id'";
print $sql;
$result = mysql_query($sql);}

if($result){echo "<meta http-equiv=\"refresh\" content=\"0;URL=index.php\">";}}
mysqli_close();
?>
</table></form></td></tr></table>
<p>Record count: <?php echo number_format($count) ?></p>`