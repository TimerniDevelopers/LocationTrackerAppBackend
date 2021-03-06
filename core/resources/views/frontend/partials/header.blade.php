<header class="header-area fixed-top" id="f-header">
    <nav class="navbar navbar-expand-md">
        <div class="container">
            <a href="{{ route('index') }}" class="nav-top-log nav-logo">
                <img src="{{ asset('assets/frontend/img/Dcotrack 3D Logo 3840x2160.png') }}" alt="logo">
            </a>
            <a href="{{ route('index') }}" class="fixed-logo nav-logo">
                <img src="{{ asset('assets/frontend/img/Dcotrack 3D Logo 3840x2160.png') }}" alt="logo">
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
                <i class="fas fa-times"></i>
            </button>

            <?php
                $organizations = App\Models\QuestionCategory::where('status', 1)->orderBy('name', 'asc')->get();
            ?>

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
                            <a href="#" class="nav-link">Organization <span class="fa fa-caret-down"></span></a>
                            <ul class="submenu">
                                @foreach ($organizations as $organization)
                                <li><a href="{{ route('organization',['name'=>str_replace(str_split('/:*?"<>| '), '-', $organization->name)]) }}">{{ $organization->name }}</a></li>
                            @endforeach
                            </ul>
                         </li>
                        <li class="nav-item d-flex align-items-center justify-content-center">
                            <a class="nav-link custom-btn log-in-btn" href="{{ route('user.login') }}">Login</a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>

    </nav>
</header>
