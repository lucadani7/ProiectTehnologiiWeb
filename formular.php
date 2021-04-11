<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Formular de inregistrare pentru abonament la sala</h1>
        <form action="signup.php" method="POST">
        <label for="fname">Nume</label>
        <input type="text" id="fname" name="nume" placeholder="Nume"><br><br>
        <label for="lname">Prenume</label>
        <input type="text" id="lname" name="prenume" placeholder="Prenume"><br><br>
        <label for="bdate">Data nasterii</label>
        <input type="date" id="bdate" name="data_nasterii" min="1950-01-01" max="2010-01-01"><br><br>
        <label for="gen">Genul</label>
        <select id="gen" name="gen" placeholder="Selecteaza genul">
            <option value="barbat">Barbat</option><br><br>
            <option value="femeie">Femeie</option><br><br>
        </select>
        <br><br>
        <label for="greutate">Greutate (in kg)</label>
        <input type="number" id="greutate" placeholder="Tasteaza o valoare"><br><br>
        <label for="inaltime">Inaltime (in cm)</label>
        <input type="number" id="inaltime" placeholder="Tasteaza o valoare"><br><br>
        <label for="email">Email</label>
        <input type="text" id="email" name="email" placeholder="Adresa de e-mail"><br><br>
        <label for="parola">Parola</label>
        <input type="password" id="parola" name="parola" placeholder="Tasteaza parola"><br><br>
        <input type="submit" value="Submit">
        </form>
        <?php
        // put your code here
        ?>
    </body>
</html>
