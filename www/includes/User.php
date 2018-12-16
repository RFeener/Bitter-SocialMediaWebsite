<?php

include("connect.php");

//User Class
class User
    {

    private $Userid;
    private $FirstName;
    private $LastName;
    private $UserName;
    private $Password;
    private $Address;
    private $Province;
    private $PostalCode;
    private $ContactNo;
    private $Email;
    private $URL;
    private $Description;
    private $Location;
    private $DateAdded;
    private $ProfImg;

    function __construct($Userid, $FirstName, $LastName, $UserName, $Password, $Address, $Province, $PostalCode, $ContactNo, $Email, $URL, $Description, $Location, $DateAdded, $ProfImg)
        {
        $this->Userid = $Userid;
        $this->FirstName = $FirstName;
        $this->LastName = $LastName;
        $this->UserName = $UserName;
        $this->Password = $Password;
        $this->Address = $Address;
        $this->Province = $Province;
        $this->PostalCode = $PostalCode;
        $this->ContactNo = $ContactNo;
        $this->Email = $Email;
        $this->URL = $URL;
        $this->Description = $Description;
        $this->Location = $Location;
        $this->DateAdded = $DateAdded;
        $this->ProfImg = $ProfImg;
        }

    function __get($name)
        {
        return $this->$name;
        }

    function __set($name, $value)
        {
        $this->$name = $value;
        }

    function getUserid()
        {
        return $this->Userid;
        }

    function getUserName()
        {
        return $this->UserName;
        }

    function getPassword()
        {
        return $this->Password;
        }

    function getFirstName()
        {
        return $this->FirstName;
        }

    function getLastName()
        {
        return $this->LastName;
        }

    function getAddress()
        {
        return $this->Address;
        }

    function getProvince()
        {
        return $this->Province;
        }

    function getPostalCode()
        {
        return $this->PostalCode;
        }

    function getEmail()
        {
        return $this->Email;
        }

    function getContactNo()
        {
        return $this->ContactNo;
        }

    function getDateAdded()
        {
        return $this->DateAdded;
        }

    function getProfImg()
        {
        return $this->ProfImg;
        }

    function getLocation()
        {
        return $this->Location;
        }

    function getDescription()
        {
        return $this->Description;
        }

    function getURL()
        {
        return $this->URL;
        }

    function setUserid($Userid)
        {
        $this->Userid = $Userid;
        }

    function setUserName($UserName)
        {
        $this->UserName = $UserName;
        }

    function setPassword($Password)
        {
        $this->Password = $Password;
        }

    function setFirstName($FirstName)
        {
        $this->FirstName = $FirstName;
        }

    function setLastName($LastName)
        {
        $this->LastName = $LastName;
        }

    function setAddress($Address)
        {
        $this->Address = $Address;
        }

    function setProvince($Province)
        {
        $this->Province = $Province;
        }

    function setPostalCode($PostalCode)
        {
        $this->PostalCode = $PostalCode;
        }

    function setEmail($Email)
        {
        $this->Email = $Email;
        }

    function setContactNo($ContactNo)
        {
        $this->ContactNo = $ContactNo;
        }

    function setDateAdded($DateAdded)
        {
        $this->DateAdded = $DateAdded;
        }

    function setProfImg($ProfImg)
        {
        $this->ProfImg = $ProfImg;
        }

    function setLocation($Location)
        {
        $this->Location = $Location;
        }

    function setDescription($Description)
        {
        $this->Description = $Description;
        }

    function setURL($URL)
        {
        $this->URL = $URL;
        }

    static function CheckUsername(User $User)
        {//Function To Check if Username Already Exists
        $sqlCheckScreen = "SELECT screen_name from users where screen_name = '$User->UserName'";
        $CheckScreen = mysqli_query($GLOBALS['con'], $sqlCheckScreen);
        if (mysqli_affected_rows($GLOBALS['con']) === 1)
            {
            return true;
            }
        }

    static function getUser($memberID)
        {
        $userQry = "select user_id,first_name,last_name,screen_name,password,address,province,postal_code,contact_number,email,url,description,location,date_created,profile_pic from users where user_id =" . $memberID;
        while ($row = mysqli_fetch_assoc(mysqli_query($GLOBALS['con'], $userQry)))
            {
            $User = new User($row['user_id'], $row['first_name'], $row['last_name'], $row['screen_name'], $row['password'], $row['address'], $row['province'], $row['postal_code'], $row['contact_number'], $row['email'], $row['url'], $row['description'], $row['location'], $row['date_created'], $row['profile_pic']);
            return $User;
            }
        }

    static function whoToTroll($con)
        {

//FOLLOW PHP//
        if (isset($_SESSION["SESS_MEMBER_ID"]))
            {
//Select Statement to get every users except current user
            $Query = "SELECT user_id,first_name,last_name,screen_name,profile_pic "
                    . "FROM users WHERE user_id <> " . $_SESSION["SESS_MEMBER_ID"] . " AND user_id NOT IN "
                    . "(SELECT to_id FROM follows WHERE from_id = " . $_SESSION["SESS_MEMBER_ID"] . ") "
                    . "ORDER BY RAND() LIMIT 3";

//Get Results
            if ($result = mysqli_query($con, $Query))
                {
                while ($row = mysqli_fetch_assoc($result))
                    {
                    echo'<div class="followmember"><p style = "text-overflow:clip"><img src="/Images/profilepics/' . $row['profile_pic'] . '" alt="ProfilePic" width="10%" >' . ' ' . $row['first_name'] . ' ' . $row['last_name'] . ' <a href="userpage.php?UserID=' . $row["user_id"] . '">@' . $row['screen_name'] . '</a></p>';
                    echo'<form action="Follow_proc.php" method="post">';
//
                    echo'<input name="action" type="hidden" value="' . $row['user_id'] . '">';
                    echo'<button type="submit" id="followbtn" class="btn btn-default">Follow</button>';
                    echo'</form></div><hr>';
                    }//End of While
                }//END OF NESTED
            }//End of IF
        }

    static function CountMF($CurrentUserID, $UserID)
        {
        $MFsql = "select count(u.user_id) from users u inner join follows f on u.user_id = f.to_id where to_id in(select to_id from follows f inner join users u on u.user_id = f.to_id where from_id = " . $CurrentUserID . ") and to_id in(select to_id from follows f inner join users u on u.user_id = f.to_id where from_id = " . $UserID . ") group by u.user_id ORDER BY RAND() LIMIT 3";

        mysqli_query($GLOBALS['con'], $MFsql);
        if ($row = mysqli_fetch_row(mysqli_query($GLOBALS['con'], $MFsql)))
            {
            echo $row[0];
            }
        }

    static function MutualFriends($CurrentUserID, $UserID)
        {
        $MFsql = "select u.user_id from users u inner join follows f on u.user_id = f.to_id where to_id in(select to_id from follows f inner join users u on u.user_id = f.to_id where from_id = " . $CurrentUserID . ") and to_id in(select to_id from follows f inner join users u on u.user_id = f.to_id where from_id = " . $UserID . ") group by u.user_id ORDER BY RAND() LIMIT 3";

        if ($result = mysqli_query($GLOBALS['con'], $MFsql))
            {
            while ($row = mysqli_fetch_assoc($result))
                {
                $friend = User::getUser($row['user_id']);

                echo '<p><img class="bannericons" id="ProfilePic"  src="' . User::UserProfilePic($friend->getUserid()) . '"><a href="userpage.php?UserID=' . $row["user_id"] . '">' . $friend->getFirstName() . ' ' . $friend->getLastName() . ' @' . $friend->getUserName() . '</a></p>';
                }
            }
        }

    static function UserProfilePic($memID)
        {
        $Query = "SELECT profile_pic FROM users where user_id = " . $memID;
//Get Results
        if ($result = mysqli_query($GLOBALS['con'], $Query))
            {
            while ($row = mysqli_fetch_assoc($result))
                {
                return 'images/profilepics/' . $row['profile_pic'];
                }
            }
        else
            {
            return 'images/profilepics/default.jfif';
            }
        }

    static function InsertUser(User $NewUser)
        {
        $insertQry = " INSERT INTO `users`(`first_name`,`last_name`,`screen_name`,`password`,`address`,`province`,`postal_code`,`contact_number`,`email`,`url`,`description`,`location`,`date_created`)
            VALUES('$NewUser->FirstName','$NewUser->LastName','$NewUser->UserName','$NewUser->Password','$NewUser->Address','$NewUser->Province','$NewUser->PostalCode','$NewUser->ContactNo','$NewUser->Email','$NewUser->URL','$NewUser->Description','$NewUser->Location',now())";
        mysqli_query($GLOBALS['con'], $insertQry);
        $insertQryCheck = mysqli_affected_rows($GLOBALS['con']);
        if ($insertQryCheck == 1)
            {
            return true;
            }
        else
            {
            return false;
            }
        }

//$sql = "select count(follow_id) from follows where from_id = 65";
    static function numTweets($userid)
        {
        $sql = "select count(tweet_id) from tweets where user_id=" . $userid . ";";
        mysqli_query($GLOBALS['con'], $sql);
        if ($row = mysqli_fetch_row(mysqli_query($GLOBALS['con'], $sql)))
            {
            echo $row[0];
            }
        }

    static function numFollowing($userid)
        {
        $sql = "select count(follow_id) from follows where from_id = " . $userid . ";";
        mysqli_query($GLOBALS['con'], $sql);
        if ($row = mysqli_fetch_row(mysqli_query($GLOBALS['con'], $sql)))
            {
            echo $row[0];
            }
        }

    static function numFollowers($userid)
        {
        $sql = "select count(follow_id) from follows where to_id = " . $userid . ";";
        mysqli_query($GLOBALS['con'], $sql);
        if ($row = mysqli_fetch_row(mysqli_query($GLOBALS['con'], $sql)))
            {
            echo $row[0];
            }
        }

    static function SearchUsers($userid, $search)
        {
        $UserSearch = "SELECT user_id, first_name,last_name,screen_name FROM users where first_name like '%" . $search . "%' or last_name like '%" . $search . "%' or screen_name like '%" . $search . "%' ;";
        mysqli_query($GLOBALS['con'], $UserSearch);
        if ($result = mysqli_query($GLOBALS['con'], $UserSearch))
            {
            echo '<div id="tweet">';
            echo'<b>Users Found:</b><hr>';

            while ($row = mysqli_fetch_assoc($result))
                {
                echo '<img class="bannericons" id="ProfilePic" src="' . User::UserProfilePic($row["user_id"]) . '">';
                echo'<a href="userpage.php?UserID=' . $row["user_id"] . '">' . $row['first_name'] . ' ' . $row['last_name'] . '  @' . $row['screen_name'] . '<a/><BR>';
                User::FollowCheck($userid, $row["user_id"]);
                echo'<hr>';
                }
            echo'</div><hr><br>';
            }
        }

    static function FollowCheck($CurrentUserID, $UserID)
        {
        $FollowCheckSQL = "select from_id,to_id from follows where from_id = " . $CurrentUserID . " AND to_id =  " . $UserID . " ;";
        mysqli_query($GLOBALS['con'], $FollowCheckSQL);
        echo '<form action="Follow_proc.php" method="post">';
        if ($row = mysqli_fetch_row(mysqli_query($GLOBALS['con'], $FollowCheckSQL)))
            {
            echo 'You Are Following';
            }
        else
            {
            echo'<input name="action" type="hidden" value="' . $UserID . '">';
            echo'<button type="submit" id="followbtn" class="btn btn-default">Follow</button>';
            }
        $FollowingSQL = "select from_id,to_id from follows where from_id = " . $UserID . " AND to_id =  " . $CurrentUserID . " ;";
        mysqli_query($GLOBALS['con'], $FollowingSQL);
        if ($row = mysqli_fetch_row(mysqli_query($GLOBALS['con'], $FollowingSQL)))
            {
            echo ' <b>|| User Is Following You</b>';
            }
        echo'</form>';
        }

    static function GetallMessages($userid)
        {
        $MessagesSQL = "select from_id,to_id,message_text,date_sent from messages where to_id=  " . $userid . " ;";
        if ($Result = mysqli_query($GLOBALS['con'], $MessagesSQL))
            {
            while ($row = mysqli_fetch_assoc($Result))
                {
                $messagetime = new DateTime($row['date_sent']);
                $FromUser = User::getUser($row['from_id']);
                echo'<div id="tweet" >';
                echo'<br><h6>Message From: <img class="bannericons" id="ProfilePic" src="' . User::UserProfilePic($FromUser->getUserid()) . '"><a href="userpage.php?UserID=' . $FromUser->getUserid() . '"></a> <a href="#"> @' . $FromUser->getUserName() . "</a></h6>";
                echo'<hr><p> ' . $row['message_text'] . '</p><hr>'
                . ' <a href="#ReplyModal" rel="modal:open"><input id="btnReply" type="image" src="Images/reply.png" name="btnReply" height="30px" onclick="Reply_clicked(' . $row['from_id'] . ')"></a>'
                . '<input type="hidden" id="from_id" value=""></p>'
                . '<h6 style="text-align: right;" >' . DateDisplay($messagetime) . '</h6>';
                echo '</div><br>';
                }
            }
        }

    static function GetScreenNames($searchString)
        {
        $screenameSQL = "select screen_name,user_id from users where user_id <>" . $_SESSION["SESS_MEMBER_ID"] . " AND user_id IN(select to_id from follows WHERE from_id = " . $_SESSION["SESS_MEMBER_ID"] . ") AND screen_name LIKE '%" . $searchString . "%';";
        $userArray = [];

        $returnString = "{\"users\":[";

        if ($result = mysqli_query($GLOBALS['con'], $screenameSQL))
            {
            while ($row = mysqli_fetch_assoc($result))
                {
                $returnString = $returnString . "{\"id\":" . $row['user_id'] . ", \"name\":\"" . $row['screen_name'] . "\"},";
                }
            }
        $returnString = substr($returnString, 0, -1);
        $returnString = $returnString . "]}";

        return $returnString;
        }

    static function SendMessage($toId, $message)
        {
        $replyText = mysqli_real_escape_string($GLOBALS['con'], $message);
        $date_created = date("Y-m-d h:i:s");
        $insertMsgSql = "INSERT INTO messages(from_id,to_id,message_text,date_sent)VALUES(" . $_SESSION["SESS_MEMBER_ID"] . "," . $toId . ",'" . $replyText . "','" . $date_created . "')";
        mysqli_query($GLOBALS['con'], $insertMsgSql);
        $insertQryCheck = mysqli_affected_rows($GLOBALS['con']);
        if ($insertQryCheck == 1)
            {
            header('location:Messages.php');
            }
        else
            {
            header('location:Messages.php?dbcs=MessageFailed');
            }
        }

    static function getIdbyScreenname($toName)
        {
        $sql = "select user_id from users where screen_name ='$toName'";
        if ($row = mysqli_fetch_row(mysqli_query($GLOBALS['con'], $sql)))
            {
            return $row[0];
            }
        }

    }

?>