@extends('layouts.app')

@section('content')
<div class="auth-page-wrapper">
  <div class="auth-card">
    {{ $slot }}
  </div>
</div>
@endsection