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

        <?php
            echo '<p class="user">' . $_SESSION['nume'] . ' ' . $_SESSION['prenume'] . ' ai urmatoarele statistici:<br>';
            echo 'Calorii arse: ' . $_SESSION['calorii'] . '<br>';
            echo 'Antrenamente: ' . $_SESSION['exercitii'] . '</p>';

            $conn = mysqli_connect('localhost', 'gabi', '12345', 'users');
            if(!$conn){
                die('error: ' . mysqli_connect_error());
            }
            else{
                $exercitii = mysqli_real_escape_string($conn, $_SESSION['exercitii']);
                $calorii = mysqli_real_escape_string($conn, $_SESSION['calorii']);
                $email = mysqli_real_escape_string($conn, $_SESSION['email']);

                $sql = "UPDATE utilizatori SET calorii = '$calorii', exercitii = '$exercitii' WHERE email = '$email'";
                if(mysqli_query($conn, $sql)){
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
                $sql = 'SELECT nume, prenume, calorii, exercitii FROM utilizatori ORDER BY calorii DESC LIMIT 10';
                $result = mysqli_query($conn, $sql);
                $users = mysqli_fetch_all($result, MYSQLI_ASSOC);
                mysqli_free_result($result);
                mysqli_close($conn);
                foreach($users as $user){
                    echo '<tr><td>' . $user['nume'] . ' ' . $user['prenume'] . '</td>';
                    echo '<td>' . $user['calorii'] . ' </td>';
                    echo '<td>' . $user['exercitii'] . '</td></tr>';
                }
            ?>
        </table>
    </div>


</body>
</html>