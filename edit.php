<?php
include('connection.php');
include('script.php');
$primaryId = $_GET["id"];


$query = mysqli_query($connection, "SELECT * FROM udetails where id= " . $primaryId);


if (mysqli_num_rows($query) != 0) {
    $row = mysqli_fetch_array($query) ;
        $id = $row['id'];
        $name = $row['name'];
        $email = $row['email'];
        $age = $row['age'];
        $city = $row['city'];
    
    ?>
    <html>
        <head>    
        </head>
        <body>
        <center>
            <form action="updatedata.php" method="post" id="editform" onsubmit="return checkemail();">
                <br><br><br><br>
                <h1>Edit Details </h1>
                <fieldset style= width:200px>
                    <input type="hidden" name="ID" value="<?php echo $id; ?>"/>
                    Id: <input type="text" name="id" value="<?php echo $id; ?>" readonly  id="id"/>
                    <br><br>
                    Name: <input type="text" name="name" id="name1" value="<?php echo $name; ?>" onkeypress=" return ((event.charCode >=97 && event.charCode <=122) || (event.charCode >=65 && event.charCode <=90) || event.charCode ==8 || event.charCode ==32)"/>

                    <br><br>
                    Email: <input type="email" name="email" id="name2" value="<?php echo $email ?>"/><a href ="javascript:checkemail();"></a>
                    <br><br>
                    <span id="email_status"></span>

                    Age: <input type="text" name="age" id="name3"value="<?php echo $age ?>" onkeypress='return event.charCode >= 48 && event.charCode <= 57' />
                    <br><br>
                    City: <input type="text" name="city" id="name4" value="<?php echo $city ?>"  />
                    <br><br>
                    <input type="submit" value="Change" id="change1"/>
                </fieldset>
            </form>
        </center>
    </body>
    
    </html>

    <?php
} else {
    echo 'No entry found. ';
}
?>
    
  
