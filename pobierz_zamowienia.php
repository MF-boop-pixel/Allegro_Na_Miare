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

$stmt = $conn->prepare("SELECT DATE_FORMAT(data, '%Y-%m-%d %H:%i') as data, produkt, cena FROM zamowienia WHERE email = ? ORDER BY data DESC");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

$zamowienia = [];
while ($row = $result->fetch_assoc()) {
  $zamowienia[] = $row;
}

echo json_encode($zamowienia);
$stmt->close();
$conn->close();
?>
