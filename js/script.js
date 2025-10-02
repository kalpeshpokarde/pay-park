document.addEventListener('DOMContentLoaded', function () {
  // Toggle mobile nav
  const btn = document.getElementById('menuToggle');
  const nav = document.getElementById('navbarNav');
  if (btn && nav) {
    btn.addEventListener('click', () => {
      nav.classList.toggle('show');
    });
  }

  // Form validation
  const forms = document.querySelectorAll('form.needs-validation');
  Array.prototype.slice.call(forms).forEach(function (form) {
    form.addEventListener('submit', function (event) {
      if (!form.checkValidity()) {
        event.preventDefault();
        event.stopPropagation();
      }
      form.classList.add('was-validated');
    }, false);
  });
});
