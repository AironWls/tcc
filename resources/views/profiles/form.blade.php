<form action="{{ $action }}" method="POST">
    @csrf
    @if( $update)
        @method('PUT')
    @endif
    <div class="mb-3">
        <label for="name" class="form-label">Nome</label>
        <input type="text" name="name" id="name" class="form-control form-control-sm rounded-0" value="{{ old('name') ?? $profile->name ?? ''}}" placeholder="Nome do perfil" required autofocus>
    </div>
    <button class="btn btn-sm btn-primary rounded-0"><i class="bi bi-plus"></i> Salvar</button>
</form>
