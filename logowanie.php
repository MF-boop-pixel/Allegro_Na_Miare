<?php
$host = "localhost";
$db = "allegro_na_miare";
$user = "root";
$pass = "";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) die("Błąd połączenia: " . $conn->connect_error);

$email = $_POST['email'];
$password = $_POST['password'];

// Pobierz dane
$sql = "SELECT * FROM users WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {
  if (password_verify($password, $row['password'])) {
    // Zalogowano — zapisz dane do localStorage (przez JS)
    echo "<script>
      localStorage.setItem('user', JSON.stringify({
        name: '" . addslashes($row['name']) . "',
        email: '" . addslashes($row['email']) . "'
      }));
      window.location.href = 'konto.html';
    </script>";
  } else {
    echo "Nieprawidłowe hasło.";
  }
} else {
  echo "Użytkownik nie istnieje.";
}

$stmt->close();
$conn->close();
?>
