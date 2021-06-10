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

    <div class="generate-main">

        <?php
            if($_SERVER["REQUEST_METHOD"] == "POST"){

                $fileName = $_POST['grMuschi'] . ".json";
                $locatie = $_POST['locatie'];
                $json = file_get_contents($fileName);
                $json_data = json_decode($json, true);

                if($locatie == "acasa" || $locatie == "aerLiber"){
                    foreach($json_data as $element){
                        if($element['tip'] == "acasa"){
                            echo'<p class="nume">' . $element['nume'] . '</p>';
                            echo'<p class="descriere">' . 'Repetari: ' . $element['repetari'] . '</p>';
                            echo'<p class="descriere">' . $element['descriere'] . '</p>';
                            echo'<img class="imagine-generata" src="' . $element['imagine'] . '" alt="Imagine..."><br>';
                            echo'<a href="felicitari.php?nume=' . $element['nume'] . '&calorii=' . 
                                $element['calorii'] .'" class="submit">Finish</a>';
                        }
                    }
                }
                else{
                    foreach($json_data as $element){
                        echo'<p class="nume">' . $element['nume'] . '</p>';
                        echo'<p class="descriere">' . 'Repetari: ' . $element['repetari'] . '</p>';
                        echo'<p class="descriere">' . $element['descriere'] . '</p>';
                        echo'<img class="imagine-generata" src="' . $element['imagine'] . '" alt="Imagine..."><br>';
                        echo'<a href="felicitari.php?nume=' . $element['nume'] . '&calorii=' . 
                            $element['calorii'] .'" class="submit">Finish</a>';
                    }
                }
            }

        ?>

    </div>

</body>
</html>