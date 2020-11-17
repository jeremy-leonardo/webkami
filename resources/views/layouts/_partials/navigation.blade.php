<div class="navigation-bar">
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container">
            <a class="navbar-brand" href="/"><img src="{{asset('/images/logo.svg')}}"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item {{ (request()->is('how-it-works')) ? 'active' : '' }}">
                        <a class="nav-link" href="/how-it-works">Cara Kerja</a>
                    </li>
                    <li class="nav-item {{ (request()->is('features')) ? 'active' : '' }}">
                        <a class="nav-link" href="/features">Fitur</a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    @guest
                    <li class="nav-item {{ (request()->is('login')) ? 'active' : '' }}">
                        <a class="nav-link" href="/login">Login</a>
                    </li>
                    <li class="nav-item {{ (request()->is('register')) ? 'active' : '' }}">
                        <a class="nav-link" href="/register">Daftar</a>
                    </li>
                    @endguest
                    @auth
                    <li class="nav-item {{ (request()->is('dashboard')) ? 'active' : '' }}">
                        <a class="nav-link" href="/dashboard">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/logout">Logout</a>
                    </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
</div>
