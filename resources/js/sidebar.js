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

  // Show modal only if logged in, otherwise redirect to login
  bookNowBtn.addEventListener('click', () => {
    if (typeof IS_LOGGED_IN !== 'undefined' && IS_LOGGED_IN) {
      const modal = new bootstrap.Modal(modalElement);
      modal.show();
      document.body.classList.add('blur-background');
    } else {
      window.location.href = LOGIN_URL;
    }
  });


  // Remove blur on modal close
  modalElement.addEventListener('hidden.bs.modal', () => {
    document.body.classList.remove('blur-background');
  });

  // Form validation and toast
  const form = document.getElementById('itrBookingForm');
  form.addEventListener('submit', async (e) => {
    e.preventDefault();

    if (!form.checkValidity()) {
        e.stopPropagation();
        form.classList.add('was-validated');
        return;
    }

    form.classList.remove('was-validated');

    // Prepare form data
    const formData = {
        type: document.getElementById('type').value,
        name: document.getElementById('name').value,
        email: document.getElementById('email').value,
        mobile: document.getElementById('mobile').value,
        book_date: document.getElementById('book_date').value,
    };

    try {
        const res = await fetch(SLOT_BOOK_URL, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": CSRF_TOKEN
            },
            body: JSON.stringify(formData)
        });

        const result = await res.json();

        if (result.success) {
            // Hide modal
            bootstrap.Modal.getInstance(modalElement).hide();

            // Reset form
            form.reset();

            // Show toast notification
            const toast = new bootstrap.Toast(toastEl, { delay: 4000 });
            toast.show();
        } else {
            alert("Something went wrong!");
        }

    } catch (error) {
        console.error(error);
        alert("Server error, please try again!");
    }
});

});
