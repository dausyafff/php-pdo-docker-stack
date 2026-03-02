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
    // Query Relasi: Menampilkan produk dan nama kategori terkait
    $query = "SELECT p.id, p.nama_produk, k.nama_kategori 
                  FROM produk p 
                  LEFT JOIN kategori k ON p.kategori_id = k.id 
                  ORDER BY p.id DESC";

    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    return $stmt;
  }
}
