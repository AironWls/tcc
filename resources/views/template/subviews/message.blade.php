@if (session('message'))
    <div class="container">
        <div class="alert {{ session('alert-class') ?? 'alert-success' }} alert-dismissible fade show" role="alert">
            {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
@endif
