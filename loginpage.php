<?php
    session_start();
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset = "utf-8">
        <title>Assignment 4</title>

        <style type="text/css">
            body             {font-family: Georgia, serif; background-color: lightblue;}
            .button          {font-size: 100%; font-family: inherit; padding: 0.25rem;}
            .container       {width: 200px; clear: both;}
            .container input {width: 100%; clear: both;}
        </style>
        <!--found CSS for formatting form at   https://stackoverflow.com/questions/4309950/how-to-align-input-forms-in-html -->

        <script type="text/javascript">
            //this function checks whether the input is appropriate
            function checkForm() {
                var user = document.getElementById('user').value;
                var pass = document.getElementById('pass').value;
                var check = false;

                //the user cannot leave the text boxes blank
                if (user === "" || pass === "") {
                    document.writeln("<a href = \"loginpage.php\">You must fill out the fields.</a>");
                    return false;
                }

                //retrieve the session arrays containing all the usernames and passwords
                var usernames = <?php echo json_encode($_SESSION['usernames']); ?>;
                var passwords = <?php echo json_encode($_SESSION['passwords'])?>;

                var usercount = 0;   //used to count through the members of the username array to later match with that user's password

                //end loop if the inputted username is found within the array
                for (var i=0; i < usernames.length; i++) {
                    if (usernames[i] === user)
                        break;
                    usercount++;
                }

                if (passwords[usercount] === pass || !usernames.includes(user))
                    check = true;

                if (check)
                    return true;     //allow the form to be submitted if the inputted password matches the correct value, or if the username isn't present in the array
                else {
                    document.writeln("<a href = \"loginpage.php\">Incorrect Login.  Please try again.</a>");
                    return false;          //prevent the form from being submitted otherwise
                }
            }
        </script>
    </head>
    <body>
        <center>
            <form action ="index.php" method="post" onsubmit="return checkForm()">
                <div class="container">
                    <label>Name:</label><input type="text" id="user" name="username">
                    <label>Password:</label><input type="password" id="pass" name="password">
                </div>
                <br>
                <input type="submit" value="Log In" class="button">
            </form>

            <p>Password is set upon first login.</p>
        </center>
    </body>
</html>