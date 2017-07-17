<?php
$primaryId = $_GET["id"];
include('connection.php');

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
                    Name: <input type="text" name="name" id="name1" value="<?php echo $name; ?>" onkeypress=" return ((event.charCode >=97 && event.charCode <=122) || (event.charCode >=65 && event.charCode <=90))"/>

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
    
   <!--<script> function blockSpecialChar()
    {
    var name=document.getElementById('name1').value;
                    if(blockSpecialChar(name)){
                        var pattern="[a-zA-Z]{5}[a-zA-z]*;
                        var result=pattern.test(name);
                        alert (result);
                       
                        
                    }
                    <script>-->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
            <script type="text/javascript">
                function checkemail()
                {
                    
                    var emailid = document.getElementById("name2").value;
                    var id = $("#id").val();
                    if (emailid)
                    {
                        $.ajax({
                            type: 'post',
                            url: 'upload.php?value=2',
                            async: false,
                            data: {
                                user_email: emailid,
                                id: id,
                            },
                            success: function (response) {
                                $('#email_status').html(response);
                                console.log(response);
                                if (response.trim() === "updated")
                                {
                                    console.log(response);
                                    x = true;
                                }
                            }
                        });
                    } else
                    {
                        $('#email_status').html("");
                    }
                    return x;
                }
                function isNumber(evt) {
                    var charCode = (evt.which) ? evt.which : event.keyCode
                    if (charCode == 46)
                    {
                        var inputValue = $("#inputfield").val()
                        if (inputValue.indexOf('.') < 1)
                        {
                            return true;
                        }
                        return false;
                    }
                    if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57))
                    {
                        return false;
                    }
                    return true;
                }
                function blockSpecialChar(e) {
                     var k;
                    document.all ? k = e.keyCode : k = e.which;
                    return ((k > 64 && k < 91) || (k > 96 && k < 123) || k == 8 || k == 32 || (k >= 48 && k <= 57));
                }

                $(document).ready(function ()
                {
                    $("#inputTextBox").keypress(function (event) {
                        var inputValue = event.which;
                        // allow letters and whitespaces only.
                        if (!(inputValue >= 65 && inputValue <= 120) && (inputValue != 32 && inputValue != 0)) {
                            event.preventDefault();
                        }
                    });
                    $("#name3").bind("keypress", function (event)
                    {
                        if (event.charCode != 0)
                        {

                            var regex = new RegExp("^[0-9]+$");
                            var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
                            if (!regex.test(key))
                            {
                                event.preventDefault();
                                return false;
                            }
                        }
                    });
                    $('#name4').on('keypress', function (key)
                    {
                        if ((key.charCode < 97 || key.charCode > 122) && (key.charCode < 65 || key.charCode > 90) && (key.charCode != 45))
                        {

                            return false;
                            $('#error1').html("Please enter characters only !");

                        }
                    });

                });
</script>
