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

    <div class="main-json-page">

        <?php
            $json = file_get_contents('clasament.json');
            $json_data = json_decode($json, true);
            print_r($json);
            echo '<br><br>';
            print_r($json_data);
        ?>

    </div>

</body>
</html>