@extends('components.layouts.app')

@section('content')

<div class="dashboard">
    <h1>Dashboard</h1>
    <p>Bem vindo, {{ $user['name'] }}</p>
    <div class="transactions">
        <h2>Last transactions</h2>
        
        @livewire('balance\\user-transactions', ['lazy' => true,'user' => $user])
    </div>
</div>

@endsection