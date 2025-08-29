<?php
include "koneksi.php";

if (isset($_POST['proses'])) {
    $NIK = $_POST['NIK'];
    $nama_kepala = $_POST['nama_kepala_rumah'];
    $jumlah_kk = $_POST['jumlah_kepala_keluarga'];

    $jumlah_anggota_laki = $_POST['jumlah_anggota_laki'];
    $jumlah_anggota_perempuan = $_POST['jumlah_anggota_perempuan'];

    $sehat_layak_huni = $_POST['sehat_layak_huni'];
    $kegiatan_usaha_kesehatan_lingkungan = $_POST['kegiatan_usaha_kesehatan_lingkungan'];
    $tempat_pembuangan_sampah = $_POST['tempat_pembuangan_sampah'];
    $spal = $_POST['spal'];
    $jamban = $_POST['jamban'];
    $stiker_P4K = $_POST['stiker_P4K'];

    $sumur = $_POST['sumur'];
    $pdam = $_POST['pdam'];
    $dll = $_POST['dll']; 

    $beras = $_POST['beras'];
    $non_beras = $_POST['non_beras'];

    $up2k = $_POST['up2k'];
    $pemanfaatan_tanah_pekarangan = $_POST['pemanfaatan_tanah_pekarangan'];
    $industri_rumah_tangga = $_POST['industri_rumah_tangga'];
    $kerja_bakti = $_POST['kerja_bakti'];

    $keterangan = $_POST['keterangan']; 

    // Simpan ke kepala_keluarga (pastikan tidak duplikat NIK jika sudah ada)
    $insertKepala = mysqli_query($conn, "INSERT INTO kepala_keluarga (NIK, nama_kepala_rumah, jumlah_kepala_keluarga) 
                      VALUES ('$NIK', '$nama_kepala', '$jumlah_kk')");

    if ($insertKepala) {
        // Simpan ke data_warga dengan NIK sebagai foreign key
        $insertjumlah = mysqli_query($conn, "INSERT INTO jumlah_anggota_keluarga (NIK, jumlah_anggota_laki, jumlah_anggota_perempuan) 
                          VALUES ('$NIK', '$jumlah_anggota_laki', '$jumlah_anggota_perempuan')");
        // Simpan ke kriteria_rumah dengan NIK sebagai foreign key
        $insertkriteria = mysqli_query($conn, "INSERT INTO kriteria_rumah (NIK, sehat_layak_huni, kegiatan_usaha_kesehatan_lingkungan, tempat_pembuangan_sampah, spal, jamban, stiker_P4K) 
                          VALUES ('$NIK', '$sehat_layak_huni', '$kegiatan_usaha_kesehatan_lingkungan', '$tempat_pembuangan_sampah', '$spal', '$jamban', '$stiker_P4K')");
        // Simpan ke sumber_air dengan NIK sebagai foreign key
        $insertair = mysqli_query($conn, "INSERT INTO sumber_air_keluarga (NIK, sumur, pdam) 
                          VALUES ('$NIK', '$sumur', '$pdam')");
        //Simpan ke data makanan_pokok
        $insertmakan = mysqli_query($conn, "INSERT INTO makanan_pokok (NIK, beras, non_beras) 
                          VALUES ('$NIK', '$beras', '$non_beras')");
        //Simpan ke data mengikuti_kegiatan
        $insertkegiatan = mysqli_query($conn, "INSERT INTO mengikuti_kegiatan (NIK, up2k, pemanfaatan_tanah_pekarangan, industri_rumah_tangga, kerja_bakti) 
                          VALUES ('$NIK', '$up2k', '$pemanfaatan_tanah_pekarangan', '$industri_rumah_tangga', '$kerja_bakti')");
        //Simpan ke data keterangan
        $insertketerangan= mysqli_query($conn, "INSERT INTO keterangan (NIK, keterangan) 
                          VALUES ('$NIK', '$keterangan')");

        if ($insertjumlah && $insertkriteria && $insertair && $insertmakan && $insertkegiatan && $insertketerangan) {
            echo "Data berhasil disimpan ke kedua tabel.";
        } else {
            echo "Gagal menyimpan ke database: " . mysqli_error($conn);
        }
    } else {
        echo "Gagal menyimpan ke database: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Form Dasawisma</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="/assets/style.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />
  <script src="js/main.js"></script>
  <style>
    ::placeholder {
      color: #adb5bd !important;
      opacity: 1 !important;
    }

    html, body {
      margin: 0;
      padding: 0;
      height: 100%;
      overflow-x: hidden;
    }
    .main-content {
      padding: 1rem;
    }
    @media (min-width: 768px) {
      .sidebar {
        position: fixed;
        top: 0;
        bottom: 0;
        left: 0;
        width: 250px;
        background-color: #fff;
        border-right: 1px solid #e2e8f0;
        padding: 1rem;
        z-index: 1030;
      }
      .main-content {
        margin-left: 250px;
        margin-top: 0;
        padding-top: 90px;
      }
    }
    @media (max-width: 767.98px) {
      .sidebar {
        display: none;
      }
      .offcanvas-menu {
        position: fixed;
        top: 0;
        left: 0;
        width: 250px;
        height: 100vh;
        background-color: #fff;
        padding: 1rem;
        border-right: 1px solid #dee2e6;
        z-index: 1050;
        transform: translateX(-100%);
        transition: transform 0.3s ease-in-out;
      }
      .offcanvas-menu.show {
        transform: translateX(0);
      }
      .backdrop {
        position: fixed;
        top: 0;
        left: 0;
        width: 100vw;
        height: 100vh;
        background-color: rgba(0,0,0,0.5);
        z-index: 1040;
        display: none;
      }
      .backdrop.show {
        display: block;
      }
    }
  </style>
</head>
<body>
  <!-- Mobile Header -->
  <nav class="navbar navbar-light bg-light fixed-top d-md-none">
    <div class="container-fluid">
      <button class="btn btn-outline-secondary" id="mobileToggle">
        <i class="bi bi-list"></i>
      </button>
      <span class="navbar-brand mb-0 h1">Dashboard</span>
    </div>
  </nav>

  <!-- Sidebar for Desktop -->
  <div class="sidebar d-none d-md-block">
    <h4>Dashboard</h4>
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link" href="index.php">
          <i class="bi bi-house-door"></i> Home
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link dropdown-toggle" data-bs-toggle="collapse" href="#collapseDataWarga" role="button" aria-expanded="false" aria-controls="collapseDataWarga">
          <i class="bi bi-people"></i> Data Warga
        </a>
        <div class="collapse ps-3" id="collapseDataWarga">
          <ul class="nav flex-column">
            <li><a class="nav-link" href="data-warga.php">Data Warga</a></li>
            <li><a class="nav-link" href="data-kematian.php">Data Kematian</a></li>
            <li><a class="nav-link" href="data-kelahiran.php">Data Kelahiran</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link dropdown-toggle" data-bs-toggle="collapse" href="#collapseFormWarga" role="button" aria-expanded="false" aria-controls="collapseFormWarga">
          <i class="bi bi-journal-text"></i> Form Pendataan
        </a>
        <div class="collapse ps-3" id="collapseFormWarga">
          <ul class="nav flex-column">
            <li><a class="nav-link" href="/coding/MMDKader2/pages/form-data-warga.php">Form Data Warga</a></li>
            <li><a class="nav-link" href="form-data-kematian.html">Form Data Kematian</a></li>
            <li><a class="nav-link" href="form-data-kelahiran.html">Form Data Kelahiran</a></li>
          </ul>
        </div>
      </li>
    </ul>
  </div>

  <!-- Sidebar for Mobile -->
  <div class="offcanvas-menu" id="mobileSidebar">
  <h4>Dashboard</h4>
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link" href="index.php"><i class="bi bi-house-door"></i> Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" onclick="toggleCollapse('collapseMobileData')"><i class="bi bi-people"></i> Data Warga</a>
          <ul class="nav flex-column ps-3 collapse" id="collapseMobileData">
            <li><a class="nav-link" href="/coding/MMDKADER2/pages/data-warga.php">Data Warga</a></li>
            <li><a class="nav-link" href="#">Data Kematian</a></li>
            <li><a class="nav-link" href="#">Data Kelahiran</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" onclick="toggleCollapse('collapseMobileForm')"><i class="bi bi-journal-text"></i> Form Pendataan</a>
          <ul class="nav flex-column ps-3 collapse" id="collapseMobileForm">
            <li><a class="nav-link" href="/coding/MMDKader2/pages/form-data-warga.php">Form Data Warga</a></li>
            <li><a class="nav-link" href="#">Form Data Kematian</a></li>
            <li><a class="nav-link" href="#">Form Data Kelahiran</a></li>
          </ul>
        </li>
      </ul>
  </div>
  <div class="backdrop" id="mobileBackdrop"></div>


  <!-- Main Content Wrapper -->
    <div class="main-content pt-5">
    <main class="container py-5">
        <h2 class="mb-4">Form Dasawisma</h2>
    <form action="form-data-warga.php" method="POST">
            <!-- Kepala Keluarga -->
            <div class="mb-3">
                <label>Nama Kepala Rumah</label>
                <input type="text" class="form-control" name="nama_kepala_rumah" required>
            </div>

            <div class="mb-3">
                <label>NIK Kepala Rumah</label>
                <input type="text" class="form-control" name="NIK" required>
            </div>

            <!-- Jumlah Anggota -->
            <div class="mb-3">
                <label>Jumlah Kepala Keluarga</label>
                <input type="number" class="form-control" name="jumlah_kepala_keluarga">
            </div>
            <div class="mb-3">
                <label>Jumlah Laki-laki</label>
                <input type="number" class="form-control" name="jumlah_anggota_laki">
            </div>
            <div class="mb-3">
                <label>Jumlah Perempuan</label>
                <input type="number" class="form-control" name="jumlah_anggota_perempuan">
            </div>

<!-- Kriteria Rumah -->
          <h3>Kriteria Rumah (Iya / Tidak)</h3>

          <label>Sehat Layak Huni:</label><br>
            <input type="radio" name="sehat_layak_huni" value="1" required> Iya
            <input type="radio" name="sehat_layak_huni" value="0"> Tidak<br><br>

          <label>Kegiatan Usaha Kesehatan Lingkungan:</label><br>
            <input type="radio" name="kegiatan_usaha_kesehatan_lingkungan" value="1" required> Iya
            <input type="radio" name="kegiatan_usaha_kesehatan_lingkungan" value="0"> Tidak<br><br>

          <label>Tempat Pembuangan Sampah:</label><br>
            <input type="radio" name="tempat_pembuangan_sampah" value="1" required> Iya
            <input type="radio" name="tempat_pembuangan_sampah" value="0"> Tidak<br><br>

          <label>SPAL:</label><br>
            <input type="radio" name="spal" value="1" required> Iya
            <input type="radio" name="spal" value="0"> Tidak<br><br>

          <label>Jamban:</label><br>
            <input type="radio" name="jamban" value="1" required> Iya
            <input type="radio" name="jamban" value="0"> Tidak<br><br>

          <label>Stiker P4K:</label><br>
            <input type="radio" name="stiker_P4K" value="1" required> Iya
            <input type="radio" name="stiker_P4K" value="0"> Tidak<br><br>

            <!-- Sumber Air -->
          <h3>Sumber Air</h3>

          <label>PDAM:</label><br>
            <input type="radio" name="pdam" value="1" required> Iya
            <input type="radio" name="pdam" value="0"> Tidak<br><br>

          <label>Sumur</label><br>
            <input type="radio" name="sumur" value="1" required> Iya
            <input type="radio" name="sumur" value="0"> Tidak<br><br>

          <label>DLL</label><br>
            <input type="radio" name="dll" value="1" required> Iya
            <input type="radio" name="dll" value="0"> Tidak<br><br>

            <!-- Makanan Pokok -->
            <h5 class="mt-4">Makanan Pokok</h5>
            <div class="mb-3 mt-4">
                <label>Beras</label>
                <input type="text" class="form-control" name="beras">
            </div>
            <div class="mb-3">
                <label>Non-Beras</label>
                <input type="text" class="form-control" name="non_beras">
            </div>

            <!-- Kegiatan -->
          <h3>Kegiatan</h3>

          <label>UP2K</label><br>
            <input type="radio" name="up2k" value="1" required> Iya
            <input type="radio" name="up2k" value="0"> Tidak<br><br>

          <label>Pemanfaatan Tanah Pekarangan</label><br>
            <input type="radio" name="pemanfaatan_tanah_pekarangan" value="1" required> Iya
            <input type="radio" name="pemanfaatan_tanah_pekarangan" value="0"> Tidak<br><br>

          <label>Industri Rumah Tangga</label><br>
            <input type="radio" name="industri_rumah_tangga" value="1" required> Iya
            <input type="radio" name="industri_rumah_tangga" value="0"> Tidak<br><br>

          <label>Kerja Bakti</label><br>
            <input type="radio" name="kerja_bakti" value="1" required> Iya
            <input type="radio" name="kerja_bakti" value="0"> Tidak<br><br>

            <!-- Keterangan -->
            <div class="mb-3 mt-4">
                <label>Keterangan</label>
                <textarea class="form-control" name="keterangan" rows="3"></textarea>
            </div>

            <td><input type="submit" value="Simpan" name="proses"></td>
        </form>
  </main>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="/assets/main.js"></script>
</body>
</html>