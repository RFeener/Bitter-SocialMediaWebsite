<?php
session_start();
if (!isset($_SESSION["SESS_MEMBER_ID"]))
    {
    header('location:Login.php?dbcs=relog');
    }
include("Includes/User.php");
include("Includes/Tweet.php");
include("Includes/Header.php");
include("Includes/Functions.php");
if (isset($_GET["UserID"]))
    {
    $User = User::getUser($_GET["UserID"]);
    }
//
//Messages To Send To User Based on Get Data
if (isset($_GET["dbcs"]))
    {
    $msg = $_GET["dbcs"];
    DisplayAlert($msg);
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
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


    </head>

    <body>


        <BR><BR>
        <div class="container container-fluid">

            <div class="row">
                <div class="col-md-3">
                    <div id="Profilebox" class="mainprofile img-rounded">

                        <div class="bold">
                            <table border="0" cellspacing="1">
                                <thead>
                                    <tr>
                                        <th colspan="3"><img class="bannericons" id="ProfilePic" src="
                                            <?php echo User::UserProfilePic($_GET["UserID"]);
                                            ?>">
                                            <a href="userpage.php?UserID='<?php echo $_GET["UserID"]; ?>'"><?php echo $User->getFirstName() . " " . $User->getLastName(); ?></a></th>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <p><i><?php echo $User->getDescription(); ?></i></p>
                                        </td>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr id="lists">
                                        <td style="font-weight: bold;">Tweets</td>
                                        <td style="font-weight: bold;">Following</td>
                                        <td style="font-weight: bold;">Followers</td>
                                    </tr>
                                    <tr id="lists">
                                        <td><?php User::numTweets($User->getUserid()) ?></td>
                                        <td><?php User::numFollowing($User->getUserid()) ?></td>
                                        <td><?php User::numFollowers($User->getUserid()) ?></td>
                                    </tr>
                                    <tr>
                                <br><td colspan="3" style="padding-top: 10%;"> <img src="Images/location.png" width="15%"alt="location"/><?php echo $User->getLocation(); ?></tr>
                                <tr>  <td colspan="3">
                                        Member Since: <?php
                                        $date = strtotime($User->getDateAdded());
                                        echo date("F d, Y ", $date);
                                        ?>
                                    </td>

                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <?php User::FollowCheck($_SESSION["SESS_MEMBER_ID"], $User->getUserid()) ?>
                                    </td>
                                </tr>



                                </tbody>
                            </table><BR><BR><BR><BR><BR>
                        </div>
                    </div><BR>
                    <div id = "Trending"class="trending img-rounded">

                        <div class="bold"><?php USER::CountMF($_SESSION["SESS_MEMBER_ID"], $_GET["UserID"]); ?> Mutual Friends</div>
                        <?php USER::MutualFriends($_SESSION["SESS_MEMBER_ID"], $_GET["UserID"]); ?>





                    </div>

                </div>
                <div class="col-md-6">

                    <div class="img-rounded">
                        <?php
                        UserActivity($User->getUserid());
                        ?>
                        <!---->
                        <!--- REPLY TO TWEET MODAL -->
                        <div id="ReplyModal" class="modal">
                            <form name="ReplyForm" action="reply.php" method="POST">
                                <input type="hidden" id="hdnTweetid" name="hdnTweetid" value="-1">
                                <input type="hidden" id="opID" name="opID" value="-1">
                                <textarea id="reply" name="reply" placeholder="Write your Reply here" rows="5" cols="50"></textarea><br>
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
