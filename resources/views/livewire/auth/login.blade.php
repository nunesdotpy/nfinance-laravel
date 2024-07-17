<div class="d-flex login">
    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">

    <div class="align-content-center text-center aside col-md-8">
        <h1 class="font-weight-bold">NFinance</h1>
        <h2>Sua plataforma de gestão financeira</h2>
    </div>
    <div class="align-content-center m-auto">
        
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
            <div class="text-end">
                <a href="jaja">Forgot your password?</a>
            </div>
            @if(Session::has('error'))
            <div class="alert alert-danger">
                {{ Session::get('error') }}
            </div>
            @endif
            <div>
                <button type="submit">Login</button>
            </div>
        </form>
        <div>
            <a href="{{ route('register') }}">Register</a>
        </div>
        
        
    </div>
</div>