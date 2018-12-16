<html>
    <head>
        <title>Upload Practice</title>
        <script type="text/javascript" src="../Includes/jquery-3.3.1.min.js"></script>
        <script type="text/javascript" src="../Includes/jquery.simplemodal.js"></script>

    </head>

    <body>
        <-- Uploading Photo-->
        <form action="edit_photo_proc.php" method="post" enctype="multipart/form-data">
            select your Profile Pic:
            <input type="file" name="pic" id="pic" accept="image/*" required>
            <input id="button" type="submit" value="Submit">

            <?php
            session_start();
            if (isset($_GET["x"]))
                {

                $pic = $_GET["x"];
                echo "<script>alert('" . $pic . "');</script>";
                echo'<BR><img src="Images/profilepics/' . $pic . '">';
                }
            ?>


            </body>
            </html>