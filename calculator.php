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
        <p>Workout Generator<p>
    </header>

    <div id="mainCalculator">
        <label>Exemplu: 1 egg/100 gr rice/100gr cooked rice</label><br>
        <label for="ingr">Produs</label><br>
        <input type="text" id="ingr" name="ingr" required><br>
        <button type="button" onclick="myFunction()">Calculeaza</button>
    </div>

    <script src = "script.js"></script>

</body>
</html>