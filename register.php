<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Servis</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
<?php
require_once('db.php');
$login = $_POST['login'];
$pass = $_POST['pass'];
$repeatpass = $_POST['repeatpass'];
$email = $_POST['email'];

if (empty($login) || empty($pass) || empty($repeatpass) || empty($email)) {
    echo "Wypełnij wszystkie pola";
} else {
    if ($pass != $repeatpass) {
        echo "Hasła nie są jednakowe";
    } else {
        $sql = "INSERT INTO `users` (login, pass, email) VALUES ('$login', '$pass', '$email')";
        if ($conn->query($sql) === TRUE) {
            echo "REGISTRACJA";
        } else {
            echo "BŁĄD: " . $conn->error;
        }
    }
}
?>
