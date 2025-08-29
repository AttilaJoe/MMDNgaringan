<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard - Sistem Dasawisma</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css"/>
  <style>
    body { background-color: #f8f9fa; }
    /* Sidebar khusus desktop */
    .sidebar {
      width: 240px;
      height: 100vh;
      position: fixed;
      top: 0; left: 0;
      background: #fff;
      border-right: 1px solid #ddd;
      padding: 1rem;
    }
    .main-content {
      margin-left: 240px;
      padding: 2rem;
    }
    /* Mobile: sembunyikan sidebar fixed */
    @media (max-width: 768px) {
      .sidebar { display: none; }
      .main-content { margin-left: 0; }
    }
  </style>
</head>
<body>

  <!-- Tombol Hamburger (muncul hanya di mobile) -->
  <nav class="navbar bg-light d-md-none">
    <div class="container-fluid">
      <button class="btn btn-outline-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSidebar">
        <i class="bi bi-list"></i> Menu
      </button>
    </div>
  </nav>

  <!-- Sidebar Desktop -->
  <div class="sidebar d-none d-md-block">
    <h5 class="mb-4"><i class="bi bi-grid"></i> Dashboard</h5>
    <ul class="nav flex-column">
      <li class="nav-item"><a class="nav-link" href="index.php"><i class="bi bi-house-door"></i> Home</a></li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#dataWargaMenu"><i class="bi bi-people"></i> Data Warga</a>
        <div class="collapse" id="dataWargaMenu">
          <ul class="nav flex-column ms-3">
            <li><a class="nav-link" href="data-warga.php">Data Warga</a></li>
            <li><a class="nav-link" href="data-kematian.php">Data Kematian</a></li>
            <li><a class="nav-link" href="data-kelahiran.php">Data Kelahiran</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#formMenu"><i class="bi bi-journal-text"></i> Form Pendataan</a>
        <div class="collapse" id="formMenu">
          <ul class="nav flex-column ms-3">
            <li><a class="nav-link" href="form-data-warga.php">Form Data Warga</a></li>
            <li><a class="nav-link" href="form-data-kematian.php">Form Data Kematian</a></li>
            <li><a class="nav-link" href="form-data-kelahiran.php">Form Data Kelahiran</a></li>
          </ul>
        </div>
      </li>
    </ul>
  </div>

  <!-- Offcanvas Sidebar Mobile -->
  <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasSidebar">
    <div class="offcanvas-header">
      <h5><i class="bi bi-grid"></i> Dashboard</h5>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body">
      <ul class="nav flex-column">
        <li class="nav-item"><a class="nav-link" href="index.php"><i class="bi bi-house-door"></i> Home</a></li>
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="#dataWargaMenuMobile"><i class="bi bi-people"></i> Data Warga</a>
          <div class="collapse" id="dataWargaMenuMobile">
            <ul class="nav flex-column ms-3">
              <li><a class="nav-link" href="data-warga.php">Data Warga</a></li>
              <li><a class="nav-link" href="data-kematian.php">Data Kematian</a></li>
              <li><a class="nav-link" href="data-kelahiran.php">Data Kelahiran</a></li>
            </ul>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="#formMenuMobile"><i class="bi bi-journal-text"></i> Form Pendataan</a>
          <div class="collapse" id="formMenuMobile">
            <ul class="nav flex-column ms-3">
              <li><a class="nav-link" href="form-data-warga.php">Form Data Warga</a></li>
              <li><a class="nav-link" href="form-data-kematian.php">Form Data Kematian</a></li>
              <li><a class="nav-link" href="form-data-kelahiran.php">Form Data Kelahiran</a></li>
            </ul>
          </div>
        </li>
      </ul>
    </div>
  </div>

  <!-- Main Content -->
  <div class="main-content">
    <!-- (isi dashboard kamu yang tadi: tabel + accordion chart) -->
    <div class="card mb-4">
      <div class="card-header">
        <h6 class="mb-0">Data Keluarga</h6>
      </div>
      <div class="card-body table-responsive">
        <table class="table table-bordered table-sm align-middle text-center">
          <thead class="table-light">
            <tr>
              <th>No</th>
              <th>Kepala Rumah</th>
              <th>Jumlah KK</th>
              <th>Total Anggota</th>
              <th>Lansia</th>
              <th>Berkebutuhan Khusus</th>
              <th>Layak Huni</th>
              <th>Air PDAM</th>
              <th>Air Sumur</th>
              <th>Makanan Pokok</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>DALMI</td>
              <td>2</td>
              <td>7</td>
              <td>1</td>
              <td>1</td>
              <td>1</td>
              <td>0</td>
              <td>1</td>
              <td>Beras</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <!-- Accordion Charts -->
    <div class="accordion" id="accordionChart">
      <div class="accordion-item">
        <h2 class="accordion-header">
          <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#chartAnggota">
            Statistik Anggota
          </button>
        </h2>
        <div id="chartAnggota" class="accordion-collapse collapse">
          <div class="accordion-body">
            <canvas id="dashboardChart" height="200"></canvas>
          </div>
        </div>
      </div>

      <div class="accordion-item">
        <h2 class="accordion-header">
          <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#chartLansia">
            Statistik Lansia
          </button>
        </h2>
        <div id="chartLansia" class="accordion-collapse collapse">
          <div class="accordion-body">
            <canvas id="lansiaChart" height="200"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</body>
</html>
