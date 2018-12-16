<?php
session_start();
if (!isset($_SESSION["SESS_MEMBER_ID"]))
    {
    header('location:Login.php?dbcs=relog');
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="DESC MISSING">
        <meta name="author" content="Ryan Feener rfeener@gmail.com">
        <link rel="icon" href="favicon.ico">

        <title>Bitter - Social Media for Trolls, Narcissists, Bullies and Presidents</title>

        <!-- Bootstrap core CSS -->
        <link href="includes/bootstrap.min.css" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="includes/starter-template.css" rel="stylesheet">
        <!-- Bootstrap core JavaScript-->
        <script src="https://code.jquery.com/jquery-1.10.2.js" ></script>

        <!-- Script for Modals-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />


        <script>
            //just a little jquery to make the textbox appear/disappear like the real Twitter website does
            $(document).ready(function () {

                //hide the submit button on page load
                $("#button").hide();
                $("#tweet_form").submit(function () {

                    $("#button").hide();
                });
                $("#myTweet").click(function () {
                    this.attributes["rows"].nodeValue = 5;
                    $("#button").show();

                });//end of click event
                $("#myTweet").blur(function () {
                    this.attributes["rows"].nodeValue = 1;
                    //$("#button").hide();
                });//end of click event
            });//end of ready event handler

            function Reply_clicked(id)
            {
                $("#toID").val(id);
            }

        </script>
    </head>

    <body>
        <?php
        include("Includes/User.php");
        include("Includes/Tweet.php");
        include("Includes/Header.php");
        include("Includes/Functions.php");
        $CurrentUser = User::getUser($_SESSION["SESS_MEMBER_ID"]);
        //
        //Messages To Send To User Based on Get Data
        if (isset($_GET["dbcs"]))
            {
            $msg = $_GET["dbcs"];
            DisplayAlert($msg);
            }
        ?>
        <BR><BR>
        <div class="container container-fluid">

            <div class="row">
                <div class="col-md-3">
                    <div id="Profilebox" class="mainprofile img-rounded">

                        <div class="bold">
                            <table border="0" cellspacing="1">
                                <thead>
                                    <tr>
                                        <th><img class="bannericons" id="ProfilePic" src="
                                            <?php echo User::UserProfilePic($_SESSION["SESS_MEMBER_ID"]);
                                            ?>"></th>
                                        <th colspan="2"><a href="userpage.php?UserID='<?php echo $_SESSION["SESS_MEMBER_ID"]; ?>'"><?php echo $CurrentUser->getFirstName() . " " . $CurrentUser->getLastName(); ?></a></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td style="font-weight: bold;">Tweets</td>
                                        <td style="font-weight: bold;">Following</td>
                                        <td style="font-weight: bold;">Followers</td>
                                    </tr>
                                    <tr>
                                        <td><?php User::numTweets($CurrentUser->getUserid()) ?></td>
                                        <td><?php User::numFollowing($CurrentUser->getUserid()) ?></td>
                                        <td><?php User::numFollowers($CurrentUser->getUserid()) ?></td>
                                    </tr> <br><td colspan="3" style="padding-top: 10%;"> <img src="Images/location.png" width="15%"alt="location"/><?php echo $CurrentUser->getLocation(); ?></tr>
                                <tr>  <td colspan="3">
                                        Member Since: <?php
                                        $date = strtotime($CurrentUser->getDateAdded());
                                        echo date("F d, Y ", $date);
                                        ?>
                                    </td>
                                </tr>

                                </tbody>
                            </table><BR><BR><BR><BR><BR>
                        </div>
                    </div><BR>
                    <div id = "Trending"class="trending img-rounded">
                        <a href="Compose.php"><input type="button" value="Compose New Message" name="newMessage" /> </a>
                    </div>

                </div>
                <div class="col-md-6">

                    <div class="img-rounded">

                        <?php
                        User::GetallMessages($_SESSION["SESS_MEMBER_ID"]);
                        ?>

                    </div>
                    <div class="img-rounded">

                        <!---->
                        <!--- REPLY TO TWEET MODAL -->
                        <div id="ReplyModal" class="modal">
                            <form name="ReplyForm" action="Messages_proc.php" method="POST">
                                <input type="hidden" id="toID" name="toID" value="-1">
                                <textarea id="reply" name="reply" placeholder="Reply to Message" rows="5" cols="50"></textarea><br>
                                <button type="submit" name="btnReply" >Leave your Reply</button>
                                <a href="#" rel="modal:close" ><button type="button">Close</button></a>
                            </form>
                        </div>
                        <!--- END OF MODAL -->
                        <!---->
                    </div>
                </div>
                <div class="col-md-3">
                    <div id="PeopleKnowBox" class="whoToTroll img-rounded">
                        <div class="bold">Who to Troll?<BR></div>
                        <!-- display people you may know here-->
                        <div class="follow">
                            <?php
                            echo User::whoToTroll($con);
                            ?>
                        </div>

                    </div><BR>
                    <!--don't need this div for now
                    <div class="trending img-rounded">
                    © 2018 Bitter
                    </div>-->
                </div>
            </div> <!-- end row -->
        </div><!-- /.container -->

        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
        <script src="includes/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="includes/Index.css">
    </body>
</html>
