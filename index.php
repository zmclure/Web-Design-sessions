<?php
    session_start();

    //set session arrays to hold usernames and their respective passwords
    if (!isset($_SESSION['usernames'])) {
        $usernameArray = array();
        $_SESSION['usernames'] = $usernameArray;
    }
    if (!isset($_SESSION['passwords'])) {
        $passwordArray = array();
        $_SESSION['passwords'] = $passwordArray;
    }

    //set session array to hold all the comments in the comment section
    if (!isset($_SESSION['comments'])) {
        $commentArray = array();
        $_SESSION['comments'] = $commentArray;
    }

    //set session variable to hold the current user
    if (!isset($_SESSION['savedUser'])) {
        $_SESSION['savedUser'] = "No User Selected";
    }

    //set current user after it has been set in the form on second page
    if (isset($_POST['username']))
        $_SESSION['savedUser'] = $_POST['username'];

    //add the username and comment to the comment array, to be printed out on page reload
    if (isset($_POST['comment']) && $_SESSION['savedUser'] !== "No User Selected") {
        $comment = $_POST['comment'];
        $output = "<p><strong>".$_SESSION['savedUser'].":</strong>   ".$comment."</p>";
        $_SESSION['comments'][] = $output;
    }
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset = "utf-8">
        <title>Assignment 4</title>
        <style type="text/css">
            body        {font-family: Georgia, serif; background-color: lightblue;}
            strong      {font-size: 110%}
            .button     {font-size: 100%; font-family: inherit; padding: 0.25rem;}
        </style>
        <script type="text/javascript">
            <?php
                //receive username and password from the form on second page
                if ($_SERVER['REQUEST_METHOD'] == "POST") {
                    $username=$_POST["username"];
                    $password=$_POST["password"];

                    //if the inputted username is not already in the session array, add it and the password to the arrays
                    if (!in_array($username, $_SESSION['usernames'])) {
                        $_SESSION['usernames'][] = $username;
                        $_SESSION['passwords'][] = $password;
                    }
                }
            ?>
        </script>
    </head>
    <body>
        <center>
            <h1>Simple Comment Section</h1>
            <p>
                <a href = "loginpage.php">Set User</a>
            </p>

            <p>
                <a>
                    <img src = "tacodog.jpg" width = "188" height = "240" alt = "Dog">
                </a>
            </p>

            <?php
                print("<p>Current User:  " .$_SESSION['savedUser'] . "</p>");
            ?>

            <form method="post">
            <textarea name="comment" rows="3" cols="30" style="resize:none" placeholder="Comment on this image."></textarea>
            <br>
            <input value="Comment" type="submit" class="button">
            </form>
            <br>

            <?php
            if (count($_SESSION['comments'])) {
                foreach($_SESSION['comments'] as $key=>$value)
                    print($value);          //print out all the comments stored in the comment array
            }
            ?>
        </center>
    </body>
</html>