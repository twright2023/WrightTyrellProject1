<!DOCTYPE html>
<html>
    <head>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width-device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <title>Survey: Bring Back Hostess Sweet Rolls</title>
    </head>
    <body>
        <h1>Bring Back Hostess Sweet Rolls</h1>
        <h2>We all know that the discontinuation of Hostess Sweet Rolls (Especially cherry) was an injustice! Band together to get this Survey/Petition signed!</h2>

        <!-- TODO: Fix all bugs/poor practice in the form -->

        <form action="Project_One_Pt1_sub.php" method="get" class="survey">
            <div>
                <fieldset>
                    <div>
                        <legend>Information</legend>
                        <label for="name-input">Name: </label> <!--There was no name, you got a name now! So yay!-->
                        <input type="text" name="Name" id="name-input">
                    </div>

                    <div>
                        <label for="birthdate-here">Age: </label> <!--I noticed the radio buttons were silly. And I thought a nice date would be much better.-->
                        <input type="date" name="Birthdate" id="birthdate-here">
                    </div>

                    <div>
                        <legend>Gender</legend> <!--I thought this was fine.-->
                        <select name="gender" id="gender">
                            <option value="m" required>Male</option>
                            <option value="f">Female</option>
                            <option value="nb">Nonbinary</option>
                            <option value="gf">Genderfluid</option>
                            <option value="a">Agender</option>
                            <option value="o">Choose not to say/Other</option>
                        </select>
                    </div>

                    <div>
                        <label for="username-input">Username: </label> <!--I thought this was fine.-->
                        <input type="text" name="Username" id="username-input">
                    </div>

                    <div>
                        <label for="email-input"> Email: </label>
                        <input type="email" name="Email" id="email-input">
                    </div>

                    <div>
                        <label for="password-here">Password: </label> <!--You should ***NEVER*** have a password as text, that's dangerous.-->
                        <input type="password" name="Password" id="password-here">
                    </div>

                    <div>
                        <legend>Scale to 1-100, how much do you miss these treats?</legend> <!--This was my first extra question.-->
                        <input type="number" name="ScaleToOneTen" id="scale" required>
                    </div>

                    <div>
                        <legend>Share your experience</legend> <!--My second.-->
                        <textarea id="experience" required>Share your experience with Hostess Sweet Rolls.
                        </textarea>
                    </div>

                    <div>
                        <legend>Random, silly question:</legend> <!--And this was made so I could have some fun and hopefully make someone smile.-->
                        <p>Welcome to The Salty Spitoon. On a scale of 1-10, how tough are ya?</p>
                        <select name="tough" id="tough"> <!--This is just something silly I wanted to do-->
                            <option value="1" required>1, I'm Spongebob!</option>
                            <option value="2">2, I flinch at the slightest movement</option>
                            <option value="3">3, I'm kinda tough.</option>
                            <option value="4">4, I'm pretty tough, you know?</option>
                            <option value="5">5, I'm in the middle.</option>
                            <option value="6">6, I'm up there!</option>
                            <option value="7">7, Tough like Patrick. (The dude is a genius you can't tell me otherwise.)</option>
                            <option value="8">8, I'm very tough!</option>
                            <option value="9">9, Toughest person around!</option>
                            <option value="10">10, I ate a bowl full of nails for breakfast. Without any milk!</option>
                        </select>
                    </div>
                </fieldset>
            </div>
            <button type="submit" name="button2" id = "button2" class="btn btn-primary">Submit!</button>
            <div class="topnav">
                Link to Project 1 and Commenting Etiqutte in Github:
                <a class="btn btn-primary" href="https://github.com/twright2023/WrightTyrellProject1.git" role="button">GitHub</a>
            </div>
        </form>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    </body>
</html>