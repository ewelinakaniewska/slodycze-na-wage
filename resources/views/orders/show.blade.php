@include('shared.html')

@include('shared.head', ['pageTitle' => 'Szczegóły zamówienia'])
<body>
@include('shared.navbar')
    <div class="container mt-5">
    @include('shared.session-error')
    @include('shared.validation-error')
        <div class="row d-flex justify-content-center">
        <div class="container">
    <h1 class="mt-5">Szczegóły zamówienia</h1>

    <div class="card mt-4">
        <div class="card-body">
            <p class="card-text">Data zamówienia: {{ $order->created_at }}</p>
            <p class="card-text">Status: {{ $order->status }}</p>
            <p class="card-text">Metoda płatności: {{ $order->payment_method }}</p>
            <p class="card-text">Adres: {{ $order->address }}</p>
        </div>
    </div>

    <h2 class="mt-5">Produkty w zamówieniu:</h2>
    <ul class="list-group mt-3">
        @foreach ($order->candies as $candy)
            <li class="list-group-item">{{ $candy->name }} - ilość: {{ $candy->pivot->quantity }}</li>
        @endforeach
    </ul>
    @if (in_array($order->status, ['Opłacone', 'Przygotowywane']))
        <div class="mt-4">
            <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-primary">Edytuj zamówienie</a>
            <form action="{{ route('orders.destroy', $order->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Usuń zamówienie</button>
            </form>
        </div>
    @endif
</div>


    </div>
    @include('shared.footer')
</body>

</html>

