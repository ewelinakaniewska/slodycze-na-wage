@include('shared.html')

@include('shared.head', ['pageTitle' => 'Słodycze'])

    
        @include('shared.session-error')
<body class="mb-5">
@include('shared.navbar')
    <div class="container mt-5 mb-5">
    @include('shared.session-error')
        <h1 class="text-center mb-5">Słodycze</h1>
        @can('is-admin')
        <a href="{{ route('candies.create') }}" class="btn btn-primary mb-3">Dodaj nowy</a>
        @endcan 
        @include('shared.validation-error')
        <div class="row">
            @foreach($candies as $candy)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $candy->name }}</h5>
                            <img src="data:image/jpeg;base64,{{ base64_encode($candy->img) }}" class="card-img-top" alt="Obrazek słodyczy">
                            <p class="card-text"><strong>Rodzaj:</strong> {{ $candy->type }}</p>
                            <p class="card-text"><strong>Cena:</strong>{{ $candy->price }} zł/kg</p>
                            <p class="card-text"><strong>Ocena:</strong> {{ $candy->rating }}</p>
                            <a href="{{ route('candies.show', $candy->id) }}" class="btn btn-primary">Pokaż szczegóły</a>
                            
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="pagination">
            {{ $candies->links() }}
            </div>

        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
@include('shared.footer')
</html>



</body>

</html>
