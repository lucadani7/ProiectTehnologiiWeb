<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Workout Generator</title>
</head>
<body>
    <header>
        <h1>Workout Generator</h1>
    </header>

    <main>
        <a class="back-button" href="index.html" title="Home page">
            <img class="back" src="https://miro.medium.com/max/1460/1*xDGtplbrOnaKC1ov7t23kA.png">
        </a>
        <br>
        <form action="register.php" method="POST" autocomplete="off">
            <label for="fname">First Name</label><br>
            <input type="text" id="fname" name="fname"><br>
            <label for="lname">Last Name</label><br>
            <input type="text" id="lname" name="lname"><br>
            <label for="email">Email</label><br>
            <input type="text" id="email" name="email"><br>
            <label for="bdate">Birth date</label><br>
            <input type="date" id="bdate" name="bdate" min="1950-01-01" max="2009-12-31"><br>
            <input type="radio" id="male" name="gender" value="male">
            <label class="gen" for="male">Male</label><br>
            <input type="radio" id="female" name="gender" value="female">
            <label class="gen" for="female">Female</label><br>
            <label for="password">Password</label><br>
            <input type="password" id="password" name="password"><br>
            <label for="password">Confirm Password</label><br>
            <input type="password" id="password" name="password2"><br>
            <button type="submit" class="link-main" href="register.php">Register</button>
        </form>
    </main>

    <?php
        $error = "Completati campurile: ";
        if(empty($_POST["fname"])){
            $error = $error . "First name ";
        }
        if(empty($_POST["lname"])){
            $error = $error . "Last name ";
        }
        if(empty($_POST["email"])){
            $error = $error . "Email ";
        }
        else{
            $errorMail = null;
            $email = test_input($_POST["email"]);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errorMail = "Invalid email format";
            }
        }
        if(empty($_POST["bdate"])){
            $error = $error . "Birth day ";
        }
        if(empty($_POST["gender"])){
            $error = $error . "Gender ";
        }
        if(empty($_POST["password"])){
            $error = $error . "Password ";
        }
        else{
            $errorPassword = null;
            $password = $_POST["password"];
            $password2 = $_POST["password2"];
            if($password != $password2){
                $errorPassword = "Confirm password";
            }
        }

        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        if($error != "Completati campurile: "){
            echo "<p class='errorRegisterForm'>" . $error . "</p><br>";
        }
        else{
            if($errorMail != null){
                echo "<p class='errorRegisterForm'>" . $errorMail . "</p><br>";
            }
            if($errorPassword != null){
                echo "<p class='errorRegisterForm'>" . $errorPassword . "</p><br>";
            }
            if($errorMail == null && $errorPassword == null){
                echo '<script>window.alert("Contul a fost creat")</script>';
                $fname = $_POST["fname"];
                $lname = $_POST["lname"];
                $email = $_POST["email"];
                $bdate = $_POST["bdate"];
                $gender = $_POST["gender"];
                $password = $_POST["password"];
                //trebuie puse in baza de date
            }
            
        }

    ?>

</body>
</html>