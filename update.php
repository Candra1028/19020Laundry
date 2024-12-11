<?php
include 'koneksi.php';

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM customers WHERE id = $id");
$row = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $package = $_POST['package'];
    $total_price = $harga_per_paket[$package];

    $sql = "UPDATE customers SET name='$name', address='$address', phone='$phone', package='$package', total_price='$total_price' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Update Pelanggan</title>
</head>
<body>
    <header>
        <img src="logo.png" alt="Logo Laundry">
        <h1>Update Pelanggan</h1>
        <p class="header-text">Silahkan hapus/edit data anda jika merasa sudah membayar, kami akan mengecek data anda jika terdapat kekeliruan atau kecurangan.</p>
    </header>
    <div class="container">
        <form method="POST" action="">
            <label for="name">Nama:</label>
            <input type="text" id="name" name="name" value="<?= $row['name'] ?>" required>
            <label for="address">Alamat:</label>
            <input type="text" id="address" name="address" value="<?= $row['address'] ?>" required>
            <label for="phone">Telepon:</label>
            <input type="text" id="phone" name="phone" value="<?= $row['phone'] ?>" required>
            <label for="package">Pilih Paket:</label>
            <select id="package" name="package" required>
                <?php foreach ($harga_per_paket as $paket => $harga): ?>
                    <option value="<?= $paket ?>" <?= $row['package'] == $paket ? 'selected' : '' ?>><?= $paket ?> - Rp <?= number_format($harga, 0, ',', '.') ?></option>
                <?php endforeach; ?>
            </select>
            <input type="submit" value="Update">
        </form>
    </div>
</body>
</html>

<?php closeConnection($conn); ?>