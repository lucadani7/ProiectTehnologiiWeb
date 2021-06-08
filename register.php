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
                <label for="fname">First Name</label>
                <input type="text" id="fname" name="fname" required><br><br>
                <label for="lname">Last Name</label>
                <input type="text" id="lname" name="lname" required><br><br>
                <label for="email">Email</label>
                <input type="text" id="email" name="email" required><br><br>
                <label for="bdate">Birth date</label>
                <input type="date" id="bdate" name="bdate" min="1950-01-01" max="2009-12-31" required><br><br>
                <label for="gender">Choose your gender:</label>
                <select name="gender" id="gender">
                    <optgroup label="Your gender">
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                </select><br><br>
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required><br><br>
                <label for="password">Confirm Password</label>
                <input type="password" id="password" name="password2" required><br><br>
                <label for="calories">Number of burnt calories:</label>
                <input type="number" id="number" name="number" required><br><br>
                <label for="exercices">Number of exercices:</label>
                <input type="number" id="number" name="number" required><br><br>
                <button type="submit" class="submit"><span>Register</span></button><br>
            </form>
        </div>

        <?php
        require_once 'signup.php';
        $errorMail = null;
        $email = null;
        $password = null;
        $password2 = null;
        $errorPassword = null;
        $calories = null;
        $exercices = null;
        if (isset($_POST['email'])) {
            $email = test_input($_POST['email']);
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errorMail = "Invalid email invalid";
        }
        if (isset($_POST['password'])) {
            $password = test_input($_POST['password']);
        }
        if (isset($_POST['password2'])) {
            $password2 = test_input($_POST['password2']);
        }
        if ($password != $password2) {
            $errorPassword = "Confirm password";
        }

        function test_input($data) {
            return htmlspecialchars(stripslashes(trim($data)));
        }

        if ($errorMail != null && isset($_POST['email'])) {
            echo '<script>window.alert("Introduceti un mail corect!")</script>';
        }
        if ($errorPassword != null && isset($_POST['password']) && isset($_POST['password2'])) {
            echo '<script>window.alert("Confirmati parola!")</script>';
        }
        if (!$calories) {
            echo '<script>window.alert("Introduceti un numar!")</script>';
        }

        if (!$exercices) {
            echo '<script>window.alert("Introduceti un numar!")</script>';
        }

        if ($errorMail == null && $errorPassword == null) {
            $fname = (string) filter_input(INPUT_POST, 'fname');
            $lname = (string) filter_input(INPUT_POST, 'lname');
            $email = (string) filter_input(INPUT_POST, 'email');
            $bdate = filter_input(INPUT_POST, 'bdate');
            $gender = (string) filter_input(INPUT_POST, 'gender');
            $password = (string) filter_input(INPUT_POST, 'password');
            $calories = filter_input(INPUT_POST, 'calories');
            $exercices = filter_input(INPUT_POST, 'exercices');
            header('Location: index.php');
        }
        ?>

    </body>
</html
