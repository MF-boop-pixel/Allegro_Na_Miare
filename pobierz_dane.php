<?php
header('Content-Type: application/json');

$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'twoja_baza';

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
  http_response_code(500);
  echo json_encode(['error' => 'Błąd połączenia']);
  exit;
}

$email = $_GET['email'] ?? '';
if (!$email) {
  http_response_code(400);
  echo json_encode(['error' => 'Brak emaila']);
  exit;
}

$stmt = $conn->prepare("SELECT imie_nazwisko, adres FROM dane WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {
  echo json_encode($row);
} else {
  echo json_encode(['imie_nazwisko' => '', 'adres' => '']);
}
$stmt->close();
$conn->close();
?>
