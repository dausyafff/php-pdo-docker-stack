<?php


require_once __DIR__ . "/../app/config/database.php";
require_once __DIR__ . "/../app/model/Produk.php";

$database = new Database();
$db = $database->getConnection();
$produkModel = new Produk($db);

// Simple Clean URL Logic
$request = $_GET['url'] ?? 'home';
?>

<!DOCTYPE html>
<html>

<head>
  <title>Docker PHP PDO</title>
  <style>
  body {
    font-family: sans-serif;
    background: #f4f4f4;
    padding: 40px;
  }

  .container {
    background: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
  }

  table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
  }

  th,
  td {
    border: 1px solid #ddd;
    padding: 12px;
    text-align: left;
  }

  th {
    background: #007bff;
    color: white;
  }
  </style>
</head>

<body>
  <div class="container">
    <nav>
      <a href="home">Beranda</a> | <a href="produk">Data Produk</a>
    </nav>
    <hr>

    <?php if ($request == 'produk'): ?>
    <h2>Daftar Produk</h2>
    <table>
      <tr>
        <th>ID</th>
        <th>Nama Produk</th>
        <th>Kategori</th>
      </tr>
      <?php
        $data = $produkModel->readAll();
        while ($row = $data->fetch(PDO::FETCH_ASSOC)):
        ?>
      <tr>
        <td><?= $row['id'] ?></td>
        <td><?= $row['nama_produk'] ?></td>
        <td><?= $row['nama_kategori'] ?></td>
      </tr>
      <?php endwhile; ?>
    </table>
    <?php else: ?>
    <h1>Selamat Datang di App Docker-PDO</h1>
    <p>Sistem ini berjalan di atas container Docker dengan Apache dan MySQL.</p>
    <?php endif; ?>
  </div>
</body>

</html>