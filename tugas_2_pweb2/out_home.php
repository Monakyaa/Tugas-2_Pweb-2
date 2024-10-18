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

                  $penggantian_pengawas_ujian = new Penggantian_pengawas_ujian();
                  $dataPenggantian = $penggantian_pengawas_ujian->TampilSemuaData();

                  if ($dataPenggantian) {
                      foreach ($dataPenggantian as $row) {
                  ?>
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
                  <?php
                      }
                  } else {
                  ?>
                  <tr>
                    <td colspan="8" class="text-center">Data Tidak Ada</td>
                  </tr>
                  <?php
                  }
                  ?>
                </tbody>
              </table>          
              <!-- Tabel Data Ruang -->
              <h4 class="mt-5">Data Laporan</h4>
              <table class="table table-bordered" id="myTableRuang">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Hari/Tanggal Laporan</th>
                    <th>Waktu</th>
                    <th>Uraian Pekerjaan</th>
                    <th>Keterangan</th>
                    <th>Dosen ID</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  include_once 'laporan_kerja_lembur.php';

                  $laporan_kerja_lembur = new Laporan_kerja_lembur();
                  $dataLembur = $laporan_kerja_lembur->TampilSemuaDataLembur();

                  if ($dataLembur) {
                      foreach ($dataLembur as $row) {
                  ?>
                  <tr>
                    <td><?php echo $row['lembur_id']; ?></td>
                    <td><?php echo $row['hari_tgl_laporan']; ?></td>
                    <td><?php echo $row['waktu']; ?></td>
                    <td><?php echo $row['uraian_pekerjaan']; ?></td>
                    <td><?php echo $row['keterangan']; ?></td>
                    <td><?php echo $row['dosen_id']; ?></td>
                  </tr>
                  <?php
                      }
                  } else {
                  ?>
                  <tr>
                    <td colspan="8" class="text-center">Data Tidak Ada</td>
                  </tr>
                  <?php
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
          $('#myTableRuang').DataTable();
      });
    </script>
  </body>
</html>
