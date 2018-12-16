<?php 
if (isset($_GET["msg"]))
    {
    $msg = $_GET["msg"];
    echo "<script> alert('$msg');</script>";
    
}

?>
<html>
    <head>

    </head>
    <body>
        <form method = "post" action="Chap30_proc.php">
            <label> Name: </label> <input id="Name" name="TxtName" placeholder="name" type="text" ><br>
            <label> Email: </label> <input id="Email" name="TxtEmail" placeholder="Email" type="email" ><br>
            <label> Comments </label><br>
            <textarea id="Comments" name="TxtComments" placeholder="Leave a Comment Here" rows="5">

            </textarea>
            <br><br><br>
            <button type="submit">Send</button>
        </form>


    </body>
</html>
/*
* To change this license header, choose License Headers in Project Properties.
* To change this template file, choose Tools | Templates
* and open the template in the editor.
*/

