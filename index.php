<?php
include 'koneksi.php';

$result = $conn->query("SELECT * FROM customers");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>CRUD Laundry</title>
</head>
<body>
    <header>
        <img src="logo.png" alt="Logo Laundry">
        <h1>Data Pelanggan Laundry</h1>
        <p class="header-text">Silahkan hapus/edit data anda jika merasa sudah membayar, kami akan mengecek data anda jika terdapat kekeliruan atau kecurangan.</p>
        <p>Jika ada kesalahan dalam pemesanan, atau tidak sesuai dengan yang di pesan bisa menghubungi kami.</p>
        <p>Jika anda ingin memesan silahkan klik pesan dan jika berhasil silahkan datang ke laundry kami untuk menyelesaikan transaksi</p>
    </header>
    <div class="container">
        <a href="create.php">Pesan</a>
        <h2>Harga Per Paket</h2>
        <ul>
            <?php foreach ($harga_per_paket as $paket => $harga): ?>
                <li><?= $paket ?>: Rp <?= number_format($harga, 0, ',', '.') ?></li>
            <?php endforeach; ?>
        </ul>
        <table>
            <tr>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Telepon</th>
                <th>Paket</th>
                <th>Total Harga</th>
                <th>Aksi</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['name'] ?></td>
                    <td><?= $row['address'] ?></td>
                    <td><?= $row['phone'] ?></td>
                    <td><?= $row['package'] ?></td>
                    <td>Rp <?= number_format($row['total_price'], 0, ',', '.') ?></td>
                    <td>
                        <a href="update.php?id=<?= $row['id'] ?>">Edit</a>
                        <a href="delete.php?id=<?= $row['id'] ?>">Hapus</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>

        <!-- Tambahkan informasi "Kami" di sini -->
        <div class="info-kami">
            <h2>Tentang Kami</h2>
            <p>Kami adalah layanan laundry terpercaya yang siap membantu Anda dengan kebutuhan laundry Anda. Dengan pengalaman bertahun-tahun, kami menjamin kualitas dan kepuasan pelanggan.</p>
            <p>Alamat: Jl.Al Munawwaroh No.16,Kutabanjarnegara,kec.Banjarnegara,kab.Banjarnegara,Jawatengah 35418</p>
            <p>Telepon: +62 81229892484</p>
            <p>Email: 19020@pplg.smkn1bawang.sch.id</p>
        </div>
    </div>
</body>
</html>

<?php closeConnection($conn); ?>