<html>
    <head>
        <title>Upload Practice</title>
        <script type="text/javascript" src="../Includes/jquery-3.3.1.min.js"></script>
        <script type="text/javascript" src="../Includes/jquery.simplemodal.js"></script>
<!--        <script type="text/javascript">
            $(document).ready(function ()
            {
            //Hide Form
            $("#Modalform").hide();
                    $("#submit_a_comment".modal({
                    opacity: 80,
                            overlayCss: {backgroundColor: "#CCC"}

                    , onOpen: function (dialog) {
                    dialog.overlay.fadeIn('fast', function () {
                    dialog.data.hide('slow');
                            dialog.container.fadeIn('fast', function () {
                            dialog.data.slideDown('slow');
                            });
                    });
                    }
                    , onClose: function (dialog) {
                    dialog.data.fadeOut('fast', function () {
                    dialog.container.hide('fast', function () {
                    dialog.overlay.slideUp('slow', function () {
                    $.modal.close();
                    });
                    });
                    });
                    }

                    }); //end modal

                            function frmPhoto_submit()
                            {

                            $.get("ajaxServer.php", $("#frmPhoto").serializeArray(),
                                    function (data)
                                    {


                                    }
                            )}
                    }


        </script>-->
    </head>

    <body>
        <-- Uploading Photo-->
        <form action="Upload_proc.php" method="post" enctype="multipart/form-data">
            select your Profile Pic:
            <input type="file" name="pic" id="pic" accept="image/*" required>
            <input id="button" type="submit" value="Submit">
            <!--
                    </form>
                    <div id="Modalform">
                        <h3>Submit a Photo:</h3>
                        <form id="frmPhoto" action="Upload_proc.php" method="post" enctype="multipart/form-data"  onsubmit="return frmPhoto_submit();">
                            select your Profile Pic:
                            <input type="file" name="pic" accept="image/*" required>
                            <input id="button" type="submit" value="Submit">
                            <a href="#" id="closeForm" style="position: absolute; right: 15px;">[Close/Cancel]</a>
                        </form>
                    </div>-->

            <?php
            if (isset($_GET["x"]))
                {

                $pic = $_GET["x"];
                echo "<script>alert('" . $pic . "');</script>";
                echo'<BR><img src="Images/profilepics/' . $pic . '">';
                }
            ?>


            </body>
            </html>



