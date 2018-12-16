function Validate()
        {
            var phone = document.getElementById("phone").value;
            var email = document.getElementById("email").value;
            var post = document.getElementById("postalCode").value;
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
                return true;
            }
            return false;
        }

