@extends('layouts.app')

@section('content')
<style>
    .home-hero-section {
        background-image: url("{{ asset('images/BK2.png') }}");
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
    }
    /* Removed the big purple box styling, kept text readable */
    .home-content-overlay {
        background: transparent;
        padding: 20px;
        text-align: center;
        max-width: 900px;
        /* Text shadow for readability on image */
        text-shadow: 0 2px 10px rgba(0,0,0,0.7); 
    }
    .hello {
        font-size: 3.5rem;
        font-weight: 800;
        margin-bottom: 30px;
        color: #FFFFFF; /* Explicitly White */
        text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.7); /* Strong shadow for contrast against BK2.png */
    }
    .home-search-container {
        display: flex;
        gap: 10px;
        justify-content: center;
    }
    .home-search-bar {
        padding: 15px;
        border-radius: 6px;
        border: none;
        width: 400px;
        font-size: 1rem;
        box-shadow: 0 4px 10px rgba(0,0,0,0.2);
    }
    .search-btn {
        padding: 15px 30px;
        background-color: #3D2B6C; /* Minsk */
        color: white;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        font-weight: bold;
        font-size: 1rem;
        box-shadow: 0 4px 10px rgba(0,0,0,0.3);
        transition: background-color 0.2s;
    }
    .search-btn:hover { background-color: #4a367c; }

    /* About Section Styles */
    .about-section {
        background-color: #fce7f3;
        background: linear-gradient(180deg, #ffffff 0%, #f4f7fe 100%);
        padding: 80px 20px;
        text-align: center;
        color: #232B36;
    }
    .about-container {
        max-width: 900px;
        margin: 0 auto;
    }
    .about-title {
        font-size: 2.5rem;
        font-weight: 800;
        color: #3D2B6C;
        margin-bottom: 30px;
        text-transform: uppercase;
        letter-spacing: 1px;
    }
    .about-text {
        font-size: 1.1rem;
        line-height: 1.8;
        color: #4a5568;
        max-width: 800px;
        margin: 0 auto;
    }

    /* Footer Styles */
    .site-footer {
        background-color: #232B36; /* Bunker */
        color: white;
        padding: 40px 20px;
        text-align: center;
    }
    .footer-content {
        max-width: 1200px;
        margin: 0 auto;
        display: flex;
        flex-direction: column;
        gap: 20px;
        align-items: center;
    }
    .footer-links {
        display: flex;
        gap: 30px;
        margin-bottom: 10px;
    }
    .footer-links a {
        color: #C4DEF8; /* Patterns Blue */
        text-decoration: none;
        font-weight: 600;
        transition: color 0.2s;
    }
    .footer-links a:hover { color: white; }
    .copyright {
        font-size: 0.9rem;
        opacity: 0.7;
    }
</style>

<div class="home-hero-section">
  <div class="home-content-overlay">
    <h1 class="hello" style="color: #ffffff !important; text-shadow: 0 2px 10px rgba(0,0,0,0.8);">Hello, this is our DATA CENTER</h1>

    <div class="home-search-container">
      <input type="text" placeholder="Search..." class="home-search-bar">
      <button class="search-btn">Search</button>
    </div>
  </div>
</div>

<div class="about-section">
    <div class="about-container">
        <h2 class="about-title">About our website</h2>
        <p class="about-text">
            Our website provides a simple and intuitive platform to manage and visualize data resources. 
            It allows users to explore different categories, view available resources, and access detailed information in an organized and efficient way. 
            The goal is to offer a clean interface that makes resource management clear, fast, and user-friendly.
        </p>
    </div>
</div>

<footer class="site-footer">
    <div class="footer-content">
        <div class="footer-links">
            <a href="#">Contact Us</a>
        </div>
        <div class="copyright">
            &copy; 2025 Data Center. All rights reserved.
        </div>
    </div>
</footer>
@endsection