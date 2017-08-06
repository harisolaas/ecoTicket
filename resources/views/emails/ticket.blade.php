<div class="container">
    @include('ticket', compact($transaction))
    <a href="http://localhost:8000/register?email="{{ $transaction->user->email }}>Registro</a>
</div>
