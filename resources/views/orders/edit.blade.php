@include('shared.html')

@include('shared.head', ['pageTitle' => 'Zmień adres'])
<body>
@include('shared.navbar')
    <div class="container mt-5">
    @include('shared.validation-error')
    <h1>Zmiana adresu</h1>
    <form action="{{ route('orders.update', $order->id) }}" method="POST">

    @csrf
    @method('PUT')
    
    <div class="form-group">
        <label for="address">Adres:</label>
        <input type="text" class="form-control mb-3" id="address" name="address" value="{{ $order->address }}">
    </div>

    @can('is-admin')
    <select class="form-select" name="status" id="status">
        <option value="Przygotowywane">Przygotowywane</option>
        <option value="Wysłane">Wysłane</option>
        <option value="Dostarczone">Dostarczone</option>
    </select>       
    @endcan 
    
    <button type="submit" class="btn btn-success mt-2">Zapisz zmiany</button>
    </form>
    </div>
    @include('shared.footer')
</body>

</html>


