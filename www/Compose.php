
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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <!-- Script for Modals-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />


        <script src="https://code.jquery.com/jquery-3.3.1.js" ></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script>
            $(document).ready(function () {
                //hide the submit button on page load
                $("#button").hide();
                $("#message_form").submit(function () {
                    //alert("submit form");
                    $("#button").hide();
                });
                $("#message").focus(function () {
                    this.attributes["rows"].nodeValue = 5;
                    $("#button").show();
                });//end of click event
                $("#to").keyup(//key up event for the user name textbox
                        function (e) {
                            if (e.keyCode === 13) {
                                //don't do anything if the user types the enter key, it might try to submit the form
                                return false;
                            }
                            jQuery.get(
                                    "Compose_AJAX.php",
                                    $("#message_form").serializeArray(),
                                    function (data) {//anonymous function
                                        //uncomment this alert for debugging the directMessage_proc.php page
                                        //alert(data);
                                        //clear the users datalist
                                        $("#dlUsers").empty();
                                        if (typeof (data.users) === "undefined") {
                                            $("#dlUsers").append("<option value='NO USERS FOUND' label='NO USERS FOUND'></option>'");
                                        }
                                        $.each(data.users, function (index, element) {
                                            //this will loop through the JSON array of users and add them to the select box
                                            $("#dlUsers").append("<option id='username' value='" + element.name + "' label='" + element.name + "'></option>");
                                            //alert(element.id + " " + element.name);
                                        });
                                    },
                                    //change this to "html" for debugging the UserSearch_AJAX.php page
                                    "json"
                                    );
                            //make sure the focus stays on the textbox so the user can keep typing
                            $("#to").focus();
                            return false;
                        }
                );
            });//end of ready event handler
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


                </div>
                <div class="col-md-6">

                    <div class="img-rounded">
                        <div id="tweet">
                            <form method="POST" id="message_form" action="Messages_proc.php">
                                <div class="form-group">
                                    Send message to: <input type="text" id="to" name="to" list="dlUsers" autocomplete="off"><br>
                                    <datalist id="dlUsers">
                                        <!-- this datalist is empty initially but will hold the list of users to select as the user is typing -->
                                    </datalist>
                                    <!--<input type="hidden" name="userId" value=""> -->
                                    <textarea id="txtMessage" name="reply" placeholder="Write your message here" rows="4" cols="50"></textarea>
                                    <input type="submit" value="Send Message" name="SendMsg" />
                                </div> </form>
                        </div>

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
        <script src="includes/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="includes/Index.css">
    </body>
</html>
