<?php
//ajax allows for more responsive web pages to enhance the user experience
//ajax lets you use a little JS to make round trips to the server without refreshing the webpage
//we don't really need any PHP on this page :)
?>
<html>
    <head>
        <title>Chap 22-AJAX</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script>
            //add some javascript here
            function frm_submit() {
                $.get(
                        "Chap22_proc.php",
                        $("#myForm").serializeArray(),
                        function (data) {
                            $("#mySpan").text(data.msg);
                        },
                        "json"
                        ); //4 different parameters(php_proc file, from, callback function, json/html object
                return false;
            }
        </script>

    </head>
    <body>
        <!-- the world's most basic form -->

        <form method="get" id="myForm"  action="Chap22_proc.php">
            Username:<input type="text" name="txtUsername" onblur="frm_submit()" ><span id="mySpan"></span><BR>
            Password:<input type="password" name="txtPassword" ><BR>
            First Name:<input type="text" name="txtFirstName"><BR>
            Last Name:<input type="text" name="txtLastName"><BR>
            Address:<input type="text" name="txtAddress"><BR>
            City:<input type="text" name="txtCity"><BR>
            Postal Code:<input type="text" name="txtPostalCode"><BR>
            <input type="submit" value="Create Account" >
        </form>

    </body>

</html>