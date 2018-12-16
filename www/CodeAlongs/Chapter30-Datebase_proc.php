
<?php

//these are defined as constants
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'productsdemo');

global $con;
//mysqli_connect
$con = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if (!$con)
    {
    // die stops excution of the page
    die('Could not connect: ' . mysql_error());
    }

$sql = "Select * from products";
//Write sql statement to Execute
if ($Result = mysqli_query($con, $sql))
    {
    $product = "";
    //while ($row = $Result->fetch_object())
    while ($row = mysqli_fetch_assoc($Result))
        {
        echo $row['ID'] . "    " . $row['Description'] . "<BR>";
        //echo $row->ID . "    " . $row->Description . "<BR>";
        }
    }
// Insert Statement
$prod = 13;
$catagory = "Houseware";
$Description = " Over Mitts";
$image = 77;
$price = 9;
$insert = "INSERT INTO `productsdemo`.`products`
(`ID`,`Category`,`Description`,`Image`,`Price`)
VALUES
($prod,'$catagory','$Description',$image,$price)";

//This line is how we send data to the Database
mysqli_query($con, $insert);
echo $insert . "<BR>";

if (mysqli_affected_rows($con) == 1)
    {
    echo "Row was Added to Products" . mysqli_affected_rows($con) . "<BR>";
    }
else
    {
    echo "Insert Error Detected" . "<BR>";
    }

//only gets here on a submit
if (isset($_POST["TxtName"]))
    {
// Takes USer entered Form Data, Throough the POST HTTP header and into variables
    $Name = $_POST["TxtName"];
    $Email = $_POST["TxtEmail"];
    echo $Name . "<BR>" . $Email . "<BR>.";
    }


//Delete Statement
$delete = "delete from products where id = $prod";
mysqli_query($con, $delete);
if (mysqli_affected_rows($con) > 0)
    {
    echo "Row was Deleted to Products " . mysqli_affected_rows($con) . "<BR>";
    }
else
    {
    echo "Delete Error Detected" . "<BR>";
    }

//Update Statement
$desc2 = "WORKS";
$prod2 = 1;
$update = "Update products "
        . "set Description ='$desc2'"
        . "where id = $prod2";

mysqli_query($con, $update);
if (mysqli_affected_rows($con) > 0)
    {
    echo "Row was Updated to Products " . mysqli_affected_rows($con) . "<BR>";
    }
else
    {
    echo "Update Error Detected" . "<BR>";
    }
    $message = "";
   if (mysqli_affected_rows($con) == 1)
    {
    $message = "User was inserted into Database";
    //echo "<script>alert('$message');</script>";
    }
else
    {
    $message = "Insert Error Detected";
    //echo "<script >alert('$message');</script>";
    }


//Redirect the User to Homepage
header('location:Chapter30Database.php?msg=$message');
?>

