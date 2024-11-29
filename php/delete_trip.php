<?php
include 'config.php';  // Hubungkan ke database

// Periksa apakah ada parameter id yang dikirimkan via GET
if (isset($_GET['id'])) {
    // Mengambil ID yang dikirimkan
    $id = intval($_GET['id']);  // Pastikan ID adalah integer untuk mencegah SQL Injection

    // Siapkan query untuk menghapus data berdasarkan ID
    $stmt = $conn->prepare("DELETE FROM trips WHERE id = ?");
    $stmt->bind_param("i", $id);  // Mengikat parameter ID sebagai integer

    // Eksekusi query dan periksa apakah berhasil
    if ($stmt->execute()) {
        // Jika berhasil, redirect ke halaman daftar perjalanan
        header("Location: list_trips.php");
        exit;
    } else {
        // Jika gagal, tampilkan pesan kesalahan
        echo "Error: " . $stmt->error;
    }

    // Tutup statement dan koneksi
    $stmt->close();
    $conn->close();
} else {
    echo "ID tidak ditemukan.";
}
?>

