<!-- JavaScript Libraries -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const startDateInputs = document.querySelectorAll('[id^="date_start_"]');

        startDateInputs.forEach((startDateInput) => {
            const today = new Date();
            const minStartDate = new Date(today.setDate(today.getDate() + 7));
            startDateInput.min = minStartDate.toISOString().split('T')[0];
        });
    });

    function validateStartDate(eventTypeId) {
        const startDateInput = document.getElementById(`date_start_${eventTypeId}`);
        const endDateInput = document.getElementById(`date_end_${eventTypeId}`);
        const selectedDate = new Date(startDateInput.value);

        if (selectedDate >= new Date(startDateInput.min)) {
            endDateInput.disabled = false;
            endDateInput.min = startDateInput.value;
        } else {
            startDateInput.value = '';
            endDateInput.value = '';
            endDateInput.disabled = true;
        }
    }

    function validateEndDate(eventTypeId) {
        const startDateInput = document.getElementById(`date_start_${eventTypeId}`);
        const endDateInput = document.getElementById(`date_end_${eventTypeId}`);

        const startDate = new Date(startDateInput.value);
        const endDate = new Date(endDateInput.value);

        if (endDate < startDate) {
            endDateInput.value = '';
        }
    }
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="lib/wow/wow.min.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/waypoints/waypoints.min.js"></script>
<script src="lib/counterup/counterup.min.js"></script>
<script src="lib/lightbox/js/lightbox.min.js"></script>
<script src="lib/owlcarousel/owl.carousel.min.js"></script>

<!-- Template Javascript -->
<script src="js/main.js"></script>