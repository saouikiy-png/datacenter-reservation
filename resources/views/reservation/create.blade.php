<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Reserve Resource</title>

    {{-- Flatpickr CSS --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    {{-- Custom CSS --}}
    <link rel="stylesheet" href="{{ asset('css/reservation.css') }}">
</head>

<body>

    <div class="reservation-page">
        <div class="reservation-card">

            <h2>Reserve Resource</h2>
            <p class="subtitle">Complete the reservation form</p>

            {{-- Errors --}}
            @if($errors->any())
                <div class="error-box">
                    @foreach($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('reservation.store') }}">
                @csrf

                {{-- Hidden resource ID --}}
                <input type="hidden" name="resource_id" value="{{ $resource->id }}">

                <label>Full Name</label>
                <input type="text" value="{{ auth()->user()->name }}" disabled>

                <label>Reservation Start Date</label>
                <input type="text" id="reservation_date" name="reservation_date" required>

                <label>Return Date</label>
                <input type="text" id="return_date" name="return_date" required>

                <label>Justification</label>
                <textarea name="justification" required></textarea>

                <div class="actions">
                    <button type="submit" class="btn-primary">Reserve</button>
                    <a href="{{ url()->previous() }}" class="btn-secondary">Cancel</a>
                </div>
            </form>

        </div>
    </div>

    {{-- Pass reserved dates to JS --}}
    <script>
        window.disabledReservations = [
            @foreach($existingReservations as $reservation)
                {
                        from: "{{ \Carbon\Carbon::parse($reservation->reservation_date)->format('Y-m-d') }}",
                        to: "{{ \Carbon\Carbon::parse($reservation->return_date)->format('Y-m-d') }}"
                    },
            @endforeach
    ];
    </script>

    {{-- Flatpickr --}}
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    {{-- Custom JS --}}
    <script src="{{ asset('js/reservation.js') }}"></script>

</body>

</html>