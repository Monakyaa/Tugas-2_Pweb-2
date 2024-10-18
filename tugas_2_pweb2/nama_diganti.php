<?php 
class Nama_pengawas_diganti extends Penggantian_pengawas_ujian{
    public function TampilSemuaDataNama()
    {
        $tampil = [];
        $data = mysqli_query(
            $this->conn, 
            "SELECT * FROM penggantian_pengawas_ujian
            WHERE nama_diganti='Dr.Anwar'"
        );
        while ($row = mysqli_fetch_array($data)){
            $tampil[]=$row;
        }
        return $tampil;
    }

}
?>