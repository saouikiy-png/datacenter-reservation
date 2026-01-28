@extends('layouts.app')

@section('content')
<div style="max-width:1100px;margin:40px auto;">

    <h2 style="color:#3D2B6C;margin-bottom:20px;">📅 My Reservations</h2>

    <table style="width:100%;border-collapse:collapse;background:white;border-radius:8px;overflow:hidden;">
        <thead>
            <tr style="background:#ede9fe;">
                <th style="padding:12px;">Resource</th>
                <th>Status</th>
                <th>From</th>
                <th>To</th>
            </tr>
        </thead>

        <tbody>
            @forelse($reservations as $res)
                <tr style="border-bottom:1px solid #ddd;">
                    <td style="padding:10px;">{{ $res->resource->name ?? 'N/A' }}</td>
                    <td>
                        @if($res->status == 'pending')
                            🟡 Pending
                        @elseif($res->status == 'approved')
                            🟢 Approved
                        @else
                            🔴 Rejected
                        @endif
                    </td>
                    <td>{{ $res->reservation_date }}</td>
                    <td>{{ $res->return_date }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" style="text-align:center;padding:20px;">
                        No reservations found.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

</div>
@endsection
