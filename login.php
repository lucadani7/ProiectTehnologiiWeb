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
    </div>

    <?php //trebuie verificat daca exista in baza de date
        $emailBun = "123@gmail.com";
        $parola = "123";
        if(isset($_POST['password']) && isset($_POST['email'])){
            if($emailBun == $_POST['email'] && $parola == $_POST['password']){
                header('Location: first-page.html');
            }
            else{
                echo '<script>window.alert("Email sau parola incorecte")</script>';
            }
        }
    ?>

</body>
</html>