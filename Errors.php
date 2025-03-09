<?php
    include 'dbconfig_Proj_1.php';
    $Name = $_POST["Name"];
    $Age = $_POST["Age"];
    $Email = $_POST["Email"];
    
    $db = connectDB();
    $db->query("INSERT INTO BringbackHSR (Name, Age, Email) VALUES ('$Name','$Age','$Email');");
    
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    
    if(password_verify($_POST["pwd-name"], "$2y$10\$l73hyb4LYd8FhIoIMS/NaeqvA9NB//Bw4wyclHmk2Pz2KRzTcM43y"))
    {
        //continue to validate/sanitize 
    } else{ 
        // do nothing, display error 
    }
?>
