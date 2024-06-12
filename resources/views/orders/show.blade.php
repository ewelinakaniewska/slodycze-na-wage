@include('shared.html')

@include('shared.head', ['pageTitle' => 'Szczegóły zamówienia'])

<body>
    @include('shared.navbar')

    <div class="container mt-5">
        @include('shared.session-error')
        @include('shared.validation-error')

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Szczegóły zamówienia</div>
                    <div class="card-body">
                        <p>Data zamówienia: {{ $order->created_at }}</p>
                        <p>Status: {{ $order->status }}</p>
                        <p>Metoda płatności: {{ $order->payment_method }}</p>
                        <p>Adres: {{ $order->address }}</p>
                    </div>
                </div>

                <div class="card mt-4">
                    <div class="card-header">Produkty w zamówieniu</div>
                    <ul class="list-group list-group-flush">
                        @foreach ($order->candies as $candy)
                            <li class="list-group-item">
                                {{ $candy->name }} - ilość: {{ $candy->pivot->quantity }}, cena (kg): {{$candy->pivot->price}}
                            </li>
                        @endforeach
                    </ul>
                </div>

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
    </div>

    @include('shared.footer')
</body>

</html>
