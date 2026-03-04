<?php
class Database
{
  private $host = "db"; // Sesuaikan dengan nama service database di docker-compose.yml
  private $db_name = "php-docker";
  private $username = "root";
  private $password = "root";
  public $conn;

  public function getConnection()
  {
    $this->conn = null;

    try {
      // DSN (Data Source Name)
      $dsn = "mysql:host=" . $this->host . ";dbname=" . $this->db_name . ";charset=utf8mb4";

      // Opsi PDO untuk error handling dan fetch mode default
      $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
      ];

      $this->conn = new PDO($dsn, $this->username, $this->password, $options);
    } catch (PDOException $exception) {
      echo "Koneksi Error: " . $exception->getMessage();
    }

    return $this->conn;
  }
}
