<!DOCTYPE html>
<html lang="en">
<head>
    @include('shared.head', ['pageTitle' => 'Lista Dostawców'])
</head>
<body>
@include('shared.navbar')
<div class="container mt-5">
    @include('shared.session-error')
    <div class="row">
        <div class="col-12">
            <h1>Lista Dostawców</h1>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nazwa</th>
                        <th>Kontakt</th>
                        <th>Telefon</th>
                        <th>Email</th>
                        <th>Adres</th>
                        <th>Uwagi</th>
                        <th>Akcje</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($suppliers as $supplier)
                        <tr>
                            <td>{{ $supplier->id }}</td>
                            <td>{{ $supplier->name }}</td>
                            <td>{{ $supplier->contact_name }}</td>
                            <td>{{ $supplier->phone_number }}</td>
                            <td>{{ $supplier->email }}</td>
                            <td>{{ $supplier->address }}</td>
                            <td>{{ $supplier->notes }}</td>
                            <td>
                                @can('is-admin')
                                <a href="{{ route('suppliers.edit', $supplier->id) }}" class="btn btn-warning btn-sm mb-1">Edytuj</a>
                                <form action="{{ route('suppliers.destroy', $supplier->id) }}" method="POST" class="d-inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Usuń</button>
                                </form>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @can('is-admin')
            <a href="{{ route('suppliers.create') }}" class="btn btn-primary">Dodaj Dostawcę</a>
            @endcan
        </div>
    </div>
</div>
@include('shared.footer')
</body>
</html>
