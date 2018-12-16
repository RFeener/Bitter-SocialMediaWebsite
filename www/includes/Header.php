

<nav class="navbar navbar-toggleable-md navbar-inverse bg-inverse navbar-fixed-top">
    <button id="navbutton" class="navbar-toggler navbar-toggler-center" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="navbar-brand" href="index.php"><img src="images/logo.jpg" class="logo"></a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="index.php">
                    <img class="bannericons" src="images/home.jfif">Home<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <img class="bannericons" src="images/lightning.png">Moments</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="Notifications.php">
                    <img class="bannericons" src="images/bell.png">Notifications</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="Messages.php">
                    <img class="bannericons" src="images/messages.png">Messages</a>
            </li>
        </ul>
        <!-- Set Search bar, Profile and login information to stick Right on the Nav -->
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#"><img class="bannericons" id="ProfilePic" src="
                    <?php
                    if (isset($_SESSION["SESS_MEMBER_ID"]))
                        {
                        //Need to echo because return a string
                        //Need to use User(classname)
                        // :: <- calls a static method since we don't need a user Object
                        echo User::UserProfilePic($_SESSION["SESS_MEMBER_ID"]);
                        }
                    ?>">
                </a>

                <ul class="dropdown-menu">
                    <li>
                        <a class="dropdown-item" href="logout.php">Logout</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="edit_photo.php"rel="modal:open">Edit Profile Picture</a>

                    </li>
                    <li>
                        <a class="dropdown-item" href="ContactUs.php">Contact Us</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="Signup.php">Sign Up</a>
                    </li>
            </li>

        </ul>
        <li>
            <form class="form-inline my-2 my-lg-0" action="search.php" style= "" method="POST">
                <input class="form-control mr-sm-2 bannericons sbar" type="text" name="searchstring"  id="searchstring" placeholder="Search">
                <button class="btn btn-outline-d my-2 my-sm-0 bannericons" type="submit">Search</button>
            </form>
        </li>
        </ul>

</nav
<!-------------------------->
<!-- MODAL FOR PROFILE PIC-->
<!-------------------------->
<div class="modal" id="EditProfile" role="dialog">
    <div class =" modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">

                <h4 class="modal-title">Edit Profile Picture</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="edit_photo_proc.php" method="post" enctype="multipart/form-data">
                    Please select your new Profile Picture <br>

                    <input type="file" name="pic" id="pic" accept="image/*" required>

                    <input type ="submit" name="submitpic" value="Submit">
                    <br><br>
                </form>
            </div>
        </div>
    </div>
</div>