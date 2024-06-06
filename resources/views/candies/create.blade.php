@include('shared.html')

@include('shared.head', ['pageTitle' => 'Dodaj'])
<body>
@include('shared.navbar')
    <div class="container mt-5">
    @include('shared.session-error')
    @include('shared.validation-error')
        <div class="row d-flex justify-content-center">
            <div class="container">
                <h1>Dodaj</h1>
                <form method="POST" action="{{ route('candies.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-2">
                        <label for="name" class="form-label" >Nazwa</label>
                        <input id="name" name="name" type="text" required maxlength="50" class="form-control @if ($errors->first('name')) is-invalid @endif" value="{{ old('name') }}">
                        @if ($errors->first('name'))
                            <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                        @endif
                    </div>
                    <div class="form-group mb-2">
                        <label for="type" class="form-label">Rodzaj</label>
                        <input id="type" name="type" type="text" required maxlength="25" class="form-control @if ($errors->first('type')) is-invalid @endif" value="{{ old('type') }}">
                        @if ($errors->first('type'))
                            <div class="invalid-feedback">{{ $errors->first('type') }}</div>
                        @endif
                    </div>
                    <div class="form-group mb-2">
                        <label for="ingredients" class="form-label">Skład</label>
                        <textarea id="ingredients" name="ingredients" required class="form-control @if ($errors->first('ingredients')) is-invalid @endif">{{ old('ingredients') }}</textarea>
                        @if ($errors->first('ingredients'))
                            <div class="invalid-feedback">{{ $errors->first('ingredients') }}</div>
                        @endif
                    </div>
                    <div class="form-group mb-2">
                        <label for="price" class="form-label">Cena</label>
                        <input id="price" name="price" type="text" required class="form-control @if ($errors->first('price')) is-invalid @endif" value="{{ old('price') }}">
                        @if ($errors->first('price'))
                            <div class="invalid-feedback">{{ $errors->first('price') }}</div>
                        @endif
                    </div>
                    <div class="form-group mb-2">
                        <label for="stock" class="form-label">Ilość dostępnych (kg)</label>
                        <input id="stock" name="stock" type="text" required class="form-control @if ($errors->first('stock')) is-invalid @endif" value="{{ old('stock') }}">
                        @if ($errors->first('stock'))
                            <div class="invalid-feedback">{{ $errors->first('stock') }}</div>
                        @endif
                    </div>
                    <div class="form-group mb-2">
                        <label for="rating" class="form-label">Ocena</label>
                        <input id="rating" name="rating" type="text"required class="form-control @if ($errors->first('rating')) is-invalid @endif" value="{{ old('rating') }}">
                        @if ($errors->first('rating'))
                            <div class="invalid-feedback">{{ $errors->first('rating') }}</div>
                        @endif
                    </div>
                    <div class="form-group mb-2">
                        <label for="supplier_id" class="form-label">Dostawca</label>
                        <select id="supplier_id" name="supplier_id" required class="form-select @if ($errors->first('supplier_id')) is-invalid @endif">
                            <option value="">Wybierz dostawcę</option>
                            @foreach($suppliers as $supplier)
                                <option value="{{ $supplier->id }}" {{ old('supplier_id') == $supplier->id ? 'selected' : '' }}>
                                    {{ $supplier->name }}
                                </option>
                            @endforeach
                        </select>
                        @if ($errors->first('supplier_id'))
                            <div class="invalid-feedback">{{ $errors->first('supplier_id') }}</div>
                        @endif
                    </div>
                    <div class="form-group mb-2">
                        <label for="img" class="form-label">Zdjęcie</label>
                        <input type="file" class="form-control @if ($errors->first('img')) is-invalid @endif" id="img" name="img">
                        @if ($errors->first('img'))
                            <div class="invalid-feedback">{{ $errors->first('img') }}</div>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary mb-5">Dodaj</button>
                    <a href="{{ route('candies.index') }}" class="btn btn-secondary mb-5">Anuluj</a>
                </form>
            </div>
        </div>
    </div>
@include('shared.footer')
</body>
</html>
