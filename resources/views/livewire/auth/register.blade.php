<div>
    <div>
        <form wire:submit="register">
            @csrf
            <div>
                <label for="name">Name</label>
                <input id="name" type="text" wire:model="name" value="{{ old('name') }}" required autofocus>
            </div>
            <div>
                <label for="email">Email</label>
                <input id="email" type="email" wire:model="email" value="{{ old('email') }}" required>
            </div>
            <div>
                <label for="password">Password</label>
                <input id="password" type="password" wire:model="password" required>
            </div>
            <div>
                <label for="passwordVerify">Confirm Password</label>
                <input id="passwordVerify" type="password" wire:model="passwordVerify" required>
            </div>
            <div>
                <button type="submit">Register</button>
            </div>
        </form>
    </div>
    
</div>
