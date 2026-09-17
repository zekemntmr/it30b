<?php
//Database Connection
$host = 'localhost'
$db = 'it30b_lab_db'
$user = 'root'
$pass = ''
$charset = 'utf8mb4';

$dsn = "mysql:host=$host; dbname=$db; charset=$charset"

$option = [
    PDO::ATTR_ERR => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
]

try{
    $pdo = new PDO($dn,$user,$pass,$options);
    echo 'connection successful';
} catch(PDOException $e){
    die("Database Connection faileed" . $e->getMessage())
}

//Session
session_start();

//Determine Current Section
$section = $_GET['section'] ??'students';

//Determine CRUD Operation
$action = $_GET['action'] ??'';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>