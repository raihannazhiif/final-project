<?php
include 'config.php'; // Koneksi ke database

// Periksa apakah form dikirim
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $destination = $_POST['destination'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $description = $_POST['description'];

    // Persiapkan query untuk menyimpan data
    $stmt = $conn->prepare("INSERT INTO trips (destination, start_date, end_date, description) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $destination, $start_date, $end_date, $description); // Bind parameter sesuai tipe data

    // Eksekusi query dan cek hasilnya
    if ($stmt->execute()) {
        // Redirect ke halaman daftar perjalanan setelah berhasil menyimpan
        header("Location: list_trips.php");
        exit();
    } else {
        echo "Error: " . $stmt->error; // Tampilkan error jika query gagal
    }

    // Tutup koneksi
    $stmt->close();
    $conn->close();
}
?>
