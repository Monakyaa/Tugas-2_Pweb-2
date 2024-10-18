<?php
include 'database.php'; // Menghubungkan ke file database
include 'header.php';   // Menghubungkan ke file header
include 'navbar.php';   // Menghubungkan ke file navbar

// Membuat class Keseluruhan yang merupakan turunan dari class DB
class Keseluruhan extends DB {
    // Fungsi untuk mengambil data dari tabel 'penggantian_pengawas_ujian'
    function getData() {
        // Membuat koneksi ke database menggunakan PDO
        $conn = new PDO("mysql:host=localhost;dbname=persuratan", 'root', '');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Mengatur mode error untuk exception

        // Query SQL untuk mengambil data dari tabel
        $stmt = $conn->prepare("SELECT pengganti_id, nama_pengawas_diganti, unit_kerja, hari_tgl_penggantian, jam, ruang, nama_pengawas_pengganti, dosen_id FROM penggantian_pengawas_ujian");
        
        // Menjalankan query
        $stmt->execute();

        // Mengambil semua hasil dalam bentuk array asosiatif
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Mengembalikan data yang diambil
        return $data;
    }
}

// Membuat objek dari class Keseluruhan
$dataPengganti = new Keseluruhan();
// Memanggil fungsi untuk mendapatkan data dari database
$dataPengawas = $dataPengganti->getData();
?>

<!-- Menampilkan data dalam bentuk tabel -->
<table class="table table-bordered" id="myTablePenggantian">
    <thead>
        <tr>
            <th>ID Pengganti</th>
            <th>Nama Pengawas Diganti</th>
            <th>Unit Kerja</th>
            <th>Hari/Tanggal Penggantian</th>
            <th>Jam</th>
            <th>Ruang</th>
            <th>Nama Pengawas Pengganti</th>
            <th>ID Dosen</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($dataPengawas as $row): ?>
        <tr>
            <td><?php echo $row['pengganti_id']; ?></td>
            <td><?php echo $row['nama_pengawas_diganti']; ?></td>
            <td><?php echo $row['unit_kerja']; ?></td>
            <td><?php echo $row['hari_tgl_penggantian']; ?></td>
            <td><?php echo $row['jam']; ?></td>
            <td><?php echo $row['ruang']; ?></td>
            <td><?php echo $row['nama_pengawas_pengganti']; ?></td>
            <td><?php echo $row['dosen_id']; ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table><br>

<?php
// Membuat class Keseluruhan2 yang merupakan turunan dari class Keseluruhan
class Keseluruhan2 extends Keseluruhan {
    // Fungsi untuk mengambil data dari tabel 'laporan_kerja_lembur'
    function getData() {
        // Membuat koneksi ke database menggunakan PDO
        $conn = new PDO("mysql:host=localhost;dbname=persuratan", 'root', '');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Mengatur mode error untuk exception

        // Query SQL untuk mengambil data dari tabel 'laporan_kerja_lembur'
        $stmt = $conn->prepare("SELECT lembur_id, hari_tgl_laporan, waktu, uraian_pekerjaan, keterangan, dosen_id FROM laporan_kerja_lembur");
        
        // Menjalankan query
        $stmt->execute();

        // Mengambil semua hasil dalam bentuk array asosiatif
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Mengembalikan data yang diambil
        return $data;
    }
}

// Membuat objek dari class Keseluruhan2
$waktu = new Keseluruhan2();
// Memanggil fungsi untuk mendapatkan data dari tabel 'laporan_kerja_lembur'
$dataLembur = $waktu->getData();
?>

<!-- Menampilkan data dalam bentuk tabel -->
<table class="table table-bordered" id="myTableLembur">
    <thead>
        <tr>
            <th>Lembur ID</th>
            <th>Hari/Tanggal Laporan</th>
            <th>Waktu</th>
            <th>Uraian Pekerjaan</th>
            <th>Keterangan</th>
            <th>ID Dosen</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($dataLembur as $row): ?>
        <tr>
            <td><?php echo $row['lembur_id']; ?></td>
            <td><?php echo $row['hari_tgl_laporan']; ?></td>
            <td><?php echo $row['waktu']; ?></td>
            <td><?php echo $row['uraian_pekerjaan']; ?></td>
            <td><?php echo $row['keterangan']; ?></td>
            <td><?php echo $row['dosen_id']; ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php
include 'footer.php'; // Menghubungkan ke file footer
?>
