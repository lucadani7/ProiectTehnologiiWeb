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
    </div>

    <div class="clasament">
        <table class="tabel-clasament">
            <tr>
              <th>Nume</th>
              <th>Scor</th>
              <th>Nr exercitii</th>
            </tr>
            <tr>
              <td>Alfreds Futterkiste</td>
              <td>123</td>
              <td>12</td>
            </tr>
            <tr>
              <td>Berglunds snabbköp</td>
              <td>1244</td>
              <td>123</td>
            </tr>
            <tr>
              <td>Centro Moctezuma</td>
              <td>12414</td>
              <td>123</td>
            </tr>
            <tr>
              <td>Ernst Handel</td>
              <td>3333</td>
              <td>123</td>
            </tr>
            <tr>
              <td>Island Trading</td>
              <td>33333</td>
              <td>123</td>
            </tr>
            <tr>
              <td>Königlich Essen</td>
              <td>33333</td>
              <td>123</td>
            </tr>
            <tr>
              <td>Laughing Winecellars</td>
              <td>33333</td>
              <td>123</td>
            </tr>
            <tr>
              <td>Magazzini Riuniti</td>
              <td>123213</td>
              <td>123</td>
            </tr>
            <tr>
              <td>North/South</td>
              <td>12312</td>
              <td>123</td>
            </tr>
            <tr>
              <td>Paris spécialités</td>
              <td>1212</td>
              <td>123</td>
            </tr>
          </table>

    </div>


</body>
</html>