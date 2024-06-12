@include('shared.html')
@include('shared.head', ['pageTitle' => 'Nowe zamówienie'])

<body>
   
@include('shared.navbar')
    <div class="container mt-5">
    @include('shared.session-error')
    @include('shared.validation-error')
    <h1>Składanie zamówienia</h1>
        <form action="{{ route('orders.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="address">Adres dostawy:</label>
                <input type="text" class="form-control mb-5" id="address" name="address" required>
            </div>
            <div class="form-group">
                <label for="payment_method " >Metoda płatności:</label>
                <select class="form-control mb-5" id="payment_method" name="payment_method" required>
                    <option value="">Wybierz metodę płatności</option>
                    <option value="Karta kredytowa">Karta kredytowa</option>
                    <option value="PayPal">PayPal</option>
                    <option value="Płatność za pobraniem">Płatność za pobraniem</option>
                    <option value="Przelew">Przelew</option>
                </select>
            </div>

            <div class="row">
                @foreach ($candies as $candy)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="data:image/jpeg;base64,{{ base64_encode($candy->img) }}" class="card-img-top" alt="{{ $candy->name }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $candy->name }}</h5>
                                <p class="card-text" id="price">Cena: {{ $candy->price }}</p>
                                <p class="card-text">Dostępna ilość (kg): {{ $candy->stock }}</p>
                                <label for="quantity">Ilość (kg):</label>
                                <input type="range" class="form-range" id="quantity_{{ $candy->id }}" min="0" max="{{ $candy->stock }}" value="0" oninput="updateQuantity(this)">
                                <input type="number" class="form-control" id="quantity_value_{{ $candy->id }}"  name="products[{{ $candy->id }}]" min="0" max="{{ $candy->stock }}" value="0" oninput="updateSlider(this)">
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <button type="submit" class="btn btn-primary mb-5">Złóż zamówienie</button>
        </form>
    </div>
    @include('shared.footer')
</body>
<script>
    function updateQuantity(slider) {
        var candyId = slider.id.split('_')[1];
        var quantity = slider.value;
        document.getElementById('quantity_value_' + candyId).value = quantity;
    }

    function updateSlider(input) {
        var candyId = input.id.split('_')[2];
        var quantity = input.value;
        document.getElementById('quantity_' + candyId).value = quantity;
    }
</script>
</html>


