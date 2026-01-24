<x-guest-layout>

    <style>
        .register-page-wrapper {
            background-image: url("{{ asset('images/llginM.png') }}");
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        .register-card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 15px;
            padding: 40px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            width: 100%;
            max-width: 500px;
        }
    </style>

    <div class="register-page-wrapper">
        <div class="register-card">
            <div class="register-header">
                <h2 class="register-title">Create Account</h2>
                <p class="register-subtitle">Join the Data Center network</p>
            </div>

            <form method="POST" action="{{ route('register') }}" class="register-form-container">
                @csrf

                <div class="register-input-group">
                    <label for="name" class="register-label">Full Name</label>
                    <input id="name" class="register-input" type="text" name="name" value="{{ old('name') }}" required autofocus>
                    <x-input-error :messages="$errors->get('name')" class="register-error-text" />
                </div>

                <div class="register-input-group">
                    <label for="email" class="register-label">Email Address</label>
                    <input id="email" class="register-input" type="email" name="email" value="{{ old('email') }}" required>
                    <x-input-error :messages="$errors->get('email')" class="register-error-text" />
                </div>

                <div class="register-input-group">
                    <label for="password" class="register-label">Password</label>
                    <input id="password" class="register-input" type="password" name="password" required>
                    <x-input-error :messages="$errors->get('password')" class="register-error-text" />
                </div>

                <div class="register-input-group">
                    <label for="password_confirmation" class="register-label">Confirm Password</label>
                    <input id="password_confirmation" class="register-input" type="password" name="password_confirmation" required>
                </div>

                <div class="register-footer">
                    <button type="submit" class="register-submit-btn">Create Account</button>
                    <a href="{{ route('login') }}" class="register-link">Already have an account? Log in</a>
                </div>
            </form>
        </div>
    </div>

</x-guest-layout>