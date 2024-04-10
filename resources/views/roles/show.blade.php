@extends('template.layout')

@section('content')
    @include('template.subviews.breadcrumb', ['model' => 'Role', 'action' => 'Listar'])

    @include('template.subviews.validations')

    <div class="container">
        <div class="card rounded-0">
            <div class="card-header">Visualizar Role</div>
            <div class="card-body">
                <p><span class="fw-bold">ID:</span> {{ $role->id }}</p>
                <p><span class="fw-bold">Nome:</span> {{ $role->name }}</p>
                <p><span class="fw-bold">Status:</span> {{ $role->status ? 'Ativo' : 'Inativo' }}</p>
                <p><span class="fw-bold">Criado em:</span> {{ $role->created_at }}</p>
                <p><span class="fw-bold">Atualizado em:</span> {{ $role->updated_at }}</p>
            </div>
            <div class="card-footer">
                <a title="Listar perfis" class="btn btn-sm btn-secondary rounded-0" href="{{ route('roles.index') }}"><i
                        class="bi bi-list"></i></a>
                <a title="Editar Role" class="btn btn-sm btn-secondary rounded-0"
                    href="{{ route('roles.edit', $role->id) }}"><i class="bi bi-pencil"></i></a>
            </div>
        </div>
    </div>
@endsection
