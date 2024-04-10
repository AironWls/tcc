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
                    <a class="nav-link active" aria-current="page" href="{{ route('welcome') }}">Home <i class="bi bi-house-door"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('profiles.index') }}">Perfis <i class="bi bi-person-badge"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('roles.index') }}">Roles <i class="bi bi-gear"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('users.index') }}">Usuários <i class="bi bi-person"></i></a>
                </li>
                <li class="nav-item">
                    <button type="button" class="nav-link" id="btnLogout">Sair <i class="bi bi-box-arrow-right"></i></button>
                </li>
            </ul>
        </div>
    </div>
</nav>


@push('scripts')
    <script src="{{ asset('logout.js') }}" type="module"></script>
@endpush
