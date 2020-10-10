<nav class="navbar navbar-expand-lg navbar-light bg-white">
    <div class="container">
        <a class="navbar-brand" href="/"><img src="{{asset('/images/logo.svg')}}"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item {{ (request()->is('how-it-works')) ? 'active' : '' }}">
                    <a class="nav-link" href="/">Cara Kerja</a>
                </li>
                <li class="nav-item {{ (request()->is('features')) ? 'active' : '' }}">
                    <a class="nav-link" href="/">Fitur</a>
                </li>
            </ul>
        </div>
        <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item {{ (request()->is('login')) ? 'active' : '' }}">
                    <a class="nav-link" href="/login">Login</a>
                </li>
                <li class="nav-item {{ (request()->is('register')) ? 'active' : '' }}">
                    <a class="nav-link" href="/register">Daftar</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
