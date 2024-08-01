<div class="contentapp">
    @foreach ($transactions as $transaction)
        @if (isset($hideTransaction[$transaction['_id']]['id']) &&
                $hideTransaction[$transaction['_id']]['id'] == $transaction['_id']
        )
            {{-- @if (Session::has('deleted'))
            @else
            <div class="transaction deleted">
                @endif --}}
            <div class="transaction deleted">
            @else
                {{-- se não foi deletada --}}
                <div class="transaction">
        @endif

        @if (Session::has('error'))
            <div class="alert alert-danger">
                {{ Session::get('error') }}
            </div>
        @endif

        <div class="transaction-spec">
            <p>{{ $transaction['name'] }}</p>
            <p>R${{ $transaction['amount'] }}</p>
            <p>{{ $transaction['description'] }}</p>
            <p>{{ $transaction['date'] }}</p>
            <p>{{ $transaction['type'] ? "Income" : "Spent" }}</p>
        </div>
        <div class="transaction-options">
            <button class="btn-primary" wire:click="editTransaction('{{ $transaction['_id'] }}')">Edit</button>
            <button class="btn-primary" onclick="deleteTransaction()" wire:click="delete('{{ $transaction['_id'] }}')">Delete</button>
        </div>
</div>
@endforeach
</div>
