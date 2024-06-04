<div class="d-flex justify-content-center">
    <div>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div>
                <label for="email">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
            </div>
            <div>
                <label for="password">Password</label>
                <input id="password" type="password" name="password" required>
            </div>
            <div>
                <button type="submit">Login</button>
            </div>
        </form>
        <div>
            {{-- <a href="{{ route('password.request') }}">Forgot Your Password?</a> --}}
        </div>
        <div>
            {{-- <a href="{{ route('register') }}">Register</a> --}}
        </div>
    </div>
    <div>
        <h1>Number 1 plataform for financial manegement</h1>
    </div>
</div>