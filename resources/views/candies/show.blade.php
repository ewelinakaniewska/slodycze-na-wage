@include('shared.html')

@include('shared.head', ['pageTitle' => 'Szczegóły'])
<body>
@include('shared.navbar')
    <div class="container mt-5 mb-5">
    @include('shared.session-error')
        <div class="row justify-content-center">
        @include('shared.validation-error')
            <div class="col-md-6 col-lg-4">
                <div class="card">
                    <img src="data:image/jpeg;base64,{{ base64_encode($candy->img) }}" class="card-img-top" alt="{{ $candy->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $candy->name }}</h5>
                        <p class="card-text"><strong>Rodzaj:</strong> {{ $candy->type }}</p>
                        <p class="card-text"><strong>Skład:</strong> {{ $candy->ingredients }}</p>
                        <p class="card-text"><strong>Cena:</strong> ${{ number_format($candy->price, 2) }}</p>
                        <p class="card-text"><strong>Ilość dostępnych (kg):</strong> {{ $candy->stock }}</p>
                        <p class="card-text"><strong>Ocena:</strong> {{ $candy->rating }}</p>
                        <p class="card-text"><strong>Dostawca:</strong> {{ $candy->supplier->name }}</p>
                        <a href="{{ route('candies.index') }}" class="btn btn-primary">Powrót</a>
                        @can('is-admin')
                                <a href="{{ route('candies.edit', $candy->id) }}" class="btn btn-warning">Edytuj</a>
                                <form action="{{ route('candies.destroy', $candy->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Usuń</button>
                                </form>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('shared.footer')
</body>
</html>
