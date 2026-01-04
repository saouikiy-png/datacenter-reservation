// Toggle dropdown
document.addEventListener('DOMContentLoaded', function () {
  const dropdownBtn = document.getElementById('dropdownBtn');
  const dropdownContent = document.getElementById('dropdownContent');
  const hamburgerBtn = document.getElementById('hamburgerBtn');
  const mobileMenu = document.getElementById('mobileMenu');

  if (dropdownBtn) {
    dropdownBtn.addEventListener('click', () => {
      dropdownContent.style.display = dropdownContent.style.display === 'block' ? 'none' : 'block';
    });
    document.addEventListener('click', e => {
      if (!dropdownBtn.contains(e.target) && !dropdownContent.contains(e.target)) {
        dropdownContent.style.display = 'none';
      }
    });
  }

  if (hamburgerBtn) {
    hamburgerBtn.addEventListener('click', () => {
      mobileMenu.style.display = mobileMenu.style.display === 'flex' ? 'none' : 'flex';
    });
  }
});