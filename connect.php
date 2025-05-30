<?php
$servername = "localhost"; // atau 127.0.0.1
$username = "root"; // Gunakan nama pengguna yang betul
$password = ""; // Gunakan kata laluan yang betul
$dbname = "komputer"; // Tukar kepada nama pangkalan data sebenar

// Buat sambungan
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Sambungan gagal: " . $conn->connect_error);
} 
?>
