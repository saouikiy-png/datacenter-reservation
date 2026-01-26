<x-guest-layout>

    <style>
        .login-page-wrapper {
            background-image: url("{{ asset('images/llginM.png') }}");
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-card {
            background: rgba(255, 255, 255, 0.95); /* Slight transparency */
            border-radius: 15px;
            padding: 40px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            width: 100%;
            max-width: 450px;
        }
    </style>

    <div class="login-page-wrapper">
        <div class="login-card">
            <h2 class="login-title">Log In</h2>

            <form method="POST" action="{{ route('login') }}" class="login-form-container">
                @csrf

                <div class="login-input-group">
                    <label for="email" class="login-label">Email Address</label>
                    <input id="email" class="login-input" type="email" name="email" value="{{ old('email') }}" required autofocus>
                    <x-input-error :messages="$errors->get('email')" class="login-error-text" />
                </div>

                <div class="login-input-group">
                    <label for="password" class="login-label">Password</label>
                    <input id="password" class="login-input" type="password" name="password" required>
                    <x-input-error :messages="$errors->get('password')" class="login-error-text" />
                </div>

                <div class="login-extra-options">
                    <label for="remember_me" class="login-remember-me">
                        <input id="remember_me" type="checkbox" name="remember" class="login-checkbox">
                        <span>Remember me</span>
                    </label>

                    @if (Route::has('password.request'))
                    <a class="login-forgot-link" href="{{ route('password.request') }}">
                        Forgot password?
                    </a>
                    @endif
                </div>

                <div class="login-button-container">
                    <button type="submit" class="login-submit-btn">
                        Log in
                    </button>
                </div>
            </form>
        </div>
    </div>

</x-guest-layout>