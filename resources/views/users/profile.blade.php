@extends('template.layout')

@section('content')
    @include('template.subviews.breadcrumb', ['model' => 'Usuário', 'action' => 'Listar'])

    @include('template.subviews.validations')

    <div class="container">
        <div class="card rounded-0">
            <div class="card-header">Adicionar Perfil ao Usuário {{ $user->name }}</div>
            <div class="card-body">
                <form action="{{ route('users.store_profile_to_user', $user)}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="profile_id" class="form-label">Perfis</label>
                        <select name="profile_id[]" id="profile_id" class="form-select form-select-sm rounded-0" multiple required>
                            <option value="">Selecione</option>
                            @foreach ($profiles as $profile)
                                <option value="{{ $profile->id }}">{{ $profile->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button class="btn btn-sm btn-primary rounded-0"><i class="bi bi-floppy"></i> Salvar</button>
                </form>
            </div>
            <div class="card-footer">
                <a title="Listar usuários" class="btn btn-sm btn-secondary rounded-0" href="{{ route('users.index') }}"><i
                        class="bi bi-list"></i></a>
                <a title="Editar Usuário" class="btn btn-sm btn-secondary rounded-0"
                    href="{{ route('users.edit', $user->id) }}"><i class="bi bi-pencil"></i></a>
            </div>
        </div>
    </div>
@endsection
