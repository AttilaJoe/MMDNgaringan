document.addEventListener('DOMContentLoaded', function () {
  const toggleBtn = document.getElementById('mobileToggle');
  const sidebar = document.getElementById('mobileSidebar');
  const backdrop = document.getElementById('mobileBackdrop');

  if (toggleBtn && sidebar && backdrop) {
    toggleBtn.addEventListener('click', () => {
      sidebar.classList.toggle('show');
      backdrop.classList.toggle('show');
    });

    backdrop.addEventListener('click', () => {
      sidebar.classList.remove('show');
      backdrop.classList.remove('show');
    });
  }
});

function toggleCollapse(id) {
  const el = document.getElementById(id);
  if (el.classList.contains('show')) {
    el.classList.remove('show');
  } else {
    el.classList.add('show');
  }
} 

const ctx = document.getElementById('dashboardChart').getContext('2d');
    let chart;

    const data = {
      labels: ['DALMI', 'PAINEM', 'NANANG T.'],
      datasets: [{
        label: 'Jumlah Anggota Keluarga',
        data: [7, 1, 3],
        backgroundColor: ['#0d6efd', '#198754', '#ffc107'],
      }]
    };

    function renderChart(type) {
      if (chart) chart.destroy();
      chart = new Chart(ctx, {
        type: type,
        data: data,
      });
    }

    document.getElementById('chartType').addEventListener('change', function () {
      renderChart(this.value);
    });

    const initialType = document.getElementById('chartType').value;
    renderChart(initialType);

    const lansiaCtx = document.getElementById('lansiaChart').getContext('2d');
    let lansiaChart;

    const lansiaData = {
      labels: ['DALMI', 'PAINEM', 'NANANG T.'],
      datasets: [{
        label: 'Jumlah Lansia',
        data: [1, 0, 2],
        backgroundColor: ['#dc3545', '#fd7e14', '#20c997'],
      }]
    };

    function renderLansiaChart(type) {
      if (lansiaChart) lansiaChart.destroy();
      lansiaChart = new Chart(lansiaCtx, {
        type: type,
        data: lansiaData,
      });
    }

    document.getElementById('lansiaChartType').addEventListener('change', function () {
      renderLansiaChart(this.value);
    });

    const initialLansiaType = document.getElementById('lansiaChartType').value;
    renderLansiaChart(initialLansiaType);

    const toggleBtn = document.getElementById('mobileToggle');
    const sidebar = document.getElementById('mobileSidebar');
    const backdrop = document.getElementById('mobileBackdrop');

    toggleBtn.addEventListener('click', () => {
      sidebar.classList.toggle('show');
      backdrop.classList.toggle('show');
    });

    backdrop.addEventListener('click', () => {
      sidebar.classList.remove('show');
      backdrop.classList.remove('show');
    });

    function toggleCollapse(id) {
      const el = document.getElementById(id);
      el.classList.toggle('show');
    }

// Fungsi untuk menampilkan notifikasi
function showNotification() {
  // Menampilkan badge pada sidebar mobile
  const notificationBadgeMobile = document.getElementById('notificationBadgeMobile');
  notificationBadgeMobile.style.display = 'inline-block';  // Menampilkan badge

  // Menampilkan badge pada sidebar desktop
  const notificationBadgeDesktop = document.getElementById('notificationBadgeDesktop');
  notificationBadgeDesktop.style.display = 'inline-block';  // Menampilkan badge
}

// Fungsi untuk menyembunyikan notifikasi
function hideNotification() {
  // Menyembunyikan badge pada sidebar mobile
  const notificationBadgeMobile = document.getElementById('notificationBadgeMobile');
  notificationBadgeMobile.style.display = 'none';

  // Menyembunyikan badge pada sidebar desktop
  const notificationBadgeDesktop = document.getElementById('notificationBadgeDesktop');
  notificationBadgeDesktop.style.display = 'none';
}

// Simulasi untuk menampilkan notifikasi setelah 3 detik
setTimeout(showNotification, 3000);  // Menampilkan setelah 3 detik
