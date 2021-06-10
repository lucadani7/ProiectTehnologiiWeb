<?php
    session_start();
?>

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

    <div class="main-login">
        <form action="login.php" method="POST" autocomplete="off">
            <label for="email">Email</label><br>
            <input type="text" id="email" name="email" required><br>
            <label for="password">Password</label><br>
            <input type="password" id="password" name="password" required><br>
            <button type="submit" class="submit"><span>Login</span></button>
        </form>

        <?php
            if(isset($_POST['email']) && isset($_POST['password'])){
                $conn = mysqli_connect('localhost', 'gabi', '12345', 'users');
                if(!$conn){
                    die('error: ' . mysqli_connect_error());
                }
                $sql = 'SELECT id, nume, prenume, email, calorii, exercitii FROM utilizatori WHERE email = "' . $_POST['email'] . '" AND parola = "' . $_POST['password'] . '"';
                $result = mysqli_query($conn, $sql);
                $users = mysqli_fetch_all($result, MYSQLI_ASSOC);
                mysqli_free_result($result);
                mysqli_close($conn);
                if($users == null){
                    echo '<p class="eroare">Email sau parola incorecte!</p>';
                }
                else{
                    $_SESSION['id'] = $users[0]['id'];
                    $_SESSION['nume'] = $users[0]['nume'];
                    $_SESSION['prenume'] = $users[0]['prenume'];
                    $_SESSION['email'] = $users[0]['email'];
                    $_SESSION['calorii'] = $users[0]['calorii'];
                    $_SESSION['exercitii'] = $users[0]['exercitii'];
                    header('Location: incalzire.php');
                }
            }
        ?>

    </div>

</body>
</html>