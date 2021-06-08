<?php

$server = "localhost";
$user = "root";
$pass = "";
$db = "sala";

try {
    $conn = new PDO("mysql:host=$server;dbname=$db", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // set the PDO error mode to exception
    $fname = (string) filter_input(INPUT_POST, 'fname');
    $lname = (string) filter_input(INPUT_POST, 'lname');
    $email = (string) filter_input(INPUT_POST, 'email');
    $bdate = filter_input(INPUT_POST, 'bdate');
    $gender = (string) filter_input(INPUT_POST, 'gender');
    $password = (string) filter_input(INPUT_POST, 'password');
    $calories = filter_input(INPUT_POST, 'calories');
    $exercices = filter_input(INPUT_POST, 'exercices');
    $sql = "INSERT INTO users_info(LastName,FirstName,BirthDate,Gender,Email,Password,Calories,Exercices) values ('$lname','$fname','$bdate','$gender','$email','$password','$calories','$exercices')";
    $conn->exec($sql); // use exec() because no results are returned
    echo "New record created successfully!";
} catch (Exception $ex) {
    echo $sql . "<br>" . $ex->getMessage();
}

$conn = null;

