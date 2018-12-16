<?php

class Tweet
    {

    private $tweetID;
    private $tweetText;
    private $userid;
    private $OriginalTweetID;
    private $replytoTweetID;
    private $dateAdded;

    function __construct($tweetID, $tweetText, $userid, $OriginalTweetID, $replytoTweetID, $dateAdded)
        {
        $this->tweetID = $tweetID;
        $this->tweetText = $tweetText;
        $this->userid = $userid;
        $this->OriginalTweetID = $OriginalTweetID;
        $this->replytoTweetID = $replytoTweetID;
        $this->dateAdded = $dateAdded;
        }

    function __get($name)
        {
        return $this->$name;
        }

    function __set($name, $value)
        {
        $this->$name = $value;
        }

    function getTweetID()
        {
        return $this->tweetID;
        }

    function getTweetText()
        {
        return $this->tweetText;
        }

    function getUserid()
        {
        return $this->userid;
        }

    function getOriginalTweetID()
        {
        return $this->OriginalTweetID;
        }

    function getReplytoTweetID()
        {
        return $this->replytoTweetID;
        }

    function getDateAdded()
        {
        return $this->dateAdded;
        }

    function setTweetID($tweetID)
        {
        $this->tweetID = $tweetID;
        }

    function setTweetText($tweetText)
        {
        $this->tweetText = $tweetText;
        }

    function setUserid($userid)
        {
        $this->userid = $userid;
        }

    function setOriginalTweetID($OriginalTweetID)
        {
        $this->OriginalTweetID = $OriginalTweetID;
        }

    function setReplytoTweetID($replytoTweetID)
        {
        $this->replytoTweetID = $replytoTweetID;
        }

    function setDateAdded($dateAdded)
        {
        $this->dateAdded = $dateAdded;
        }

    static function getTweet($id)
        {//This Function Takes in a Tweet ID and returns a Tweet object filled with data based on ID
        include("connect.php");
        //Select Statement to get every users except current user
        $tweetsql = "select tweet_id, tweet_text, user_id,original_tweet_id,reply_to_tweet_id,date_created from tweets where tweet_id =" . $id . ";";

        if ($result = mysqli_query($GLOBALS["con"], $tweetsql))
            {
            while ($row = mysqli_fetch_assoc($result))
                {
                return $tweet = new Tweet($row['tweet_id'], $row['tweet_text'], $row['user_id'], $row['original_tweet_id'], $row['reply_to_tweet_id'], $row['date_created']);
                }
            }
        }

    static function SearchTweets($search)
        {
        echo '<div id="tweet"> <b>Tweets Found: </b><hr> ';
        $SearchTweetSQL = "select tweet_id,tweet_text,user_id,original_tweet_id,reply_to_tweet_id,date_created from tweets where tweet_text like '%" . $search . "%';";
        if ($result = mysqli_query($GLOBALS["con"], $SearchTweetSQL))
            {

            while ($row = mysqli_fetch_assoc($result))
                {
                $tweet = new Tweet($row['tweet_id'], $row['tweet_text'], $row['user_id'], $row['original_tweet_id'], $row['reply_to_tweet_id'], $row['date_created']);
                $TweetUser = User::getUser($row['user_id']);
                ///Date Formatting///
                $tweettime = new DateTime($tweet->dateAdded);
                $isTweet = $tweet->getReplytoTweetID();
                if ($isTweet == 0)// === breaks function
                    {
                    echo'<div id="tweet" >';
                    echo'<br><h6><img class="bannericons" id="ProfilePic" src="' . User::UserProfilePic($TweetUser->getUserid()) . '"><a href="userpage.php?UserID=' . $TweetUser->getUserid() . '">' . $TweetUser->getFirstName() . " " . $TweetUser->getLastName() . '</a> <a href="#"> @' . $TweetUser->getUserName() . "</a>" . isRetweet($row['original_tweet_id']) . " </h6>";
                    echo'<hr><p> ' . $tweet->getTweetText() . '</p>'
                    . '<h6 style="text-align: right;" >' . DateDisplay($tweettime) . '</h6><hr>';
                    echo'<p id="tweetbtns"><input type="image" src="Images/like.ico" name="btnLike" onclick="" height="30px">&emsp;&emsp;&emsp;&emsp;<a href="retweet.php?id=' . $row['tweet_id'] . '">'
                    . '<input id="retweet" alt="retweet" type="image" src="Images/retweet.png" name="btnRetweet" height="30px"></a>&emsp;&emsp;&emsp;&emsp;'
                    . '<a href="#ReplyModal" rel="modal:open"><input id="btnReply" type="image" src="Images/reply.png" name="btnReply" height="30px" onclick="Reply_clicked(' . $tweet->getTweetID() . ',' . $tweet->getOriginalTweetID() . ')"></a>'
                    . '<input type="hidden" id="TweetID" value="' . $tweet->getTweetID() . '">'
                    . '<input type="hidden" id="original_tweetID" value="' . $tweet->getOriginalTweetID() . '"></p>';
                    Comment($tweet->getTweetID());
                    echo '</div><br>';
                    }
                }
            echo '</div>';
            }
        }

    }

//End of Class

function isRetweet($OPid)
    { // Determines if Tweet is a Retweet
    // 0 is the default, if its not 0 than not the Original post.
    if ($OPid != 0)
        {
        //Query to get Original Posters Name
        $opSQL = 'select first_name,last_name from users where user_id= ' . $OPid . ';';
        //echo "<script type='text/javascript'>alert('" . $opSQL . "');</script>";
        $OPQ = mysqli_query($GLOBALS["con"], $opSQL);
        $OPcheck = mysqli_num_rows($OPQ);

        if ($row = mysqli_fetch_assoc($OPQ))
            {
            return ' Retweeted from ' . $row['first_name'] . ' ' . $row['last_name'] . ' ';
            }
        }
    }

function DisplayTweet()
    {//Function used to Display Tweets on an HTML page
    //Select Statement to get every users except current user
    $TweetQry = "SELECT u.first_name, u.last_name, u.screen_name, u.profile_pic, t.tweet_id, t.tweet_text, t.original_tweet_id, t.reply_to_tweet_id, t.user_id,t.date_created FROM users u inner join follows f on u.user_id = f.from_id inner join tweets t on f.from_id = t.user_id where t.reply_to_tweet_id = 0 AND (t.user_id = " . $_SESSION['SESS_MEMBER_ID'] . " OR t.user_id IN (SELECT to_id from follows where from_id = " . $_SESSION['SESS_MEMBER_ID'] . ")) group by tweet_id order by date_created desc;";

    date_default_timezone_get("America/Halifax");
    setlocale(LC_ALL, "en-CA");

    if ($result = mysqli_query($GLOBALS['con'], $TweetQry))
        {
        while ($row = mysqli_fetch_assoc($result))
            {

            $tweet = new Tweet($row['tweet_id'], $row['tweet_text'], $row['user_id'], $row['original_tweet_id'], $row['reply_to_tweet_id'], $row['date_created']);
            $TweetUser = User::getUser($row['user_id']);
            ///Date Formatting///
            $tweettime = new DateTime($tweet->dateAdded);
            $isTweet = $tweet->getReplytoTweetID();
            if ($isTweet == 0)// === breaks function
                {
                echo'<div id="tweet" >';
                echo'<br><h6><img class="bannericons" id="ProfilePic" src="' . User::UserProfilePic($TweetUser->getUserid()) . '"><a href="userpage.php?UserID=' . $row["user_id"] . '">' . $row['first_name'] . " " . $row['last_name'] . '</a> <a href="#"> @' . $row['screen_name'] . "</a>" . isRetweet($row['original_tweet_id']) . " </h6>";
                echo'<p> ' . $tweet->getTweetText() . '</p>'
                . '<h6 style="text-align: right;" >' . DateDisplay($tweettime) . '</h6><hr>';
                echo'<p id="tweetbtns">' . DisplayLike($tweet->getTweetID(), $_SESSION['SESS_MEMBER_ID'])
                . '&emsp;&emsp;&emsp;&emsp;<input id="retweet" alt="retweet" type="image" src="Images/retweet.png" name="btnRetweet" height="30px"></a>&emsp;&emsp;&emsp;&emsp;'
                . '<a href="#ReplyModal" rel="modal:open"><input id="btnReply" type="image" src="Images/reply.png" name="btnReply" height="30px" onclick="Reply_clicked(' . $tweet->getTweetID() . ',' . $tweet->getOriginalTweetID() . ')"></a>'
                . '<input type="hidden" id="TweetID" value="' . $tweet->getTweetID() . '">'
                . '<input type="hidden" id="original_tweetID" value="' . $tweet->getOriginalTweetID() . '"> </p><hr>';
                Comment($tweet->getTweetID());
                echo '</div><br>';
                }
            }//End of While
        }
    }

function DisplayLike($tweetid, $userid)
    {
    $sql = 'Select * from likes where tweet_id =' . $tweetid . ' and user_id=' . $userid . '';
    mysqli_query($GLOBALS["con"], $sql);
    if (mysqli_affected_rows($GLOBALS["con"]) != 0)
        {
        return '<a href="UnlikeTweet.php?tweet_id=' . $tweetid . '"><input type="image" src="Images/unlike.png" name="btnLike" height="30px"/></a>';
        }
    else
        {
        return '<a href="LikeTweet.php?tweet_id=' . $tweetid . '"><input type="image" src="Images/like.png" name="btnLike" height="30px"/></a>';
        }
    }

function Comment($TweetID)
    {//Function used to Display Replies for Tweets based on TweetID on an HTML page
    $commentQry = "select screen_name, tweet_id,tweet_text,t.user_id,original_tweet_id,reply_to_tweet_id,t.date_created "
            . "from users u inner join tweets t on u.user_id = t.user_id where reply_to_tweet_id = " . $TweetID . " order by date_created;";


    if ($result = mysqli_query($GLOBALS['con'], $commentQry))
        {
        while ($row = mysqli_fetch_assoc($result))
            {
            $commentUser = User::getUser($row['user_id']);
            $commenttime = new DateTime($row['date_created']);
            $comTimeFormmated = DateDisplay($commenttime);
            echo '<style>#comment{background-color:lightgray;border-style: solid;border-color:black;border-radius: 10px;border-width: 1px;padding:2%;}</style>';
            echo '<div id="comment" >';
            echo ' <p><img class="bannericons" id="ProfilePic" src="' . User::UserProfilePic($commentUser->getUserid()) . '"><a href="#">' . $row['screen_name'] . '</a> replied ' . $comTimeFormmated . ': <BR>&emsp;&emsp;&emsp;&emsp;' . $row['tweet_text'] . '</p>'
            . '</div>&emsp;<a href="#">Like</a>&emsp; <a href="retweet.php?id=' . $row['tweet_id'] . '">Retweet</a><br>';
            }
        }
    }

function UserActivity($user)
    {
    $UserActivitysql = "SELECT `tweet_id`, `tweet_text`, `user_id`, `original_tweet_id`, `reply_to_tweet_id`, `date_created` FROM `tweets` WHERE `user_id`=" . $user . " OR `original_tweet_id`=" . $user . " OR `reply_to_tweet_id`=" . $user . " order by date_created desc;";

    date_default_timezone_get("America/Halifax");
    setlocale(LC_ALL, "en-CA");

    if ($result = mysqli_query($GLOBALS['con'], $UserActivitysql))
        {
        while ($row = mysqli_fetch_assoc($result))
            {

            $tweet = new Tweet($row['tweet_id'], $row['tweet_text'], $row['user_id'], $row['original_tweet_id'], $row['reply_to_tweet_id'], $row['date_created']);
            $TweetUser = User::getUser($row['user_id']);
            ///Date Formatting///
            $tweettime = new DateTime($tweet->dateAdded);
            $isTweet = $tweet->getReplytoTweetID();

            echo'<div id="tweet" >';
            echo'<br><h6><b>' . isRetweet($row['original_tweet_id']) . " </b></h6>";
            echo'<p> ' . $tweet->getTweetText() . '</p>'
            . '<h6 style="text-align: right;" >' . DateDisplay($tweettime) . '</h6><hr>';
            echo'<p id="tweetbtns">' . DisplayLike($tweet->getTweetID(), $_SESSION['SESS_MEMBER_ID']) . '&emsp;&emsp;&emsp;&emsp;<a href="retweet.php?id=' . $row['tweet_id'] . '">'
            . '<input id="retweet" alt="retweet" type="image" src="Images/retweet.png" name="btnRetweet" height="30px"></a>&emsp;&emsp;&emsp;&emsp;'
            . '<a href="#ReplyModal" rel="modal:open"><input id="btnReply" type="image" src="Images/reply.png" name="btnReply" height="30px" onclick="Reply_clicked(' . $tweet->getTweetID() . ',' . $tweet->getOriginalTweetID() . ')"></a>'
            . '<input type="hidden" id="TweetID" value="' . $tweet->getTweetID() . '">'
            . '<input type="hidden" id="original_tweetID" value="' . $tweet->getOriginalTweetID() . '"></p><hr>';
            echo '</div><br>';
            }//End of While
        }
    }

function DisplayNotifications($userID)
    {
    //LIKES NOTIFICATION//
    $likeNotificationSQL = "select tweet_id,tweet_text,user_id,original_tweet_id,reply_to_tweet_id,date_created from tweets where tweet_id in(select tweet_id from likes where user_id = " . $userID . ") order by date_created desc;";
    date_default_timezone_get("America/Halifax");
    setlocale(LC_ALL, "en-CA");
    echo'<div id="tweet">';
    echo '<h3>Likes</h3><br>';
    if ($result = mysqli_query($GLOBALS['con'], $likeNotificationSQL))
        {
        while ($row = mysqli_fetch_assoc($result))
            {
            $tweet = new Tweet($row['tweet_id'], $row['tweet_text'], $row['user_id'], $row['original_tweet_id'], $row['reply_to_tweet_id'], $row['date_created']);
            $otherUser = User::getUser($row['user_id']);
            $tweettime = new DateTime($tweet->dateAdded);

            echo'<div id="tweet" >';
            echo'<br><h6><img class="bannericons" id="ProfilePic" src="' . User::UserProfilePic($otherUser->getUserid()) . '"><a href="userpage.php?UserID=' . $otherUser->getUserid() . '"> @' . $otherUser->getUserName() . "</a> liked to your tweet " . DateDisplay($tweettime) . "</h6>";

            echo '</div><br>';
            }
        }
    echo '</div><BR>';
    //END OF LIKES//
    // RETWEET NOTICATION //
    $retweetsNotificationSQL = "SELECT `tweet_id`, `tweet_text`, `user_id`, `original_tweet_id`, `reply_to_tweet_id`, `date_created` FROM `tweets` WHERE  `original_tweet_id`=" . $userID . " "
            . "order by date_created desc;";
    date_default_timezone_get("America/Halifax");
    setlocale(LC_ALL, "en-CA");
    echo'<div id="tweet">';
    echo '<h3>Retweets</h3><BR>';
    if ($result = mysqli_query($GLOBALS['con'], $retweetsNotificationSQL))
        {
        while ($row = mysqli_fetch_assoc($result))
            {
            $tweet = new Tweet($row['tweet_id'], $row['tweet_text'], $row['user_id'], $row['original_tweet_id'], $row['reply_to_tweet_id'], $row['date_created']);
            $otherUser = User::getUser($row['user_id']);
            $tweettime = new DateTime($tweet->dateAdded);

            echo'<div id="tweet" >';
            echo'<br><h6><img class="bannericons" id="ProfilePic" src="' . User::UserProfilePic($otherUser->getUserid()) . '"><a href="userpage.php?UserID=' . $otherUser->getUserid() . '"> @' . $otherUser->getUserName() . "</a> Retweeted " . DateDisplay($tweettime) . "</h6>";
            echo'<p> ' . $tweet->getTweetText() . '</p>';
            echo '</div><br>';
            }
        }
    echo '</div><BR>';
    //END OF RETWEET
    //REPLIES NOTIFICATION//
    $repliesNotificationSQL = "select tweet_id,tweet_text,user_id,original_tweet_id,reply_to_tweet_id,date_created from tweets where reply_to_tweet_id in(select tweet_id from tweets where user_id = " . $userID . ") order by date_created desc;";
    date_default_timezone_get("America/Halifax");
    setlocale(LC_ALL, "en-CA");
    echo'<div id="tweet">';
    echo '<h3>Replies</h3>';
    if ($result = mysqli_query($GLOBALS['con'], $repliesNotificationSQL))
        {
        while ($row = mysqli_fetch_assoc($result))
            {
            $tweet = new Tweet($row['tweet_id'], $row['tweet_text'], $row['user_id'], $row['original_tweet_id'], $row['reply_to_tweet_id'], $row['date_created']);
            $otherUser = User::getUser($row['user_id']);
            $tweettime = new DateTime($tweet->dateAdded);

            echo'<div id="tweet" >';
            echo'<br><h6><img class="bannericons" id="ProfilePic" src="' . User::UserProfilePic($otherUser->getUserid()) . '"><a href="userpage.php?UserID=' . $otherUser->getUserid() . '"> @' . $otherUser->getUserName() . "</a> Replied to your tweet " . DateDisplay($tweettime) . "</h6>";
            echo'<p> ' . $tweet->getTweetText() . '</p>';
            echo '</div><br>';
            }
        }
    echo '</div>';

    //END OF RETWEET
    }

?>
