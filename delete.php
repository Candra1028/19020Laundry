<?php
include 'koneksi.php';

$id = $_GET['id'];
$sql = "DELETE FROM customers WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    header("Location: index.php");
} else {
    echo "Error: " . $conn->error;
}

closeConnection($conn);
?>