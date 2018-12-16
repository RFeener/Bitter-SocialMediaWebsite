<!DOCTYPE html>


<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="favicon.ico">

        <title>Login - Bitter</title>

        <!-- Bootstrap core CSS -->
        <link href="includes/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="includes/starter-template.css" rel="stylesheet">
        <!-- Bootstrap core JavaScript-->
        <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>

        <script src="includes/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="Login.css">

    </head>



    <body>
        <?php
        include("Includes/Functions.php");

        if (isset($_GET["dbcs"]))
            {
            $msg = $_GET["dbcs"];
            DisplayAlert($msg);
            }
        ?>
        <nav class="navbar navbar-toggleable-md navbar-inverse bg-inverse navbar-fixed-top">

            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="navbar-brand" href="index.php"><img src="images/logo.jpg" class="logo"></a>
                </li>
                <li>
                    <a href="ContactUs.php" ><img src="Images/call-contact.png" id="LoginNavbtn" ></span>Contact Us</a>
                </li>
                <li>
                    <a href="Signup.php" ><img src="Images/multiple-users.png" id="LoginNavbtn"></span>Sign Up</a>
                </li>
            </ul>
        </div>
    </nav>
    <BR><BR>
    <!-- The Modal -->
    <div id="LogForm" class="modal">
        <span onclick="document.getElementById('LogForm').style.display = 'none'"
              class="close" title="Close Modal">&times;</span>

        <!-- Modal Content -->
        <form class="modal-content animate" method="post" id="login_form" action="login_proc.php">

            <div class="form-group">
                <label for="username" class="cols-sm-2 control-label">Screen Name</label>
                <div class="cols-sm-10">
                    <div class="input-group">

                        <input type="text" class="form-control" required name="username" id="username"  placeholder="Enter your Screen Name"/>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="password" class="cols-sm-2 control-label">Password</label>
                <div class="cols-sm-10">
                    <div class="input-group">

                        <input type="password" class="form-control" required name="password" id="password"  placeholder="Enter your Password"/>
                    </div>
                </div>
            </div>

            <div class="form-group ">
                <input type="submit" name="button" id="button" value="Login" class="btn btn-primary btn-lg btn-block login-button" data-toggle="modal" data-target="#myModal"/>

            </div>

            <div class="container" style="background-color:#f1f1f1">
                <button type="button" onclick="document.getElementById('LogForm').style.display = 'none'" class="cancelbtn">Cancel</button>
            </div>
        </form>
    </div><!-- end of modal -->
    <!-- Log In Page -->
    <div class="container">
        <div class="row"><div class ="col-sm-2"> </div>
            <div class ="col-sm-8">
                <div class="main-center  mainprofile intro">
                    <h1>Bitter</h1>
                    <p class="lead">Bitter - Social Media for Trolls, Narcissists, Bullies and United States Presidents.<br></p>
                    <br>
                    <button id="LoginBtn" onclick="document.getElementById('LogForm').style.display = 'block'">Please Login Here!</button>
                    <br>
                    <br><br>
                    <h1>Don't have a Bitter Account?</h1>
                    <p class="lead"><a href="signup.php">Click Here</a> to begin trolling your friends, family, politicians and celebrities.<br></p>
                </div>
            </div><!-- end col -->
            <div class ="col-sm-2"> </div>
        </div> <!-- end row -->
    </div><!-- /.container -->

</body>
</html>