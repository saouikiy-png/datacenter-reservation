@extends('layouts.app')

@section('title', 'Reserve Resource')

@section('content')
<style>
    .reservation-container {
        background-image: url("{{ asset('images/llginM.png') }}");
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 40px 20px;
    }

    .reservation-card {
        background: rgba(255, 255, 255, 0.95);
        padding: 40px;
        border-radius: 12px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        max-width: 600px;
        width: 100%;
        backdrop-filter: blur(5px);
        border-top: 5px solid #7856A8;
    }

    h2 {
        color: #3D2B6C;
        text-align: center;
        margin-bottom: 5px;
        font-size: 2rem;
        font-weight: 800;
        text-transform: uppercase;
    }

    .subtitle {
        text-align: center;
        color: #718096;
        margin-bottom: 30px;
        font-size: 1rem;
    }

    label {
        font-weight: 600;
        color: #3D2B6C;
        display: block;
        margin-bottom: 8px;
        margin-top: 15px;
    }

    input, textarea {
        width: 100%;
        padding: 12px;
        border: 1px solid #C4DEF8;
        border-radius: 6px;
        font-size: 1rem;
        font-family: inherit;
        background: white;
    }

    input:focus, textarea:focus {
        outline: none;
        border-color: #7856A8;
        box-shadow: 0 0 0 3px rgba(120, 86, 168, 0.2);
    }

    .btn-primary {
        background-color: #7856A8;
        color: white;
        border: none;
        padding: 12px 24px;
        border-radius: 6px;
        font-weight: 700;
        cursor: pointer;
        width: 100%;
        margin-top: 20px;
        font-size: 1rem;
        transition: 0.2s;
    }
    .btn-primary:hover { background-color: #3D2B6C; }

    .btn-secondary {
        display: block;
        text-align: center;
        margin-top: 15px;
        color: #718096;
        text-decoration: none;
        font-size: 0.9rem;
    }
    .btn-secondary:hover { color: #3D2B6C; text-decoration: underline; }

    .error-box {
        background: #FED7D7;
        color: #C53030;
        padding: 15px;
        border-radius: 6px;
        margin-bottom: 20px;
        border: 1px solid #FEB2B2;
    }
</style>

{{-- Flatpickr CSS --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

<div class="reservation-container">
    <div class="reservation-card">

        <h2>Reserve Resource</h2>
        <p class="subtitle">{{ $resource->name }}</p>

        {{-- Errors --}}
        @if($errors->any())
            <div class="error-box">
                @foreach($errors->all() as $error)
                    <p style="margin:0;">• {{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('reservation.store') }}">
            @csrf

            {{-- Hidden resource ID --}}
            <input type="hidden" name="resource_id" value="{{ $resource->id }}">

            <label>Full Name</label>
            <input type="text" value="{{ auth()->user()->name }}" disabled style="background-color: #EDF2F7; cursor: not-allowed;">

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                <div>
                    <label>Reservation Date</label>
                    <input type="text" id="reservation_date" name="reservation_date" required placeholder="Select date...">
                </div>
                <div>
                    <label>Return Date</label>
                    <input type="text" id="return_date" name="return_date" required placeholder="Select date...">
                </div>
            </div>

            <label>Justification</label>
            <textarea name="justification" rows="3" required placeholder="Why do you need this resource?"></textarea>

            <button type="submit" class="btn-primary">Reserve Now</button>
            <a href="{{ url()->previous() }}" class="btn-secondary">Cancel</a>
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

@endsection