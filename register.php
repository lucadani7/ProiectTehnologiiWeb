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
        <p>Workout Generator</p>
    </header>

    <div class="main-register">
        <form action="register.php" method="POST" autocomplete="off">
            <label for="fname">First Name</label><br>
            <input type="text" id="fname" name="fname" required><br>
            <label for="lname">Last Name</label><br>
            <input type="text" id="lname" name="lname" required><br>
            <label for="email">Email</label><br>
            <input type="text" id="email" name="email" required><br>
            <label for="bdate">Birth date</label><br>
            <input type="date" id="bdate" name="bdate" min="1950-01-01" max="2009-12-31" required><br>
            <input type="radio" id="male" name="gender" value="male" required>
            <label class="gen" for="male">Male</label><br>
            <input type="radio" id="female" name="gender" value="female" required>
            <label class="gen" for="female">Female</label><br>
            <label for="password">Password</label><br>
            <input type="password" id="password" name="password" required><br>
            <label for="password">Confirm Password</label><br>
            <input type="password" id="password" name="password2" required><br>
            <button type="submit" class="submit"><span>Register</span></button>
        </form>
    </div>

    <?php
        $errorMail = null;
        $email = null;
        $password = null;
        $password2 = null;
        $errorPassword = null;
        if(isset($_POST['email'])){
            $email = test_input($_POST['email']);
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errorMail = "Invalid email invalid";
        }
        if(isset($_POST['password'])){
            $password = test_input($_POST['password']);
        }
        if(isset($_POST['password2'])){
            $password2 = test_input($_POST['password2']);
        }
        if($password != $password2){
            $errorPassword = "Confirm password";
        }

        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        if($errorMail != null && isset($_POST['email'])){
            echo '<script>window.alert("Introduceti un mail corect!")</script>';
        }
        if($errorPassword != null && isset($_POST['password']) && isset($_POST['password2'])){
            echo '<script>window.alert("Confirmati parola!")</script>';
        }
        if($errorMail == null && $errorPassword == null){
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $email = $_POST['email'];
            $bdate = $_POST['bdate'];
            $gender = $_POST['gender'];
            $password = $_POST['password'];
            //trebuie puse in baza de date
            header('Location: index.html');
        }

    ?>

</body>
</html>