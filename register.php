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
            <label for="lname">Nume </label><br>
            <input type="text" id="lname" name="lname" required><br>
            <label for="fname">Prenume </label><br>
            <input type="text" id="fname" name="fname" required><br>
            <label for="email">Email</label><br>
            <input type="text" id="email" name="email" required><br>
            <input type="radio" id="male" name="gender" value="barbat" required>
            <label class="gen" for="male">Barbat</label><br>
            <input type="radio" id="female" name="gender" value="femeie" required>
            <label class="gen" for="female">Femaie</label><br>
            <label for="password">Parola</label><br>
            <input type="password" id="password" name="password" required><br>
            <label for="password">Confirma parola</label><br>
            <input type="password" id="password" name="password2" required><br>
            <button type="submit" class="submit"><span>Register</span></button>
        </form>
    

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
            echo '<p class="eroare">Introduceti in email corect!</p>';
        }
        if($errorPassword != null && isset($_POST['password']) && isset($_POST['password2'])){
            echo '<p class="eroare">Confirmati parola!</p>';
        }
        if($errorMail == null && $errorPassword == null){

            $conn = mysqli_connect('localhost', 'gabi', '12345', 'users');
            if(!$conn){
                die('error: ' . mysqli_connect_error());
            }

            $sql = 'SELECT nume FROM utilizatori WHERE email = "' . $email . '"';    
            $result = mysqli_query($conn, $sql);
            $users = mysqli_fetch_all($result, MYSQLI_ASSOC);
            mysqli_free_result($result);
            if($users == null){

                $prenume = mysqli_real_escape_string($conn, $_POST['fname']);
                $nume = mysqli_real_escape_string($conn, $_POST['lname']);
                $email = mysqli_real_escape_string($conn, $_POST['email']);
                $gender = mysqli_real_escape_string($conn, $_POST['gender']);
                $password = mysqli_real_escape_string($conn, $_POST['password']);

                $sql = "INSERT INTO utilizatori(nume, prenume, email, parola, gen) VALUES('$nume', '$prenume', '$email', '$password', '$gender')";
                if(mysqli_query($conn, $sql)){
                    mysqli_close($conn);
                    header('Location: index.php');
                }
                else{
                    echo '<p class="eroare">Eraore la introducera in baza date!</p>';
                    mysqli_close($conn);
                }
            }
            else{
                echo '<p class="eroare">Exista un cont cu acest email!</p>';
            }
        }
    ?>
    </div>

</body>
</html>