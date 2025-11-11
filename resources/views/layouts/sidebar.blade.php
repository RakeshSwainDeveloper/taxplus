<div class="itr-sidebar">
  <div class="itr-ad-content">
    <h3>📅 Book Your ITR Slot</h3>
    <p>Get expert help filing your ITR. Schedule your consultation today!</p>
    <button type="button" class="btn-book-now">Book Now</button>
  </div>
  <button type="button" class="close-sidebar">&times;</button>
</div>

<!-- Booking Modal -->
<div class="modal fade itr-modal" id="itrBookingModal" tabindex="-1" aria-labelledby="itrBookingModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content border-0 shadow-lg">

      <!-- Modal Header -->
      <div class="modal-header text-white" style=" background: linear-gradient(135deg, #1e3a8a, #007bff); border-top-left-radius: 10px; border-top-right-radius: 10px;">
        <h5 class="modal-title fw-bold" id="itrBookingModalLabel">
          <i class="bi bi-calendar2-check me-2"></i> Book Your ITR Slot
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <!-- Modal Body -->
      <div class="modal-body p-4">
        <form id="itrBookingForm" class="needs-validation" novalidate>
          <div class="col-md-6">
            <label for="type" class="form-label fw-semibold">Select Type</label>
            <select class="form-select form-select-lg" id="type" name="type" required>
              <option value="">-- Select Type --</option>
              <option value="gst">GST</option>
              <option value="itr">ITR FILING</option>
            </select>

          </div>
          <div class="row g-3">

            <div class="col-md-6">
              <label for="name" class="form-label fw-semibold">Full Name</label>
              <input type="text" class="form-control form-control-lg" id="name" name="name" placeholder="Enter your full name" required>
            </div>

            <div class="col-md-6">
              <label for="email" class="form-label fw-semibold">Email</label>
              <input type="email" class="form-control form-control-lg" id="email" name="email" placeholder="example@email.com" required>
            </div>

            <div class="col-md-6">
              <label for="mobile" class="form-label fw-semibold">Mobile Number</label>
              <input type="tel" class="form-control form-control-lg" id="mobile" name="mobile" placeholder="10-digit number" pattern="[0-9]{10}" required>
            </div>

            <div class="col-md-6">
              <label for="book_date" class="form-label fw-semibold">Preferred Date</label>
              <input type="date" class="form-control form-control-lg" id="book_date" name="book_date" required>
            </div>

          </div>

          <div class="text-center mt-4">
            <button type="submit" class="btn btn-gradient w-50 py-2 fw-bold">
              <i class="bi bi-send-fill me-2"></i> Submit
            </button>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>
<!-- Toast Container -->
<div class="toast-container position-fixed top-0 end-0 p-3" style="z-index: 2000;">
  <div id="successToast" class="toast align-items-center text-white bg-success border-0 shadow-lg" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="d-flex">
      <div class="toast-body fw-semibold">
        ✅ Your ITR slot has been booked successfully!
      </div>
      <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
  </div>
</div>