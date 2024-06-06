@include('shared.html')

@include('shared.head', ['pageTitle' => 'Edytuj dane'])
<body>
@include('shared.navbar')
    <div class="container mt-5">
    @include('shared.session-error')
    @include('shared.validation-error')
        <div class="row d-flex justify-content-center">
            <div class="col-md-8">
            <h1>Edytuj dane</h1>
            <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Imię i nazwisko</label>
                    <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="name" name="name"  maxlength="255" value="{{ old('name', $user->name) }}" required>
                    @error('last_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"  maxlength="255" value="{{ old('email', $user->email) }}" required>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Hasło</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" minlength = "8" name="password">
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <input type="hidden" name="role_id" value="2">
                <div class="mb-3">
                    <label for="img" class="form-label">Zdjęcie profilowe</label>
                    <input type="file" class="form-control @error('img') is-invalid @enderror" id="img" name="img">
                    @error('img')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    @if($user->img)
                        <img src="data:image/jpeg;base64,{{ base64_encode($user->img) }}" class="img-fluid mt-2" alt="{{ $user->name }}" style="max-width: 200px;">
                    @endif
                </div>
                <div class="mt-3 mb-5">
                    <button type="submit" class="btn btn-primary">Zatwierdź zmiany</button>
                    @can('is-admin')
                    <a href="{{route('users.index')}}" class="btn btn-secondary">Anuluj</a>
                    @endcan
                    @can(!'is-admin')
                    <a href="{{route('candies.index')}}" class="btn btn-secondary">Anuluj</a>
                    @endcan
                    
                </div>
            </form>
            </div>
        </div>
    </div>
    @include('shared.footer')
</body>

</html>
