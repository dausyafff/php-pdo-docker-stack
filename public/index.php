<?php
require_once __DIR__ . "/../app/config/database.php";
require_once __DIR__ . "/../app/model/Produk.php";

$database = new Database();
$db = $database->getConnection();
$produkModel = new Produk($db);

// Simple Clean URL Logic
$request = $_GET['url'] ?? 'home';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  if (isset($_POST['tambah'])) {
    $produkModel->create($_POST['nama_barang']);
    header("Location: ?url=produk");
  }

  if (isset($_POST['update'])) {
    $produkModel->update($_POST['no'], $_POST['nama_barang']);
    header("Location: ?url=produk");
  }
}
// Handle Delete
if ($request == "delete") {
  $produkModel->delete($_GET['id']);
  header("Location: ?url=produk");
  exit;
}
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
      <a href="/home">Beranda</a> | <a href="../app/views/produk.php">Data Produk</a>
    </nav>
    <hr>

    <?php if ($request == 'produk'): ?>
      <!-- masih kosong ya -->
    <?php else: ?>
    <?php endif; ?>
    <h1>Selamat Datang di App Docker-PDO</h1>
    <p>Sistem ini berjalan di atas container Docker dengan Apache dan MySQL.</p>
  </div>
</body>

</html>