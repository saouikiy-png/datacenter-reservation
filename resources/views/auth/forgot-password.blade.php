<x-guest-layout>
    <div class="login-page-wrapper">
        <div class="login-card">
            <h2 class="login-title">Reset Password</h2>

            <p style="font-size: 0.85rem; color: #666; margin-bottom: 20px; text-align: center;">
                Forgot your password? No problem. Enter your email and we will send you a reset link.
            </p>

            <x-auth-session-status class="mb-4" :status="session('status')" style="color: #00bfa5; font-weight: bold; margin-bottom: 15px;" />

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="login-input-group">
                    <label for="email" class="login-label">Email Address</label>
                    <input id="email" class="login-input" type="email" name="email" :value="old('email')" required autofocus>
                    <x-input-error :messages="$errors->get('email')" class="login-error-text" />
                </div>

                <div class="login-button-container">
                    <button type="submit" class="login-submit-btn">
                        Email Password Reset Link
                    </button>
                </div>

                <div style="text-align: center; margin-top: 20px;">
                    <a href="{{ route('login') }}" class="login-forgot-link">Back to Login</a>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>