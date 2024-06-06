<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{ route('candies.index') }}">Słodycze na wagę</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link @if (str_contains(request()->path(), 'suppliers')) active @endif"
                    href="{{ route('suppliers.index') }}">Dostawcy</a>
            </li>
        </ul>
        <ul id="navbar-user" class="navbar-nav mb-2 mb-lg-0 ">
            <li class="pr-5">
                <button class="nav-link" onclick="themeToggle()"> <i class="bi-moon-stars"></i></button>
            </li>
            @if (Auth::check())
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}">{{ Auth::user()->name }}, wyloguj się... </a>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Zaloguj się...</a>
                </li>
            @endif
            @if (Auth::check() && Auth::user()->role_id == 2)
            <div class="dropdown ">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">Panel użytkownika</button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                    <li><a href="{{ route('users.edit', Auth::user()->id) }}" class="dropdown-item" type="button">Ustawienia konta</a></li>
                    <li><a href="{{ route('orders.index') }}" class="dropdown-item" type="button">Historia zamówień</a></li>
                    <li><a href="{{ route('orders.create') }}" class="dropdown-item" type="button">Nowe zamówienie</a></li>
                </ul>
            </div>
            @endif
            @if (Auth::check() && Auth::user()->role_id == 1)
            <div class="dropdown ">
                <button class="btn btn-secondary dropdown-toggle " type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">Panel administratora</button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                    <li><a href="{{ route('users.edit', Auth::user()->id) }}" class="dropdown-item" type="button">Ustawienia konta</a></li>
                    <li><a href="{{ route('users.index', 2)}}" class="dropdown-item" type="button">Zarządzaj użytkownikami</a></li>
                    <li><a href="{{ route('orders.index', 2)}}" class="dropdown-item" type="button">Zarządzaj zamówieniami</a></li>
                </ul>
            </div>
            @endif

        </ul>
      </div>
      @include('shared.success-toast')
    </div>
  </nav>
