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
             * Gathers age data and puts it in a format to display well on the data page
             */
            function age_data(){
                global $db;
                $age_selectage = $db->prepare("SELECT Age FROM BringBackHSR");
                $age_selectage->execute();
                $age_data = $age_selectage->fetchAll();
                $age_responce = 0;
                for($i=0;$i<count($age_data);$i++){
                    $age_responce += $age_data[$i]["Age"];
                }
                return $age_responce / count($age_data);
            }


            /**
             * Gathers gender data and puts it in a format to display well on the data page
             */
            function gender_data(){
                global $db;
                $prep_selectgen = $db->prepare("SELECT Gender FROM BringBackHSR");
                $prep_selectgen->execute();
                $gender_data = $prep_selectgen->fetchAll();
                $gender_array["Male"] = 0;
                $gender_array["Female"] = 0;
                $gender_array["Nonbinary"] = 0;
                $gender_array["Genderfluid"] = 0;
                $gender_array["Agender"] = 0;
                $gender_array["Choose Not to Say/Other"] = 0;
                for($i=0;$i<count($gender_data);$i++){
                    switch($gender_data[$i]["Gender"][0]){
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
             * Gathers scale data and puts it in a format to display well on the data page
             */
            function scale_data(){
                global $db;
                $scale_select = $db->prepare("SELECT Scale FROM BringBackHSR");
                $scale_select->execute();
                $scale_data = $scale_select->fetchAll();
                $scale_responce = 0;
                for($i=0;$i<count($scale_data);$i++){
                    $scale_responce += $scale_data[$i]["Scale"];
                }
                return $scale_responce / count($scale_data);
            }

            /**
             * Gathers experience data and puts it in a format to display well on the data page
             */
            function exp_data(){
                global $db;
                $prep_selectfav = $db->prepare("SELECT Experience FROM BringBackHSR ORDER BY RAND() LIMIT 3");
                $prep_selectfav->execute();
                $exp_data = $prep_selectfav->fetchAll();
                $exp_responce = [];
                for($i=0;$i<3;$i++){  # limit either by doing the limit 3 or only doing 3 loops!
                    $exp_responce []= htmlentities($exp_data[$i]["Experience"]);
                }
                return $exp_responce;
            }

            /**
             * Gathers tough data and puts it in a format to display well on the data page
             */
            function tough_data(){
                global $db;
                $prep_selecttou = $db->prepare("SELECT Salty FROM BringBackHSR");
                $prep_selecttou->execute();
                $tough_data = $prep_selecttou->fetchAll();
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
                #print ($tough_data[0]["Salty"]);
                for($i=0;$i<count($tough_data);$i++){
                    switch($tough_data[$i]["Salty"]){
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

            $prep_selectnum = $db->prepare("SELECT count(email) FROM BringBackHSR");
            $prep_selectnum->execute();
            $num_data = $prep_selectnum->fetchAll();
            $num = $num_data[0][0];

            print("<div>");
            print("<h2>Age Data:</h2>");
            print(age_data());
            print("</div>");

            print("<div>");
            print("<h2>Gender Data:</h2>");
            pretty_display(gender_data());
            print("</div>");

            print("<div>");
            print("<h2>Scale Data:</h2>");
            print(scale_data());
            print("</div>");

            print("<div>");
            print("<h2>Experience Data:</h2>");
            pretty_display(exp_data());
            print("</div>");

            print("<div>");
            print("<h2>Salty Spitoon Data:</h2>");
            pretty_display(tough_data());
            print("</div>");
        ?>
    </body>
</html>
