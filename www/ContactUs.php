<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Contact us page for Bitters Website">
        <meta name="author" content="Ryan Feener ryanfeener@gmail.com">
        <link rel="icon" href="favicon.ico">

        <title>Contact US with any Comments or Concerns</title>

        <!-- Bootstrap core CSS -->
        <link href="includes/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="includes/starter-template.css" rel="stylesheet">
        <!-- Bootstrap core JavaScript-->
        <script src="https://code.jquery.com/jquery-1.10.2.js" ></script>
        <script type="text/javascript">
            //any JS validation you write can go here
        </script>
        <style>

            .well
            {
                background-color:lightgray;
                border-style: outset;
                padding-bottom: 50%;
                padding-left: 5%;
            }
            #btnAddress,#btnEmail,#btnPhone
            {
                display: inline-block;
                vertical-align: top;
                padding: 15px;
                margin-right: 50px;
                margin-left: 90px;
                align-items: center;
            }




        </style>
    </head>
    <body>
        <?php
        include("Includes/Header.php");
        ?>
        <br><br>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-2">
                </div>
                <div class="col-lg-8" id="Info">
                    <div class="well well-lg">
                        <h2 style="text-align: center">Contact Us Today!</h2><br><hr>
                        <nav>
                            <table>
                                <td>
                                    <button id="btnPhone" type="button" class="btn btn-info" data-toggle="collapse" data-target="#Phone">
                                        <span class="glyphicon glyphicon-earphone"></span> Phone</button>
                                </td>
                                <td>
                                    <button id="btnAddress" type="button" class="btn btn-info" data-toggle="collapse" data-target="#Mail">
                                        <span class="glyphicon glyphicon-map-marker"></span> Address</button>
                                </td>
                                <td>
                                    <button id="btnEmail" type="button" class="btn btn-info" data-toggle="collapse" data-target="#Email">
                                        <span class="glyphicon glyphicon-envelope"></span> Email</button>
                                </td>

                            </table>
                            <br><hr>

                        </nav>
                        <div id="Phone" class="collapse" style="text-align: left">
                            <h3></span>Give Us A Call with our Toll Free Number</h3><a href="tel:+5064533641"><h4>1-800-BIT-HELP</h4></a><br>
                            <h3>Send us a Fax at</h3> <h4><a href="tel:+5064533641">1-800-FAX-BITT</a></h4>
                        </div>

                        <div id="Mail" class="collapse" style="text-align: left">
                            <h3>Send us a Letter to our Customer Support Specialists</h3>
                            <h3>Bitter Home Office</h3>
                            <h4>56 Carter Crescent<br>
                                Fredericton, NB<br>
                                E3B 5V7<br></h4>
                            <p><span class="glyphicon glyphicon-earphone"></span><a href="tel:+5064533641">(506) 453-3641</a></p>
                        </div>

                        <div id="Email" class="collapse" style="text-align: left">
                            <h3>Email Technical issues to our Tech support Email</h3>
                            <h4><a href="mailto:rfeener@gmail.com">TechSupport@Bitters.com</a></h4><br>
                            <h3>Email Account Issues to our Account Management Professionals</h3>
                            <h4><a href="mailto:rfeener@gmail.com">Accounts@Bitters.com</a></h4><br>
                            <h3>Email Other Issues, Comments or Concerns to our Customer Service </h3>
                            <h4><a href="mailto:rfeener@gmail.com">CustomerService@Bitters.com</a></h4><br>
                        </div>

                    </div>


                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="includes/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="includes/Index.css">

</body>
</html>

