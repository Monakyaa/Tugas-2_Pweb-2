<?php

include 'laporan_kerja_lembur.php';
class Ruang extends Laporan_kerja_lembur{


public function TampilSemuaDataLembur(){
    $data = mysqli_query(
        $this->conn, "SELECT * FROM penggantian_pengawas_ujian
        WHERE ruang = 'A102"
    );
    $tampil=[];
    while($row = mysqli_fetch_assoc($data)){
        $tampil[] = $row;
    }
    return $tampil;
}
}
?>