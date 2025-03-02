<!DOCTYPE html>
<html lang="en-US">
	<head>
        <meta charset="UTF-8">
        <title>Results.</title>
	</head>
    <body>
        <?php 
            $password = $_POST["password"]; 
            if(strlen($password) <8) { 
                print("<p>Your password isn't long enough!</p>"); 
            } 
            if($password == ""){ 
                print("<p>You need to enter a password!</p>"); 
            }
        ?>

        <?php 
            $scale = $_POST["ScaleToOneTen"];  
            if(($scale) >100) { 
                print("<p>More than 100! Alright!</p>"); 
            } 
            if(($scale) >1000) { 
                print("<p>Way more than 100, I love it.</p>"); 
            } 
        ?>


        <h2>Results are in.</h2> 
        <?php 
            $name = $_POST["Name"];
            $email = $_POST["Email"];
            $username = $_POST["Username"];
            print("<p>Your name is $name and your email is $email. Your username is $username, thank you so much.</p>");
        ?>
    </body>
</html>
