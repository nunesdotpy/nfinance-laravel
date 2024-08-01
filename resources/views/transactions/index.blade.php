@extends('components.layouts.app')

@section('content')

<div class="contentapp">
    <h1>Transactions</h1>
    <div class="transactions">
        <h2>All transactions</h2>
        <x-back-button />
        
        @livewire('balance\\user-transactions', ['lazy' => true, 'route' => route('transactions')])
    </div>
</div>

@endsection