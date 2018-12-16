<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Fake Twitter, Worth a solid A, price: about $3.50">
        <meta name="author" content="Ryan Feener ryanfeener@gmail.com">
        <link rel="icon" href="favicon.ico">

        <title>Sign up for a new Bitter account today!</title>

        <!-- Bootstrap core CSS -->
        <link href="includes/bootstrap.min.css" rel="stylesheet">
    <a href="../../Users/School/AppData/Local/Temp/ProfilesGate.url"></a>

    <!-- Custom styles for this template -->
    <link href="includes/starter-template.css" rel="stylesheet">
    <!-- Bootstrap core JavaScript-->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>

    <script src="includes/bootstrap.min.js"></script>

    <link rel="stylesheet" type="text/css" href="Login.css">
    <script type="text/javascript" src="Signup_JS.js">


    </script>
</head>

<body>
    <?php
    if (isset($_GET["dbcs"]))
        {
        $msg = $_GET["dbcs"];

        if ($msg == "UsernameExists")
            {
            echo "<script>alert('Error Detected, Username Already Exists ');</script>";
            }
        if ($msg == "Failed")
            {

            echo "<script>alert('Error Detected, Account Not Created');</script>";
            }
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
                <a href="Signup.php" rel="modal:open"><img src="Images/multiple-users.png" id="LoginNavbtn"></span>Sign Up</a>
            </li>
        </ul>
    </div>
</nav>
<BR><BR>
<div class="container">
    <div class="row">

        <div class="main-login main-center">
            <div>
                <h5>Sign up once and troll as many people as you like!</h5>
                <form name="registration_form" method="post" id="registration_form" action="Signup_proc.php" >

                    <div class="form-group">
                        <label for="name" class="cols-sm-2 control-label">First Name</label>
                        <div class="cols-sm-10">
                            <div class="input-group">

                                <input type="text" class="form-control" required name="firstname" id="firstname"  placeholder="Enter your First Name" maxlength="50"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="cols-sm-2 control-label">Last Name</label>
                        <div class="cols-sm-10">
                            <div class="input-group">

                                <input type="text" class="form-control" required name="lastname" id="lastname"  placeholder="Enter your Last Name" maxlength="50"/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email" class="cols-sm-2 control-label">Your Email</label>
                        <div class="cols-sm-10">
                            <div class="input-group">

                                <input type="text" class="form-control" required name="email" id="email"  placeholder="Enter your Email" maxlength="100"/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="username" class="cols-sm-2 control-label">Screen Name</label>
                        <div class="cols-sm-10">
                            <div class="input-group">

                                <input type="text" class="form-control" required name="username" id="username"  placeholder="Enter your Screen Name" maxlength="50"/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password" class="cols-sm-2 control-label">Password</label>
                        <div class="cols-sm-10">
                            <div class="input-group">

                                <input type="password" class="form-control" required name="password" id="password"  placeholder="Enter your Password" minlength="4" maxlength="250"/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="confirm" class="cols-sm-2 control-label">Confirm Password</label>
                        <div class="cols-sm-10">
                            <div class="input-group">

                                <input type="password" class="form-control" required name="confirm" id="confirm"  placeholder="Confirm your Password" minlength="4" maxlength="250"/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="cols-sm-2 control-label">Phone Number</label>
                        <div class="cols-sm-10">
                            <div class="input-group">

                                <input type="text" class="form-control" required name="phone" id="phone"  placeholder="Enter your Phone Number" maxlength="25"/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="cols-sm-2 control-label">Address</label>
                        <div class="cols-sm-10">
                            <div class="input-group">

                                <input type="text" class="form-control" required name="address" id="address"  placeholder="Enter your Address"maxlength="200"/>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="name" class="cols-sm-2 control-label">Province</label>
                        <div class="cols-sm-10">
                            <div class="input-group">

                                <select name="province" id="province" class="textfield1" required>
                                    <option> </option>
                                    <option value="BC">British Columbia</option>
                                    <option value="AB">Alberta</option>
                                    <option value="SK">Saskatchewan</option>
                                    <option value="MB">Manitoba</option>
                                    <option value="ON">Ontario</option>
                                    <option value="QC">Quebec</option>
                                    <option value="NB">New Brunswick</option>
                                    <option value="PE">Prince Edward Island</option>
                                    <option value="NS">Nova Scotia</option>
                                    <option value="NF">Newfoundland and Labrador</option>
                                    <option value="NT">Northwest Territories</option>
                                    <option value="NU">Nunavut</option>
                                    <option value="YT">Yukon</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="cols-sm-2 control-label">Postal Code</label>
                        <div class="cols-sm-10">
                            <div class="input-group">

                                <input type="text" class="form-control" required name="postalCode" id="postalCode"  placeholder="Enter your Postal Code" maxlength="7"/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="cols-sm-2 control-label">Url</label>
                        <div class="cols-sm-10">
                            <div class="input-group">

                                <input type="text" class="form-control" name="url" id="url"  placeholder="Enter your URL" maxlength="50"/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="cols-sm-2 control-label">Description</label>
                        <div class="cols-sm-10">
                            <div class="input-group">

                                <input type="text" class="form-control" required name="desc" id="desc"  placeholder="Description of your profile" maxlength="160"/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="cols-sm-2 control-label">Location</label>
                        <div class="cols-sm-10">
                            <div class="input-group">

                                <input type="text" class="form-control" name="location" id="location"  placeholder="Enter your Location" maxlength="50"/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group ">

                        <input type="submit" name="button" id="button" value="Register" class="btn btn-primary btn-lg btn-block login-button" onclick="return Validate()" />

                    </div>

                </form>
                <div>
                    <h5> Already a Member? <a href="login.php">Click Here to Login</a></h5>
                </div>
            </div>

        </div> <!-- end row -->
    </div><!-- /.container -->
</div>
</body>
</html>