<?php

    function whoToTroll($con)
    {
        if (isset($_SESSION["SESS_MEMBER_ID"])) //only show if you are logged in
        {
            //find three random users, that are not user and display them
            //that are not already being followed

            $sqlStr = "SELECT user_id,first_name,last_name,screen_name,profile_pic "
                    . "FROM users WHERE user_id <> ".$_SESSION["SESS_MEMBER_ID"]." AND user_id NOT IN "
                    . "(SELECT to_id FROM follows WHERE from_id = ".$_SESSION["SESS_MEMBER_ID"].") "
                    . "ORDER BY RAND() LIMIT 3";
            $result = mysqli_query($con, $sqlStr);   

            while ($rows = mysqli_fetch_array($result))                                 
            {     
                if ($rows["screen_name"]!= $_SESSION["SCREEN_NAME"])
                {               //display
                    if ($rows["profile_pic"] == null)    //if there is no profile pic stored use the defualt
                    {    
                        echo
                        '<div class="bold">
                        <img class="bannericons" src="Images/profilepics/default.jfif">
                        <a href="Follow_proc.php?user_id='.$rows["user_id"].'">'
                            .' '.$rows["profile_pic"] 
                                .$rows["first_name"]
                            .' '.$rows["last_name"] 
                            .'<BR> @'.$rows["screen_name"]
                            .'   <button id=button>Follow</button>'
                            . '</a></div><HR/>';
                    }
                    else  //if there is a pic stored, use and display this pic
                    {
                        echo
                        '<div class="bold">
                        <img class="bannericons" src="Images/profilepics/'.$rows["profile_pic"].'">
                        <a href="Follow_proc.php?user_id='.$rows["user_id"].'">'
                                .$rows["first_name"]
                            .' '.$rows["last_name"] 
                            .'<BR> @'.$rows["screen_name"]
                            .'   <button id=button>Follow</button>'
                            . '</a></div><HR/>';
                        
                    }
                }//end if   
            }//end loop
        }//end if         
    }//end function


?>