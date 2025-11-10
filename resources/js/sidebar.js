document.addEventListener('DOMContentLoaded', () => {
  const sidebar = document.querySelector('.itr-sidebar');
  const closeBtn = document.querySelector('.close-sidebar');
  const openBtn = document.createElement('div');
  const bookNowBtn = document.querySelector('.btn-book-now');
  const modalElement = document.getElementById('itrBookingModal');
  const toastEl = document.getElementById('successToast');

  openBtn.classList.add('open-sidebar');
  openBtn.innerHTML = '&#9654;';
  openBtn.style.display = 'none';
  document.body.appendChild(openBtn);

  // Sidebar toggle
  closeBtn.addEventListener('click', () => {
    sidebar.classList.add('itr-sidebar-collapsed');
    openBtn.style.display = 'flex';
  });

  openBtn.addEventListener('click', () => {
    sidebar.classList.remove('itr-sidebar-collapsed');
    openBtn.style.display = 'none';
  });

  // Show modal
  bookNowBtn.addEventListener('click', () => {
    const modal = new bootstrap.Modal(modalElement);
    modal.show();
    document.body.classList.add('blur-background');
  });

  // Remove blur on modal close
  modalElement.addEventListener('hidden.bs.modal', () => {
    document.body.classList.remove('blur-background');
  });

  // Form validation and toast
  const form = document.getElementById('itrBookingForm');
  form.addEventListener('submit', (e) => {
    e.preventDefault();

    if (!form.checkValidity()) {
      e.stopPropagation();
      form.classList.add('was-validated');
      return;
    }

    form.classList.remove('was-validated');

    // Hide modal
    bootstrap.Modal.getInstance(modalElement).hide();

    // Reset form
    form.reset();

    // Show toast notification
    const toast = new bootstrap.Toast(toastEl, { delay: 4000 });
    toast.show();
  });
});
