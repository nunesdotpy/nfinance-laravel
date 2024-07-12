<div>
    <div>
        <form wire:submit="login">
            @csrf
            <div>
                <label for="email">Email</label>
                <input id="email" type="email" wire:model="email" value="{{ old('email') }}" required autofocus>
            </div>
            <div>
                <label for="password">Password</label>
                <input id="password" type="password" wire:model="password" required>
            </div>
            <div>
                <button type="submit">Login</button>
            </div>
        </form>
    </div>
    <div>
        <a href="{{ route('register') }}">Register</a>
    </div>
    {{-- <div>
        <a href="{{ route('password.request') }}">Forgot your password?</a>
    </div> --}}
</div>
