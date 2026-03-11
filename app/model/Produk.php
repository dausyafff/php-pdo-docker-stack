<?php
class Produk
{
  private $conn;

  public function __construct($db)
  {
    $this->conn = $db;
  }

  public function readAll()
  {
    $query = "SELECT no, nama_barang 
              FROM produk 
              ORDER BY no DESC";

    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    return $stmt;
  }

  public function create($nama_barang)
  {
    $query = "INSERT INTO produk (nama_barang) VALUES (:nama_barang)";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':nama_barang', $nama_barang);
    return $stmt->execute();
  }

  public function update($no, $nama_barang)
  {
    $query = "UPDATE produk SET nama_barang = :nama_barang WHERE no = :no";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':nama_barang', $nama_barang);
    $stmt->bindParam(':no', $no);
    return $stmt->execute();
  }

  public function delete($no)
  {
    $query = "DELETE FROM produk WHERE no = :no";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':no', $no);
    return $stmt->execute();
  }
}
