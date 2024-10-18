<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <title>Data Penggantian Pengawas</title>
  </head>

  <body>

    <div class="container" style="margin-top: 80px">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              DATA PENGGANTIAN PENGAWAS
            </div>
            <div class="card-body">
              <a href="tambah-siswa.php" class="btn btn-md btn-success" style="margin-bottom: 10px">TAMBAH DATA</a>
              
              <!-- Tabel Data Penggantian Pengawas -->
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
                  <?php
                  include_once 'penggantian_pengawas_ujian.php';
                  include_once 'ruang.php';

                  $penggantian_pengawas_ujian = new Penggantian_pengawas_ujian();
                  $ruang = new Ruang();

                  if (isset($_GET['nama_diganti'])) {
                    $pgn = $_GET['ruang'];

                    if ($pgn == 'penggantian_pengawas_ujian') {
                      echo "<h2>DATA PENGGANTIAN PENGAWAS</h2>";

                      $ruang = $penggantian_pengawas_ujian->TampilSemuaDataLembur();
                      if ($ruang) {
                        foreach ($ruang as $row) {
                          echo "<tr>
                                  <td>{$row['pengganti_id']}</td>
                                  <td>{$row['nama_pengawas_diganti']}</td>
                                  <td>{$row['unit_kerja']}</td>
                                  <td>{$row['hari_tgl_penggantian']}</td>
                                  <td>{$row['jam']}</td>
                                  <td>{$row['ruang']}</td>
                                  <td>{$row['nama_pengawas_pengganti']}</td>
                                  <td>{$row['dosen_id']}</td>
                                </tr>";
                        }
                      } else {
                        echo "<p>Data penggantian pengawas tidak ditemukan.</p>";
                      }
                    } elseif ($ruang== 'A102') {
                      echo "<h2>NAMA PENGAWAS YANG DIGANTI</h2>";
                      $ruang = $ruang->TampilSemuaDataLembur("A102");

                      echo "<table id='tabel-nama-diganti' class='table table-striped'>
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
                              <tbody>";
                      foreach ($ruang as $row) {
                        echo "<tr>
                                <td>{$row['pengganti_id']}</td>
                                <td>{$row['nama_pengawas_diganti']}</td>
                                <td>{$row['unit_kerja']}</td>
                                <td>{$row['hari_tgl_penggantian']}</td>
                                <td>{$row['jam']}</td>
                                <td>{$row['ruang']}</td>
                                <td>{$row['nama_pengawas_pengganti']}</td>
                                <td>{$row['dosen_id']}</td>
                              </tr>";
                      }
                      echo "</tbody></table>";
                    }
                  } else {
                    echo "<h2>Sistem Pergantian Jadwal</h2>";
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script>
      $(document).ready(function() {
          $('#myTablePenggantian').DataTable();
      });
    </script>
  </body>
</html>
