<?php
$host = 'localhost';
$db_user = 'root';
$db_password = '';
$db = 'task2';
$primaryId = $_GET["id"];
$connection = mysqli_connect($host, $db_user, $db_password) or die(mysql_error());
mysqli_select_db($connection, $db) or die(mysql_error());
$query = mysqli_query($connection, "SELECT * FROM udetails where id= " . $primaryId);


if (mysqli_num_rows($query) != 0) {
    while ($row = mysqli_fetch_array($query)) {
        $id = $row['id'];
        $name = $row['name'];
        $email = $row['email'];
        $age = $row['age'];
        $city = $row['city'];
    }
    ?>
    <html>
        <head>
            <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
            <script type="text/javascript">
                function checkemail()
                {
                    var emailid = document.getElementById("name2").value;
                    if (emailid)
                    {
                        $.ajax({
                            type: 'post',
                            url: 'checkdata.php',
                            data: {
                                user_email: emailid,
                            },
                            success: function (response) {
                                $('#email_status').html(response);
                                if (response == "OK")
                                {

                                    return true;
                                } else
                                {

                                    return false;
                                }
                            }
                        });
                    } else
                    {
                        $('#email_status').html("");
                        return false;
                    }
                }
            </script>
        </head>
        <body>
        <center>
            <form action="updatedata.php" method="post">
                <br><br><br><br>
                <fieldset style= width:300px>
                    <input type="hidden" name="ID" value="<?php echo $id; ?>"/>
                    id: <input type="text" name="id" value="<?php echo $id; ?>" readonly />
                    <br><br><br>
                    name: <input type="text" name="name" id="name1" value="<?php echo $name; ?>" pattern="([A-zÀ-ž\s]){2,}" oninvalid="setCustomValidity('Please enter at least 5 characters')" />
					
                    <br><br><br>
                    email: <input type="email" name="email" id="name2" value="<?php echo $email ?>" onChange="checkemail();"  />
					<br>
					<span id="email_status"></span>
                    <br><br><br>
                    age: <input type="text" name="age" id="name3"value="<?php echo $age ?>" pattern="[0-9]+"/>
                    <br><br><br>
                    city: <input type="text" name="city" id="name4" value="<?php echo $city ?>"   pattern="[a-zA-Z]+"/>
                    <br><br><br>
                    <input type="Submit" value="Change" id="change1"/>
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