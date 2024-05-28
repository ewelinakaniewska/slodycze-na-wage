@include('shared.html')

@include('shared.head', ['pageTitle' => 'Edytuj'])
<body>
@include('shared.navbar')
    <div class="container mt-5">
    @include('shared.session-error')
        <div class="row d-flex justify-content-center">
            <div class="col-md-8">
            <h1>Edytuj</h1>
            @include('shared.validation-error')
            <form action="{{ route('candies.update', $candy->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Nazwa</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $candy->name) }}" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="type" class="form-label">Rodzaj</label>
                    <input type="text" class="form-control @error('type') is-invalid @enderror" id="type" name="type" value="{{ old('type', $candy->type) }}" required>
                    @error('type')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="ingredients" class="form-label">Skład</label>
                    <textarea class="form-control @error('ingredients') is-invalid @enderror" id="ingredients" name="ingredients" rows="3" required>{{ old('ingredients', $candy->ingredients) }}</textarea>
                    @error('ingredients')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Cena</label>
                    <input type="number" step="0.01" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price', $candy->price) }}" required>
                    @error('price')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="stock" class="form-label">Ilość w magazynie (kg)</label>
                    <input type="number" class="form-control @error('stock') is-invalid @enderror" id="stock" name="stock" value="{{ old('stock', $candy->stock) }}" required>
                    @error('stock')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="rating" class="form-label">Ocena</label>
                    <input type="number" step="0.1" class="form-control @error('rating') is-invalid @enderror" id="rating" name="rating" value="{{ old('rating', $candy->rating) }}" required>
                    @error('rating')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="img" class="form-label">Zdjęcie</label>
                    <input type="file" class="form-control @error('img') is-invalid @enderror" id="img" name="img">
                    @error('img')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    @if($candy->img)
                        <img src="data:image/jpeg;base64,{{ base64_encode($candy->img) }}" class="img-fluid mt-2" alt="{{ $candy->name }}" style="max-width: 200px;">
                    @endif
                </div>
                <div class="mt-3 mb-5">
                    <button type="submit" class="btn btn-primary">Zatwierdź zmiany</button>
                    <a href="{{ route('candies.index') }}" class="btn btn-secondary">Anuluj</a>
                </div>  
            </form>
            </div>
        </div>
    </div>
    @include('shared.footer')
</body>

</html>


