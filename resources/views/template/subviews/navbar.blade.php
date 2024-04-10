<nav class="navbar navbar-expand-lg bg-body-tertiary mb-3">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">{{ env('APP_NAME') }}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('profiles.index') }}">Perfis</a>
                </li>
                <li class="nav-item">
                    <button class="nav-link" id="btnLogout" href="{{ route('logout') }}">Sair</button>
                </li>
            </ul>
        </div>
    </div>
</nav>
