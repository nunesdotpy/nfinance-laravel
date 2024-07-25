<div class="new-transaction">
    <div>
        <a href="{{ route('home') }}">< Back</a>
    </div>
    <h2>New transaction</h2>    
    {{-- formulario para enviar transação --}}
    <form wire:submit="newTransaction">
        <div>
            <label for="name">Name</label>
            <input id="name" type="text" wire:model="name" required>
        </div>
        <div class="value-type">
            <div>
                <label for="amount">Value</label>
                <input id="amount" type="number" step="0.1" wire:model="amount" required>
            </div>
            <div>
                <label for="type">Type</label>
                <select id="type" wire:model="type" required>
                    <option value="spent" selected>Spent</option>
                    <option value="income">Incoming</option>
                </select>
            </div>
        </div>
       
        <div>
            <label for="description">Description</label>
            <input id="description" type="text" wire:model="description">
        </div>
        <div>
            <label for="date">Date</label>
            <input id="date" type="datetime-local" wire:model="date">
        </div>
        <div>
            <label for="category">Category</label>
            <select id="category" wire:model="category">
                <option>Select</option>
                <option value="food">Food</option>
                <option value="transport">Transport</option>
                <option value="health">Health</option>
                <option value="education">Education</option>
                <option value="salary">Salary</option>
                <option value="others">Others</option>
            </select>
        </div>
        <div>
            <button class="btn-primary" type="submit">Send</button>
        </div>
    </form>
</div>
