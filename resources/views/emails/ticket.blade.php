<div class="container">
    @include('ticket', compact($transaction))
    @if (App\User::where('email', $transaction->user->mail)->first())
        <a href="http://localhost:8000/home">Ver en sitio</a>
    @else
        <a href="http://localhost:8000/register">Registro</a>
    @endif
</div>
