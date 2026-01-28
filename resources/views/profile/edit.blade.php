@extends('layouts.app')

@section('title', 'My Profile')

@section('content')
<style>
    /* Profile Page Specific Styles reusing the Premium Theme */
    .profile-page-container {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-image: url("{{ asset('images/llginM.png') }}");
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        min-height: 100vh;
        color: #232B36;
        padding-bottom: 60px;
    }

    .profile-header {
        background: linear-gradient(135deg, rgba(120, 86, 168, 0.9) 0%, rgba(119, 119, 223, 0.9) 100%);
        padding: 40px 0;
        text-align: center;
        color: white;
        margin-bottom: 40px;
        box-shadow: 0 4px 6px rgba(0,0,0,0.2);
        backdrop-filter: blur(5px);
    }

    .profile-title {
        font-size: 2.2rem;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin: 0;
        text-shadow: 0 2px 4px rgba(0,0,0,0.3);
    }

    .profile-content-wrapper {
        max-width: 800px;
        margin: 0 auto;
        padding: 0 20px;
        display: flex;
        flex-direction: column;
        gap: 30px;
    }

    .profile-section-card {
        background: rgba(255, 255, 255, 0.95);
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        padding: 30px;
        border-top: 4px solid #7856A8;
    }

    .section-heading {
        color: #3D2B6C; /* Minsk */
        font-size: 1.4rem;
        font-weight: 700;
        margin-bottom: 10px;
        padding-bottom: 10px;
        border-bottom: 1px solid #C4DEF8; /* Patterns Blue */
    }

    .section-description {
        color: #718096;
        font-size: 0.95rem;
        margin-bottom: 25px;
    }

    /* Shared Form Styles used in partials */
    .form-group { margin-bottom: 20px; }
    .form-label { display: block; margin-bottom: 8px; font-weight: 600; color: #3D2B6C; font-size: 0.95rem; }
    .form-control { width: 100%; padding: 12px; border: 1px solid #CBD5E0; border-radius: 6px; font-size: 1rem; transition: 0.2s; }
    .form-control:focus { outline: none; border-color: #7856A8; box-shadow: 0 0 0 3px rgba(120, 86, 168, 0.2); }
    
    .btn-submit {
        background-color: #3D2B6C; color: white; border: none; padding: 12px 24px; border-radius: 6px; font-weight: 600; cursor: pointer; transition: 0.3s;
    }
    .btn-submit:hover { background-color: #2a1b4e; }

    .btn-danger {
        background-color: #E53E3E; color: white; border: none; padding: 12px 24px; border-radius: 6px; font-weight: 600; cursor: pointer; transition: 0.3s;
    }
    .btn-danger:hover { background-color: #C53030; }

    .input-error { display: block; color: #E53E3E; font-size: 0.85rem; margin-top: 5px; }
    .status-msg { color: #38A169; font-weight: 600; margin-left: 10px; font-size: 0.9rem; }

</style>

<div class="profile-page-container">
    
    <div class="profile-header">
        <h1 class="profile-title">My Profile</h1>
        <p style="opacity: 0.9; margin-top: 5px;">Manage your account settings</p>
    </div>

    <div class="profile-content-wrapper">
        
        <!-- Update Profile Information -->
        <div class="profile-section-card">
            @include('profile.partials.update-profile-information-form')
        </div>

        <!-- Update Password -->
        <div class="profile-section-card" style="border-top-color: #ed8936;">
            @include('profile.partials.update-password-form')
        </div>

        <!-- Delete User -->
        <div class="profile-section-card" style="border-top-color: #e53e3e;">
            @include('profile.partials.delete-user-form')
        </div>

    </div>

</div>
@endsection
