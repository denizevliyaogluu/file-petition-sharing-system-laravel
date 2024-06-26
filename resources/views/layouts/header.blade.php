<header class="bg-dark py-3">
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <div class="container">
        <div class="row justify-content-between align-items-center">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('upload/logo.png') }}" alt="Your Logo" style="height: 50px;">
            </a>
            <div class="col-auto">
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                    <div class="container">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('web.files.index') }}">Files</a>
                                </li>
                                @if (Auth::check())
                                    @if (Auth::user()->role == 'admin')
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('admin.files.index') }}">File Management</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('admin.filecategories.index') }}">Category Management</a>
                                        </li>
                                    @endif
                                @endif
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
            <div class="col-auto">
                @if (Auth::check())
                    <div class="text-light mt-2">
                        <a href="#" style="color: white"><i class="fas fa-user-circle mr-1"></i>{{ Auth::user()->name }}</a> |
                        <a href="{{ route('logout') }}" class="text-light"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log Out</a>
                    </div>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-light">Login</a>
                    <span class="text-light mx-2">|</span>
                    <a href="{{ route('register') }}" class="text-light">Register</a>
                @endif
            </div>
        </div>
    </div>
</header>
