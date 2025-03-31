<!DOCTYPE html>
<html lang="en-US">
	<head>
        <meta charset="UTF-8">
        <title>Results.</title>
	</head>
    <body>

        <?php
            include ('Errors.php');
            $hashed_pass = '$2y$10\$l73hyb4LYd8FhIoIMS/NaeqvA9NB//Bw4wyclHmk2Pz2KRzTcM43y';
            require ('dbconfig_Proj_1.php');
            $db = connectDB();

            /**
             * Validating will return as empty if no errors occurred; if not, the following errors will accure.
             */

            function validate(){
                #All the password stuff!
                global $hashed_pass;
                if(!password_verify($_POST["Password"], $hashed_pass)){
                    return "Incorrect Password.";
                }
                $password = $_POST["Password"]; 
                if(strlen($password) <8) { 
                    return "Your password isn't long enough! It must be at least 8 characters."; 
                } 
                elseif (strlen($password) >100) { 
                    return "You're not going to remember that, I promise you. Best change it."; 
                }
                elseif ($password == ""){ 
                    return "You need to enter a password!"; 
                } 
                elseif (!preg_match('/[!@#$%^&*(),.?":{}|<>]/', $password)) {
                    return "Please have at least one number in your password!";
                }
                if (!preg_match('/0-9/', $password)) {
                    return "";
                } else {
                    return "Please have at least one number in your password!";
                }

                #Is everything filled in? No?
                if(($_POST["Name"] == NULL) or ($_POST["Birthdate"] == NULL) or ($_POST["gender"] == "") or ($_POST["Username"] == NULL) or ($_POST["Email"] == NULL) or ($_POST["Password"] == NULL) or ($_POST["ScaleToOneTen"] == NULL) or ($_POST["Experience"] == NULL) or ($_POST["tough"] == NULL)){
                    return "You have not filled in all questions. Fill in everything, including the funny.";
                }
                #Let's make it all make sense!
                # Age
                if(strlen($_POST["Birthdate"]) >150){
                    return "You are either lying to me, or you're in the future where people get to live extremely old and still be able to press buttons and or make any type of movement."; 
                }
                
                # Gender
                if(strlen($_POST["gender"]) != 2){
                    return "Please select your prefered gender.";
                }

                #Email
                if(!filter_var($_POST["Email"], FILTER_VALIDATE_EMAIL)){
                    return "Please give a valid email.";
                }

                # Scale
                $scale = $_POST["ScaleToOneTen"];  
                if(strlen($scale) >100) { 
                    return "More than 100! Alright!"; 
                } 
                if(strlen($scale) >1000) { 
                    return "Way more than 100, I love it."; 
                } 
                if(strlen($scale) <0) { 
                    return "You're no fun, you know that?"; 
                } 

                #Experience
                if(strlen($_POST["Experience"]) <10){
                    return "Please, at least try. For me?"; 
                }

                # Silly Question
                if(strlen($_POST["tough"]) != 2){
                    return "You are banned from The Salty Spitoon.";
                }
            }

            /**
             * Sanitization changes the data entered by the user. You should ALWAYS sanitize your data to prevent a hacking method and a song I like from Ghost Data
             * DDOS (attacks)
             */

            function sanitize(){
                $name = htmlentities($_POST["Name"]);
                $age = (int)$_POST["Age"];
                $gender = htmlentities($_POST["gender"]);
                $email = filter_var($_POST["Email"], FILTER_VALIDATE_EMAIL);
                $scale = (int)$_POST["ScaleToOneTen"];
                $experience = htmlentities($_POST["Experience"]);
                $salty = htmlentities($_POST["tough"]);
            
                return array($name, $age, $gender, $email, $scale, $experience, $salty);
            }
        
            /**
             * Add_Data adds sanitized data into SQL safely, something I forgot exists
             */
            function add_data(){
                global $db;
                $prep_insert = $db->prepare("INSERT INTO BringBackHSRC (Name, Age, Gender, Email, Scale, Experience, Salty) VALUES (?, ?, ?, ?, ?, ?, ?);")
                $prep_insert->execute(sanitize());
            }

            if(validate()==""){
                print("<div>Thank you so much for your submission.</div>");
                print("<div><a href='data_Proj_1.php'>View data page here</a></div>");
                add_data();
            } else{
                print("<div>We were unable to take your submission at this time.</div>");
                print(validate());
                print("<div><a href='Project_One_Pt1.php'>Try submitting again here</a></div>");
            }
        ?>
    </body>
</html>
