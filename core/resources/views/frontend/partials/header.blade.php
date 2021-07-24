<header class="header-area fixed-top" id="f-header">
    <nav class="navbar navbar-expand-md">
        <div class="container">
            <a href="{{ route('index') }}" class="nav-top-log nav-logo">
                <img src="{{ asset('assets/frontend/img/dcotrak.png') }}" alt="logo">
            </a>
            <a href="{{ route('index') }}" class="fixed-logo nav-logo">
                <img src="{{ asset('assets/frontend/img/dcotrak.png') }}" alt="logo">
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
                <i class="fas fa-times"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="main-nav ml-auto">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('index') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('about') }}">About </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('contact') }}">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#collaborator">Collaborator</a>
                        </li>
                        <li class="nav-item d-flex align-items-center justify-content-center">
                            <a class="nav-link custom-btn log-in-btn" href="{{ route('admin.login') }}">Login</a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>

    </nav>
</header>
