<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#"><span class="text-primary">Home</span>Link</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('index')}}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('listings')}}">Properties</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('aboutUs')}}">About Us</a>
                </li>
            </ul>
            <form class="d-flex" role="search" action="{{route('listingsSearch')}}" method="POST">
                @csrf
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="searchQuery">
                <button class="btn btn-outline-light" type="submit">Search</button>
                
            </form>
            <div class="ms-3">
                @if (!session('ID'))
                    <a href="{{ route('login') }}" class="btn btn-light rounded-4">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-light rounded-4">Sign Up</a>
                @else
                    @if (session('UserRole') === 'admin')
                        <a href="{{ route('admin.dashboard') }}" class="btn btn-light rounded-4">Dashboard</a>
                    @elseif (session('UserRole') === 'agent')
                        <a href="{{ route('agent.dashboard') }}" class="btn btn-light rounded-4">Dashboard</a>
                    @else
                        <a href="{{ route('dashboard') }}" class="btn btn-light rounded-4">Dashboard</a>
                    @endif
                @endif
            </div>
        </div>
    </div>
</nav>
