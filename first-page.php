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

    <div class="first-page-main">
        <form action="generare.php" method="POST" autocomplete="off">
            <label for="greutate">Greutate(kg)</label>
            <input type="number" name="greutate" value="70" min="30" max="200" required><br><br>
            <label for="inaltime">Inaltime(cm)</label>
            <input type="number" name="inaltime" value="170" min="140" max="220" required><br><br>
            <label for="grMuschi">Grupe de muschi</label>
            <select id="grMuschi" name="grMuschi">
                <option value="abdomen">Abdomen</option>
                <option value="antebrat">Antebrat</option>
                <option value="biceps">Biceps</option>
                <option value="coapse">Coapse</option>
                <option value="piept">Piept</option>
                <option value="spate">Spate</option>
                <option value="triceps">Triceps</option>
            </select><br><br>
            <label for="locatie">Locatia</label>
            <select id="locatie" name="locatie">
                <option value="acasa">Acasa</option>
                <option value="aerLiber">Aer liber</option>
                <option value="sala">Sala</option>
            </select><br><br><br>
            <button type="submit" class="submit"><span>Generare</span></button>
        </form>

        <?php //statistici
            echo '<p class="user">' . $_SESSION['nume'] . ' ' . $_SESSION['prenume'] . ' ai urmatoarele statistici:<br>';
            echo 'Calorii arse: ' . $_SESSION['calorii'] . '<br>';
            echo 'Antrenamente: ' . $_SESSION['exercitii'] . '<br>';
            echo 'Exercitiul preferat: ';
            $conn = mysqli_connect('localhost', 'gabi', '12345', 'users');
            if(!$conn){
                die('error: ' . mysqli_connect_error());
            }
            else{

                $sql = 'SELECT exercitiu FROM antrenamente WHERE id_user = "' . $_SESSION['id'] .'" ORDER BY numar DESC LIMIT 1';
                $result = mysqli_query($conn, $sql);
                $exercitiuPreferat = mysqli_fetch_all($result, MYSQLI_ASSOC);
                mysqli_free_result($result);
                if($exercitiuPreferat != null){
                    echo $exercitiuPreferat[0]['exercitiu'] .'</p>';
                }

                $exercitii = mysqli_real_escape_string($conn, $_SESSION['exercitii']);
                $calorii = mysqli_real_escape_string($conn, $_SESSION['calorii']);
                $email = mysqli_real_escape_string($conn, $_SESSION['email']);

                $sql = "UPDATE utilizatori SET calorii = '$calorii', exercitii = '$exercitii' WHERE email = '$email'";
                if(mysqli_query($conn, $sql)){
                    if(isset($_SESSION['nume_exercitiu'])){
                        $sql = 'SELECT id, numar FROM antrenamente WHERE id_user = "' . $_SESSION['id'] . '" AND exercitiu = "' . $_SESSION['nume_exercitiu'] . '"';
                        $result = mysqli_query($conn, $sql);
                        $id_numar = mysqli_fetch_all($result, MYSQLI_ASSOC);
                        mysqli_free_result($result);
                        $idUser = mysqli_real_escape_string($conn, $_SESSION['id']);
                        $exercitiu = mysqli_real_escape_string($conn, $_SESSION['nume_exercitiu']);
                        if($id_numar == null){
                            //insert exercitiu nou
                            $sql = "INSERT INTO antrenamente(id_user, exercitiu, numar) VALUES('$idUser', '$exercitiu', '1')";
                            mysqli_query($conn, $sql);
                        }
                        else
                        {
                            //update exercitiu existent
                            $numar = mysqli_real_escape_string($conn, $id_numar[0]['numar'] + 1);
                            $sql = "UPDATE antrenamente SET numar = '$numar' WHERE id_user = '$idUser' AND exercitiu = '$exercitiu'";
                            mysqli_query($conn, $sql);
                        }
                    }
                }
                else{
                    echo '<p class="eroare">Eroare la actualizarea bazei de date! '. mysqli_error($conn) . '</p>';
                    mysqli_close($conn);
                }
            }
        ?>

    </div>

    <div class="clasament">
        <table class="tabel-clasament">
            <tr>
              <th>Nume</th>
              <th>Scor</th>
              <th>Nr exercitii</th>
            </tr>
            <?php
                $index = 0;
                $sql = 'SELECT nume, prenume, calorii, exercitii FROM utilizatori ORDER BY calorii DESC LIMIT 10';
                $result = mysqli_query($conn, $sql);
                $users = mysqli_fetch_all($result, MYSQLI_ASSOC);
                mysqli_free_result($result);
                mysqli_close($conn);
                foreach($users as $user){
                    echo '<tr><td>' . $user['nume'] . ' ' . $user['prenume'] . '</td>';
                    echo '<td>' . $user['calorii'] . ' </td>';
                    echo '<td>' . $user['exercitii'] . '</td></tr>';
                    $data = array('nume'=> $user['nume'] . ' ' . $user['prenume'], 'calorii' => $user['calorii'], 'exercitii'=> $user['exercitii']);
                    $json[$index] = $data;
                    $index = $index + 1;
                }
                $arr = json_encode($json);
                file_put_contents("clasament.json", $arr);
            ?>
        </table>
        <a href="pdf.php" class="pdf-json-buton">PDF</a>
        <a href="json.php" class="pdf-json-buton">JSON</a>
    </div>

    <footer><a href="Calculator.php">Calculeaza-ti caloriile din alimente</a></footer>

</body>
</html>