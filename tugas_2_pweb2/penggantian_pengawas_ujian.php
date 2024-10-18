<?php
class Penggantian_pengawas_ujian{
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

    #tampil semua data  Penggantian Pengawas Ujian
    public function TampilSemuaData(){
        $data = mysqli_query(
            $this->conn, "SELECT * FROM Penggantian_pengawas_ujian"
        );
        $tampil=[];
        while($row = mysqli_fetch_assoc($data)){
            $tampil[] = $row;
        }
        return $tampil;
    
    }
}

