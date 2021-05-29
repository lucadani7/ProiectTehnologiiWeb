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

    <br><br>

    <main>
        <form action="login.php" method="GET" autocomplete="off">
            <label for="email">Email</label><br>
            <input type="text" id="email" name="email"><br>
            <label for="password">Password</label><br>
            <input type="password" id="password" name="password"><br>
            <button type="submit" class="link-main" href="first-page.html">Submit</button>
        </form>
    </main>

    <?php 
        $error = "Cont sau parola incorecte";
    ?>

</body>
</html>