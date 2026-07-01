<?php

$host = "db";
$usuario = "root";
$password = "root";
$base = "libreria";

$conn = new mysqli($host,$usuario,$password,$base);

if($conn->connect_error){
    die("Error de conexión: ".$conn->connect_error);
}
