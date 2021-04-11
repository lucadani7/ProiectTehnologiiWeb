<?php
$server='localhost';
$user='root';
$pass='';
$db='fitness_db';

$conn=mysqli_connect($server,$user,$pass,$db);

if(!$conn) die(mysqli_connect_error());

$nume=isset($_POST['nume'])? $_POST['nume']:'';
$prenume=isset($_POST['prenume'])? $_POST['prenume']:'';
$birthday=isset($_POST['data_nasterii'])? $_POST['data_nasterii']:'';
$gen=isset($_POST['gen'])? $_POST['gen']:'';
$kilo=isset($_POST['greutate'])? $_POST['greutate']:'';
$tall=isset($_POST['inaltime'])? $_POST['inaltime']:'';
$email=isset($_POST['email'])? $_POST['email']:'';
$parola=isset($_POST['parola'])? $_POST['parola']:'';

$sql="INSERT INTO users_info(nume,prenume,data_nasterii,gen,greutate,inaltime,email,parola) VALUES ('$nume','$prenume','$birthday','$gen','$kilo','$tall','$email','$parola')";
$result=mysqli_query($conn,$sql);

