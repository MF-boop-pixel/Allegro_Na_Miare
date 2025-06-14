<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'twoja_baza';

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
  die("Błąd połączenia: " . $conn->connect_error);
}

$email = $_POST['email'] ?? '';
$imie_nazwisko = $_POST['imie_nazwisko'] ?? '';
$adres = $_POST['adres'] ?? '';

if (!$email) {
  echo "Brak adresu email";
  exit;
}

$stmt = $conn->prepare("INSERT INTO dane (email, imie_nazwisko, adres)
  VALUES (?, ?, ?)
  ON DUPLICATE KEY UPDATE imie_nazwisko = VALUES(imie_nazwisko), adres = VALUES(adres)");
$stmt->bind_param("sss", $email, $imie_nazwisko, $adres);
if ($stmt->execute()) {
  echo "Dane zapisane pomyślnie";
} else {
  echo "Błąd: " . $conn->error;
}
$stmt->close();
$conn->close();
?>
