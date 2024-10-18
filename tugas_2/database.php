<?php
// Membuat class DB untuk koneksi ke database
class DB
{
    // Properti protected untuk menyimpan koneksi database
    protected $conn;

    // Constructor yang akan dipanggil saat objek dibuat
    public function __construct()
    {
        // Membuat koneksi ke database MySQL
        $this->conn = new mysqli("localhost", "root", "", "persuratan");

        // Mengecek apakah koneksi berhasil atau gagal
        if ($this->conn->connect_error) {
            // Jika gagal, tampilkan pesan error dan hentikan eksekusi
            die("Koneksi gagal: " . $this->conn->connect_error);
        }
    }
}
?>
