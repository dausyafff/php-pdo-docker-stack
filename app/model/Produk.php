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
}
