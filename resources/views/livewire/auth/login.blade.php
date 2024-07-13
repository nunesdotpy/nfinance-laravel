<div class="flex justify-center items-center h-screen">
    <div class="w-1/3">
        <form wire:submit="login" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf
            <div class="mb-4">
                <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                <input id="email" type="email" wire:model="email" value="{{ old('email') }}" required autofocus class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-6">
                <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password</label>
                <input id="password" type="password" wire:model="password" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Login</button>
            </div>
        </form>
        <div class="text-center">
            <a href="{{ route('register') }}" class="text-blue-500 hover:text-blue-700">Register</a>
        </div>
        {{-- <div class="text-center">
            <a href="{{ route('password.request') }}" class="text-blue-500 hover:text-blue-700">Forgot your password?</a>
        </div> --}}
    </div>
</div>
