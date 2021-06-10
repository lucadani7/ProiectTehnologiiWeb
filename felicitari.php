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

    <div class="felicitari-main">

        <?php
            echo '<p class="felicitari-text">Felicitari ai terminat exercitiul ' . $_GET['nume'];
            echo  ' si ai ars ' . $_GET['calorii'] . ' calorii!';
            echo '<br> Continua tot asa!</p>';

            $_SESSION['calorii'] = $_SESSION['calorii'] + $_GET['calorii'];
            $_SESSION['exercitii'] = $_SESSION['exercitii'] + 1;
            $_SESSION['nume_exercitiu'] = $_GET['nume'];
        ?>

        <a href="first-page.php" class="submit">Back</a>

    </div>

</body>
</html>