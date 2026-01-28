document.addEventListener('DOMContentLoaded', function () {

    const disabledRanges = window.disabledReservations || [];

    flatpickr("#reservation_date", {
        enableTime: true,
        dateFormat: "Y-m-d H:i",
        minDate: "today",
        disable: disabledRanges
    });

    flatpickr("#return_date", {
        enableTime: true,
        dateFormat: "Y-m-d H:i",
        minDate: "today",
        disable: disabledRanges
    });

});
