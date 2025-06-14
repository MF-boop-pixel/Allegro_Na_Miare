<?php
$host = "localhost";
$db = "allegro_na_miare";
$user = "root";
$pass = "";


$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) die("Błąd połączenia: " . $conn->connect_error);

$name = $_POST['name'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);


$sql = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $name, $email, $password);

if ($stmt->execute()) {
  echo "Rejestracja udana! <a href='logowanie.html'>Zaloguj się</a>";
} else {
  echo "Błąd: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
