<!DOCTYPE html>
<html lang="en-US">
    <head>
        <title>PHP Questions: Data</title>
    </head>
    <body>
        <?php
            require ('dbconfig_Proj_1.php');
            $db = connectDB();

            /**
             * Gathers gender data and puts it in a format to display well on the data page
             */
            function gender_data(){
                global $db;
                $prep_selectgen = $db->prepare("SELECT gender FROM BringBackHSRC");
                $prep_selectgen->execute();
                $gender_data = $prep_selectgen->fetchAll();
                $gender_array["Male"] = 0;
                $gender_array["Female"] = 0;
                $gender_array["Nonbinary"] = 0;
                $gender_array["Genderfluid"] = 0;
                $gender_array["Agender"] = 0;
                $gender_array["Choose Not to Say/Other"] = 0;
                for($i=0;$i<count($gender_data);$i++){
                    switch($gender_data[$i]["gender"][0]){
                        case "m":
                            $gender_array["Male"]++;
                            break;
                        case "f":
                            $gender_array["Female"]++;
                            break;
                        case "n":
                            $gender_array["Nonbinary"]++;
                            break;
                        case "g":
                            $gender_array["Genderfluid"]++;
                            break;
                        case "a":
                            $gender_array["Agender"]++;
                            break;
                        default:
                            $gender_array["Choose Not to Say/Other"]++;
                            break;
                    }
                }
                return $gender_array;
            }

            /**
             * pretty_display makes the data display nicely for users
             */
            function pretty_display($data_array){
                print("<div>");
                foreach($data_array as $key => $value){
                    print("<div>$key: $value</div>");
                }
                print("</div>");
            }

            
            /**
             * Gathers tough data and puts it in a format to display well on the data page
             */
            function tough_data(){
                global $db;
                $prep_selectgen = $db->prepare("SELECT tough FROM BringBackHSRC");
                $prep_selectgen->execute();
                $tough_data = $prep_selectgen->fetchAll();
                $tough_array["1, I'm Spongebob!"] = 0;
                $tough_array["2, I flinch at the slightest movement"] = 0;
                $tough_array["3, I'm kinda tough."] = 0;
                $tough_array["4, I'm pretty tough, you know?"] = 0;
                $tough_array["5, I'm in the middle."] = 0;
                $tough_array["6, I'm up there!"] = 0;
                $tough_array["7, Tough like Patrick. (The dude is a genius you can't tell me otherwise.)"] = 0;
                $tough_array["8, I'm very tough!"] = 0;
                $tough_array["9, Toughest person around!"] = 0;
                $tough_array["10, I ate a bowl full of nails for breakfast. Without any milk!"] = 0;
                for($i=0;$i<count($tough_data);$i++){
                    switch($tough_data[$i]["tough"][0]){
                        case "2":
                            $tough_array["2, I flinch at the slightest movement"]++;
                            break;
                        case "3":
                            $tough_array["3, I'm kinda tough."]++;
                            break;
                        case "4":
                            $tough_array["4, I'm pretty tough, you know?"]++;
                            break;
                        case "5":
                            $tough_array["5, I'm in the mi"]++;
                            break;
                        case "6":
                            $tough_array["6, I'm up there!"]++;
                            break;
                        case "7":
                            $tough_array["7, Tough like Patrick. (The dude is a genius you can't tell me otherwise.)"]++;
                            break;
                        case "8":
                            $tough_array["8, I'm very tough!"]++;
                            break;
                        case "9":
                            $tough_array["9, Toughest person around!"]++;
                            break;
                        case "10":
                            $tough_array["10, I ate a bowl full of nails for breakfast. Without any milk!"]++;
                            break;
                        default:
                            $tough_array["1, I'm Spongebob!"]++;
                            break;
                    }
                }
                return $tough_array;
            }

            print("<h1>Results are in...</h1>");

            $prep_selectnum = $db->prepare("SELECT count(email) FROM BringBackHSRC");
            $prep_selectnum->execute();
            $num_data = $prep_selectnum->fetchAll();
            $num = $num_data[0][0];

            print("<h2>Gender Data:</h2>");
            pretty_display(gender_data());
            print("</div>");
            print("<h2>Salty Spitoon Data:</h2>");
            pretty_display(tough_data());
            print("</div>");
        ?>
    </body>
</html>
