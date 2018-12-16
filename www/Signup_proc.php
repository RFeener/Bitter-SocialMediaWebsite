<?php

//insert the user's data into the users table of the DB
//if everything is successful, redirect them to the login page.
//if there is an error, redirect back to the signup page with a friendly message
//include("connect.php");
include("Includes/User.php");
//Goes to here on Register
if (isset($_POST["firstname"]))
    {
    //Assign Input box data to Variable
    $firstname = trim($_POST["firstname"]);
    $lastname = trim($_POST["lastname"]);
    $email = trim($_POST["email"]);
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);
    $hashPass = password_hash($password, PASSWORD_DEFAULT);
    $confirm = trim($_POST["confirm"]);
    $phone = $_POST["phone"];
    $address = trim($_POST["address"]);
    $province = $_POST["province"];
    $postalCode = trim($_POST["postalCode"]);
    $url = $_POST["url"];
    $desc = mysqli_real_escape_string($con, $_POST["desc"]);
    $location = $_POST["location"];
    $date_created = date("Y-m-d h:i:s");
    $profile = "images/profilepics/default.jfif";

    //Assign Input box data to User Object
    $NewUser = new User(0, $firstname, $lastname, $username, $hashPass, $address, $province, $postalCode, $phone, $email, $url, $desc, $location, $date_created, $profile);

    // Check User name Avalibilty
    if (User::CheckUsername($NewUser) == true)
        {
        //Username Exists, Sending back to Signup Page
        header('location:Signup.php?dbcs=UsernameExists');
        }
    if (mysqli_affected_rows($con) === 0)
        {
        if (FexExValidate($postalCode, $province) == true)
            {
            //Happy Path With a Username that in not in the Database
            if (User::InsertUser($NewUser) == true)
                {
                header('location:Login.php?dbcs=AccountCreated');
                }
            else
                {
                header('location:Signup.php?dbcs=Failed');
                }
            }
        }
    }

//////////////////////////////FEDEX POSTAL API///////////////////////////////

function FexExValidate($postalCode, $province)
    {
    require_once('Includes/Fedex/fedex-common.php');

//Please include and reference in $path_to_wsdl variable.
    $path_to_wsdl = "Includes/Fedex/wsdl/CountryService/CountryService_v5.wsdl";

    ini_set("soap.wsdl_cache_enabled", "0");

    $client = new SoapClient($path_to_wsdl, array('trace' => 1)); // Refer to http://us3.php.net/manual/en/ref.soap.php for more information

    $request['WebAuthenticationDetail'] = array(
        'ParentCredential' => array(
            'Key' => getProperty('parentkey'),
            'Password' => getProperty('parentpassword')
        ),
        'UserCredential' => array(
            'Key' => getProperty('key'),
            'Password' => getProperty('password')
        )
    );

    $request['ClientDetail'] = array(
        'AccountNumber' => getProperty('shipaccount'),
        'MeterNumber' => getProperty('meter')
    );
    $request['TransactionDetail'] = array('CustomerTransactionId' => ' *** Validate Postal Code Request using PHP ***');
    $request['Version'] = array(
        'ServiceId' => 'cnty',
        'Major' => '5',
        'Intermediate' => '0',
        'Minor' => '1'
    );

    $request['Address'] = array(
        'PostalCode' => $postalCode,
        'StateOrProvinceCode' => $province,
        'CountryCode' => 'CA'
    );

    $request['CarrierCode'] = 'FDXE';


    try
        {
        if (setEndpoint('changeEndpoint'))
            {
            $newLocation = $client->__setLocation(setEndpoint('endpoint'));
            }

        $response = $client->validatePostal($request); //  SENDS TO CLIENT

        $returnProv = $response->PostalDetail->StateOrProvinceCode;


        if ($response->HighestSeverity != 'FAILURE' && $response->HighestSeverity != 'ERROR')
            {
            if ($returnProv != $province)
                {
                header('location:Signup.php?dbcs=FailedPostal');
                }
            else
                {
                return true;
                }
            }
        }
    catch (SoapFault $exception)
        {
        printFault($exception, $client);
        }
    }

?>