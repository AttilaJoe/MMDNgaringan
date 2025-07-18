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
