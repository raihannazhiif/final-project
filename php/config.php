<?php
$servername = "localhost";
$username = "root"; // Sesuaikan dengan username server Anda
$password = "root";     // Sesuaikan dengan password server Anda
$dbname = "travel_planner";

// Koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
