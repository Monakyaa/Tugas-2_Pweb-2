<?php
class Laporan_kerja_lembur{
    protected $conn;
    public function __construct(){
        $this->connectDB();
    }
    private function connectDB(){
        $host = "localhost";
        $database = "persuratan";
        $username = "root";
        $password = "";

        $this->conn = new mysqli($host, $username, $password, $database);
        if ($this->conn->error){
            die("koneksi database gagal". $this->conn->error);
        }
    }
public function TampilSemuaDataLembur(){
    $data = mysqli_query(
        $this->conn, "SELECT * FROM laporan_kerja_lembur"
    );
    $tampil=[];
    while($row = mysqli_fetch_assoc($data)){
        $tampil[] = $row;
    }
    return $tampil;
}
}
?>