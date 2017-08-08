<div class="container">
    @include('ticket', compact($transaction))
    @if (!$transaction->user->active)
        <p>Registrate en <strong>ecoTicket</strong> ahora y accedé a todas tus transacciones en forma cómoda y segura haciendo click en el siguiente link:</p>
        <a href="http://localhost:8000/register?email={{ $transaction->user->email }}">Comenzar</a>
    @else
        <p>Entrá ahora a ecoTicket para ver tu dashboard personal:</p>
        <a href="http://localhost:8000/home">Ir...</a>
    @endif
</div>
