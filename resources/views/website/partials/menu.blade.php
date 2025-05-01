<ul class="navbar-nav me-auto">
    <li class="nav-item">
        <!-- Link-->
        <a class="nav-link active" href="{{ url('/') }}">Home</a>
    </li>

    {{-- <li class="nav-item">
        <!-- Link-->
        <a class="nav-link" href="{{ url('/shop') }}">Shop</a>
    </li>
    <li class="nav-item">
        <!-- Link-->
        <a class="nav-link" href="detail.html">Product detail</a>
    </li> --}}

    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="pagesDropdown" href="#" data-bs-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            Categories
        </a>
        <div class="dropdown-menu mt-3 shadow-sm" aria-labelledby="pagesDropdown">
            @foreach ($categories as $category)
            <a class="dropdown-item border-0 transition-link" href="{{ url('/category/'. $category->id) }}">
                {{ $category->name }}
            </a>
            @endforeach
        </div>
    </li>

</ul>

<ul class="navbar-nav ms-auto">
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/cart') }}">
            <i class="fas fa-dolly-flatbed me-1 text-gray"></i>
            Cart
            <small class="text-gray fw-normal">
                ({{ count(session('cart', [])) }})
            </small>
        </a>
    </li>

    <li class="nav-item"><a class="nav-link" href="#!">
            <i class="far fa-heart me-1"></i>
            <small class="text-gray fw-normal">
                (0)
            </small>
        </a>
    </li>

    @if (auth()->check())
    <li>
        <a class="nav-link" href="{{ url('/register') }}">
            Welcome, {{ auth()->user()->name }}
        </a>
    </li>

    <li>
        <a class="nav-link" href="{{ url('/logout') }}">
            <i class="fas fa-sign-out-alt"></i>
            Logout
        </a>
    </li>
    @else
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/register') }}">
            <i class="fas fa-user me-1 text-gray fw-normal"></i>
            New Account
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ url('/login') }}">
            <i class="fas fa-user me-1 text-gray fw-normal"></i>
            Login
        </a>
    </li>
    @endif
</ul>