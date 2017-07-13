<?php
$host = 'localhost';
$db_user = 'root';
//$db_password = '';
$db_password = 'root';
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
                var x=false;
                function checkemail()
                {
                    var emailid = document.getElementById("name2").value;
                    var id=$("#id").val();
                    if (emailid)
                    {
                        $.ajax({
                            type: 'post',
                            url: 'checkdata.php',
                            async: false,
                            data: {
                                user_email: emailid,
                                id:id,
                            },
                            success: function (response) {
                                $('#email_status').html(response);
                                console.log(response);
                                if (response.trim() === "OK")
                                {
                                    console.log(response);
                                    x=true;
                                }
                            }
                        });
                    } else
                    {
                        $('#email_status').html("");
                    }
                    return x;
                }
                
//                $(document).on('submit','#editform',function(e){
//                    console.log("here");
//                    e.preventDefault();
//                    if(checkemail() === true) {
//                        e.stopPropagation();
//                        console.log("here");
//                        $("#editform").submit();
//                        
//                    }
//                });
                
            </script>
        </head>
        <body>
        <center>
            <form action="updatedata.php" method="post" id="editform" onsubmit="return checkemail();">
                <br><br><br><br>
                <fieldset style= width:300px>
                    <input type="hidden" name="ID" value="<?php echo $id; ?>"/>
                    id: <input type="text" name="id" value="<?php echo $id; ?>" readonly  id="id"/>
                    <br><br><br>
                    name: <input type="text" name="name" id="name1" value="<?php echo $name; ?>" pattern="[a-zA-Z]{5}[a-zA-z]*" title="Enter atleast 5 characters (alphabets only)" />
					
                    <br><br><br>
                    email: <input type="email" name="email" id="name2" value="<?php echo $email ?>"/><a href ="javascript:checkemail();">Check Email</a>
					<br>
					<span id="email_status"></span>
                    <br><br><br>
                    age: <input type="text" name="age" id="name3"value="<?php echo $age ?>" pattern="[0-9]+"/>
                    <br><br><br>
                    city: <input type="text" name="city" id="name4" value="<?php echo $city ?>"   pattern="[a-zA-Z]+"/>
                    <br><br><br>
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