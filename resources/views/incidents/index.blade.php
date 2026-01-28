@extends('layouts.app')

@section('title', 'Signalement incident')

@section('content')
<h1>Signalement incident</h1>

@foreach($incidents as $incident)
    <p>{{ $incident->title }} — {{ $incident->status }}</p>
@endforeach
@endsection


