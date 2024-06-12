@include('shared.html')

@include('shared.head', ['pageTitle' => 'Zamówienia'])
<body>
@include('shared.navbar')
    <div class="container mt-5 mb-5">
    @include('shared.session-error')
    @include('shared.validation-error')
    <h1>Historia zamówień</h1>
    @can(!'is-admin')
    <p>Zamówień łącznie: {{ $orderCount }}</p>
    @endcan
    <div class="table-responsive ">
    <table class="table ">
        <thead>
            <tr>
                <th>Status</th>
                <th>Metoda płatności</th>
                <th>Kwota</th>
                <th>Data</th>
                <th>Adres do wysyłki</th>

                @can('is-admin')
                    <th>Użytkownik</th>
                @endcan 

                <th></th>
                <th></th>
            </tr>
        </thead>

        <tbody>
            @foreach($orders as $order)
            <tr>
                <td>{{ $order->status }}</td>
                <td>{{ $order->payment_method }}</td>
                <td>{{ $order->total_amount }}</td>
                <td>{{ $order->created_at->format('d-m-Y') }}</td>
                <td>{{ $order->address}}</td>

                @can('is-admin')
                    <td>{{$order->user->email}}</td>
                @endcan 

                <td >
                    <a href="{{ route('orders.show', $order) }}" class="btn  btn-primary">Szczegóły</a>
                </td>   
            </tr>
            @endforeach
        </tbody>
    </table>

    </div>

    @can('is-admin')
    <h2>Statystyki dla bieżącego miesiąca</h2>
    <p>Liczba zamówień: {{ $orderCount }}</p>
    <p>Średnia wartość zamówienia: {{ $averageOrderValue }}</p>
    <p>Łączna kwota zamówień: {{ $totalAmount }}</p>
    <p>Data ostatniego zamówienia: {{ $lastOrderDate }}</p>
    
    <h3>Najczęściej zamawiane słodycze</h3>
    <table class="table ">
    <thead>
        <tr>
            <th>Produkt</th>
            <th>Liczba zamówień</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($mostOrderedProduct as $productName => $orderCount)
    <tr>
        <td>{{ $productName }}</td>
        <td>{{ $orderCount }}</td>
    </tr>
    @endforeach
    </tbody>
    </table>

  
    <div class="container row">
        <div class="container mt-5 col d-flex align-items-center">
            <h2>Ilość sprzedanych słodyczy w bieżącym miesiącu (kg)</h2>
        </div>

        <div class="col">
            <canvas id="pieChart"></canvas>
        </div>
    </div>

   
    <script>
        var ctx = document.getElementById('pieChart').getContext('2d');
        var labels = @json($labels);
        var data = @json($data);

        var chart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: labels,
                datasets: [{
                    data: data,
                    backgroundColor: function(context) {
                    var colors = ['LightCoral', 'LightSkyBlue', 'Plum', 'lightgreen', 'lightpink', 'PaleVioletRed', 'LightSalmon', 'PeachPuff','Violet'];
                    return colors.slice(0, context.dataset.data.length);
                },
                }],
            
            },
        });
    </script>

    @endcan
</div>
    @include('shared.footer')
</body>
</html>
