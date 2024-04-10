@extends('template.layout')

@section('content')

    @include('template.subviews.breadcrumb', ['model' => 'Usuário', 'action' => 'Listar'])

    <div class="container">
        <div class="card rounded-0">
            <div class="card-header">Visualizar Usuário</div>
            <div class="card-body">
                <p><span class="fw-bold">ID:</span> {{ $user->id }}</p>
                <p><span class="fw-bold">Nome:</span> {{ $user->name }}</p>
                <p><span class="fw-bold">Status:</span> {{ $user->status ? 'Ativo' : 'Inativo' }}</p>
                <p><span class="fw-bold">Criado em:</span> {{ $user->created_at }}</p>
                <p><span class="fw-bold">Atualizado em:</span> {{ $user->updated_at }}</p>
                <div class="table-responsive">
                    <table class="table table-sm table-borderless table-striped table-hover">
                        <caption>Lista de Perfis associados</caption>
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>PERFIL</th>
                                <th>EXCLUIR</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($user->profiles()->paginate(10) as $p)
                            <tr>
                                <td>{{ $p->id }}</td>
                                <td>{{ $p->name }}</td>
                                <td><button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                <a title="Listar perfis" class="btn btn-sm btn-secondary rounded-0" href="{{ route('users.index') }}"><i
                        class="bi bi-list"></i></a>
                <a title="Editar Usuário" class="btn btn-sm btn-secondary rounded-0"
                    href="{{ route('users.edit', $user->id) }}"><i class="bi bi-pencil"></i></a>
            </div>
        </div>
    </div>
@endsection
