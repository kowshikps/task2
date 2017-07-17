<!DOCTYPE html>
<html>
    <head>
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script>
            $(document).ready(function (){
                $('#upload').on('click', function () {
                    var filename = $('#file').val();
                    var data = new FormData();
                    jQuery.each(jQuery('#file')[0].files, function (i, file) {
                        data.append('file-' + i, file);
                    });
                    var extension = filename.substr(filename.lastIndexOf('.') + 1).toLowerCase();
                    if (filename == '' || filename == null) {
                        $('#error').html("Please  Upload File");
                        return false;
                    } else if (extension == 'csv' || extension == 'xlsx')
                    {
                        var form = $('#formsubmit');
                        var formdata = new FormData(form[0]);
                        $.ajax({
                            type: 'POST',
                            url: 'upload.php?value=2',
                            cache:false,
                            async:false,
                            data: formdata,
                            contentType: false,
                            processData: false,

                        }).done(function (data) {
                            $("#output").html(data);
                        });
                    } else {
                        $('#error').html("Invalid File Format!");
                        return false;
                    }
                });
                $(document).on('click','#delete',function() {
                    console.log("here");
                    var values = new Array();
                    $.each($("input[name='checkbox[]']:checked"), function ()
                    {
                        values.push($(this).val());
                    });
                    console.log(values);
                    window.location = 'http://localhost:8081/mywork/task2/updatedata.php?values=' + values;

                });
            });
        </script>

    </head>
			<body body bgcolor="#E6E6FA" > 
							<h1><Marquee>Hello....</Marquee></h1><br><br>
				<center>	<h2>Please upload your file to fetch data </h2>		</center>


                                <center>	<form enctype="multipart/form-data" method="post" id="formsubmit">  
							<div>
							<label for='upload'>Add Attachments:</label>
							<input type="file" name="file[]" id="file" size="150"  multiple >
							</div>
                 </center>
            
        
    <center><button type="button"  class="btn btn-default" name="Import" value="Import" id="upload">Upload</button></center>
        <center>

            <div id="output">
                <?php
				include('connection.php');
                $sql = mysqli_query($connection, "SELECT * FROM udetails");
                ?>

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

    <?php $x = $row['id']; ?>
                                    <td><a href=edit.php?id=<?php echo $x; ?> >Edit</a></td>
                                </tr>




                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                    </head>

                    <form action="updatedata.php">
                        <input type="button" value="delete" id="delete"/></td>
                    </form>

            </div>
        </center>
    </body>
</html>