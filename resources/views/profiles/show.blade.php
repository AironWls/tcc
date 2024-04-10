@extends('template.layout')

@section('content')
    @include('template.subviews.breadcrumb', ['model' => 'Perfil', 'action' => 'Listar'])

    @include('template.subviews.validations')

    <div class="container">
        <div class="card rounded-0">
            <div class="card-header">Visualizar Perfil</div>
            <div class="card-body">
                <p><span class="fw-bold">ID:</span> {{ $profile->id }}</p>
                <p><span class="fw-bold">Nome:</span> {{ $profile->name }}</p>
                <p><span class="fw-bold">Status:</span> {{ $profile->status ? 'Ativo' : 'Inativo' }}</p>
                <p><span class="fw-bold">Criado em:</span> {{ $profile->created_at }}</p>
                <p><span class="fw-bold">Atualizado em:</span> {{ $profile->updated_at }}</p>
                <table class="table table-sm table-striped table-borderless">
                    <caption>Lista de Roles associadas</caption>
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>NOME</th>
                            <th>EXCLUIR</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($profile->roles()->paginate(10) as $r)
                            <tr>
                                <td>{{ $r->id }}</td>
                                <td>{{ $r->name }}</td>
                                <td><button class="btn btn-sm btn-danger rounded-0"></button></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <a title="Listar perfis" class="btn btn-sm btn-secondary rounded-0" href="{{ route('profiles.index') }}"><i
                        class="bi bi-list"></i></a>
                <a title="Editar perfil" class="btn btn-sm btn-secondary rounded-0"
                    href="{{ route('profiles.edit', $profile->id) }}"><i class="bi bi-pencil"></i></a>
            </div>
        </div>
    </div>
@endsection
