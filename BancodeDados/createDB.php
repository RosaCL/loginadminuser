<?php
$host="localhost";
$user="root";
$pass="";

$pdo = new PDO("mysql:host=$host",$user ,$pass);

$pdo->exec("CREATE DATABASE IF NOT EXISTS loginadminuser");



?>