<?php>
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
                            url: 'upload.php?value=1',
                            data: {
                                user_email: emailid,
                                id:id,
                            },
                            success: function (response) {
                                $('#email_status').html(response);
                                console.log(response);
                                if (response.trim() == "updated")
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
?>
