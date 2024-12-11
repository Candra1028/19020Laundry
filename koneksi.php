<?php
// Konfigurasi database
$host = 'localhost'; // Ganti dengan host database Anda
$db = '19020_psas'; // Ganti dengan nama database Anda
$user = 'root'; // Ganti dengan username database Anda
$pass = ''; // Ganti dengan password database Anda

// Membuat koneksi
$conn = new mysqli($host, $user, $pass, $db);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Fungsi untuk menutup koneksi
function closeConnection($conn) {
    $conn->close();
}

// Pengaturan harga per paket
$harga_per_paket = [
    'Cuci Kering/kg' => 20000,
    'Cuci Basah/kg' => 30000,
    'Cuci Setrika/kg' => 25000,
    'Cuci Spesial/kg' => 50000,
];
?>