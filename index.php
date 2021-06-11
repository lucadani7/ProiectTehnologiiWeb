<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="alternate" type="application/rss+xml" href="http://localhost:3000/rss.xml" title="Workout Generator">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Workout Generator</title>
</head>
<body>
    <ul class="meniu">
        <li><a href="index.php">HOME</a></li>
        <li><a href="login.php">LOGIN</a></li>
        <li><a href="register.php">REGISTER</a></li>
    </ul>

    <main>

        <div class="div-img">
            <p>Generatorul tau de exercitii fizice!<br> Fii un campion!</p>            
        </div>

        <div class="div-text">
            <h1>Antreneaza-te de acasa gratis</h1><br>
            <p>Credem că fitnessul ar trebui să fie accesibil tuturor, 
                oriunde, indiferent de venituri sau acces la o sală de 
                sport. Cu antrenamente profesionale și articole informative, 
                veți avea tot ce aveți nevoie pentru a vă atinge obiectivele 
                personale.
            </p>
            <br><br>
            <a href="login.php">Incepe acum</a>
        </div>


        <div class="clasament-index">
        <table class="tabel-clasament-index">
            <tr>
              <th>Nume</th>
              <th>Scor</th>
              <th>Nr exercitii</th>
            </tr>
            <?php 
                $conn = mysqli_connect('localhost', 'gabi', '12345', 'users');
                if(!$conn){
                    die('error: ' . mysqli_connect_error());
                }
                else{
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
                }
            ?>
        </table>
            <a href="http://localhost:3000/rss.xml" class="pdf-json-rss-buton">RSS</a>
            <a href="pdf.php" class="pdf-json-rss-buton">PDF</a>
            <a href="json.php" class="pdf-json-rss-buton">JSON</a>
        
        </div>

    </main>

    <footer>
        <p>Workout Generator</p>
    </footer>

</body>
</html>