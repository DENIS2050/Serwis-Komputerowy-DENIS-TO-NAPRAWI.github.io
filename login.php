<?php
require_once('db.php');
session_start();

$login = $_POST['login'];
$pass = $_POST['pass'];

if (empty($login) || empty($pass)) {
    echo "Wypełnij wszystkie pola";
} else {
    $stmt = $conn->prepare("SELECT * FROM `users` WHERE login = ? AND pass = ?");
    $stmt->bind_param("ss", $login, $pass);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $_SESSION['user'] = $login; // Zapisanie użytkownika do sesji
        header('Location: Strona Główna.html');
        exit;
    } else {
        echo "Nie ma takiego użytkownika";
    }

    $stmt->close();
}
?>

