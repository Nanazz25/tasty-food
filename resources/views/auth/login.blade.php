<x-guest-layout>
    <style>
        body {
            background-color: #f5f5f5;
            font-family: Arial, sans-serif;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
        }

        .input-wrapper {
            position: relative;
            margin-bottom: 15px;
        }

        .input-wrapper input {
            width: 100%;
            padding: 10px 40px 10px 12px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 6px;
            background-color: #fff;
            box-sizing: border-box;
        }

        .input-wrapper button {
            position: absolute;
            right: 10px;
            top: 0;
            bottom: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            background: transparent;
            border: none;
            cursor: pointer;
            padding: 0;
        }

        .input-wrapper svg {
            width: 22px;
            height: 22px;
            stroke: #444;
            stroke-width: 2;
            fill: none;
        }

        .remember-me {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .remember-me input[type="checkbox"] {
            margin-right: 8px;
            width: 16px;
            height: 16px;
        }

        .btn {
            width: 100%;
            padding: 10px;
            background-color: #4a90e2;
            color: white;
            font-weight: bold;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #357abd;
        }

        .forgot-link {
            display: block;
            text-align: right;
            font-size: 14px;
            margin-bottom: 15px;
            color: #555;
            text-decoration: none;
        }

        .forgot-link:hover {
            text-decoration: underline;
        }

        .error-message {
            color: red;
            font-size: 13px;
            margin-bottom: 10px;
        }
    </style>

    <div class="login-box">
        <h2>Login Admin</h2>

        @if (session('status'))
            <div class="error-message">{{ session('status') }}</div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <label for="email">Email</label>
            <div class="input-wrapper">
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
            </div>
            @error('email')
                <div class="error-message">{{ $message }}</div>
            @enderror

            <label for="password">Password</label>
            <div class="input-wrapper">
                <input id="password" type="password" name="password" required>
                <button type="button" onclick="togglePassword(this)">
                    <!-- Show Icon -->
                    <svg id="eye-open" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M1 12s4-7 11-7 11 7 11 7-4 7-11 7S1 12 1 12z" />
                        <circle cx="12" cy="12" r="3" />
                    </svg>
                    <!-- Hide Icon -->
                    <svg id="eye-closed" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" style="display: none;">
                        <path d="M17.94 17.94A10.9 10.9 0 0112 19c-7 0-11-7-11-7a21.07 21.07 0 015.29-5.73" />
                        <path d="M1 1l22 22" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>
            </div>
            @error('password')
                <div class="error-message">{{ $message }}</div>
            @enderror

            <div class="remember-me">
                <input type="checkbox" id="remember_me" name="remember">
                <label for="remember_me">Remember Me</label>
            </div>

            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="forgot-link">Forgot your password?</a>
            @endif

            <button type="submit" class="btn">Login</button>
        </form>
    </div>

    <script>
        function togglePassword(button) {
            const input = document.getElementById('password');
            const eyeOpen = button.querySelector('#eye-open');
            const eyeClosed = button.querySelector('#eye-closed');
            const isHidden = input.type === 'password';

            input.type = isHidden ? 'text' : 'password';
            eyeOpen.style.display = isHidden ? 'none' : 'inline';
            eyeClosed.style.display = isHidden ? 'inline' : 'none';
        }
    </script>
</x-guest-layout>
