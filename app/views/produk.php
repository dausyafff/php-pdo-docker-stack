<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Halaman Produk</title>
</head>

<body>
  <form method="POST">
    <input type="text" name="nama_barang" placeholder="Nama Barang" required>
    <button type="submit">Tambah</button>
  </form>
  <h2>Daftar Produk</h2>
  <table>
    <tr>
      <th>No</th>
      <th>Nama Barang</th>
    </tr>
    <?php
    $data = $produkModel->readAll();
    while ($row = $data->fetch(PDO::FETCH_ASSOC)):
    ?>
      <tr>
        <td><?= $row['no'] ?></td>
        <td><?= $row['nama_barang'] ?></td>
      </tr>
    <?php endwhile; ?>
  </table>
</body>

</html>