

<HTML>

    <HEAD>
        <TITLE>Fun With Forms - POST</TITLE>
        <SCRIPT>
            function Validate()
            {
                var phone = document.getElementById("phone").value;
                var email = document.getElementById("email").value;
                var post = document.getElementById("PostalCode").value;
                var pass = document.getElementById("password").value;
                var confirm = document.getElementById("confirm").value;


                var Phone_pattern = /^\(\d{3}\) ?\d{3}-|( )?\d{4}$/;
                var Email_pattern = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;
                var Postal_pattern = /^(?<full>(?<part1>[ABCEGHJKLMNPRSTVXY]{1}\d{1}[A-Z]{1})(?:[ ](?=\d))?(?<part2>\d{1}[A-Z]{1}\d{1}))$/;

                if (!Phone_pattern.test(phone))
                {
                    alert('Not A Phone Number');
                    return false;
                } else if (!Email_pattern.test(email))
                {
                    alert('Not An Email Address');
                    return false;
                } else if (!Postal_pattern.test(post))
                {
                    alert('Not An Postal Code');
                    return false;
                } else if (pass !== confirm)
                {
                    alert('Passwords Do not Match');
                    return false;
                } else
                {
                    alert('Works!!!!!');
                }
                return false;
            }


        </script>
    </HEAD>

    <BODY>

        <P><HR>
        <form name="registration_form" method="post" id="registration_form" action="FormRF_proc.php" >

            <label for="name" class="cols-sm-2 control-label">Phone Number</label>
            <input type="text" class="form-control"  name="phone" id="phone"  placeholder="Enter your Phone Number"/>

            <label for="email" class="cols-sm-2 control-label">Your Email</label>
            <input type="text" class="form-control"  name="email" id="email"  placeholder="Enter your Email"/>

            <label for="PostalCode">Your Postal Code</label>
            <input type="text" name="PostalCode" id="PostalCode"  placeholder="Enter your PostalCode"/>
            <br>
            <label for="password">Password</label>
            <input type="text" name="password" id="password"  placeholder="Enter your password"/>

            <label for="confirm">Confirm password</label>
            <input type="text" name="confirm" id="confirm"  placeholder="Enter your confirm"/>

        </div>
        <input type="submit" name="button" id="button" value="submit" onclick="return Validate()" />

    </form>
    <HR></P>



<a href="FormDemo.htm">Back to beginning</a>

</BODY>
</HTML>

