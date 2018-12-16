<html>
    <head>
        <title>AJAX</title>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="jquery-3.3.1.min.js"></script>
        <script>
            function chkUsername()
            {
                $.get(
                        //Where is it going
                        "RF_AJAX_proc.php",
                        //What it is sending to proc file
                        $("#testForm").serializeArray(),
                        //Dealing with the data returning
                                function (data) {
                                    $("#usernameSpan").text(data.msg);
                                },
                                //What type of data is returning
                                "json"
                                );
                        //Does Not Submit
                        return false;
                    }

        </script>
    </head>
    <body>
        <form method="get" id="testForm" action="RF_AJAX_proc.php">
            Username:<input type="text" name="txtUsername" onkeyup="chkUsername()" ><span id="usernameSpan"></span><br><Br>
            <input type="submit" value="Create Account" >

        </form><BR><BR>

    </body>
</html>
