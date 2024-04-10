@extends('template.layout')

@section('content')

    @include('template.subviews.form-search', ['action' => route('profiles.index')])

    @include('template.subviews.form-action')

    @include('template.subviews.message')

    @include('template.subviews.breadcrumb', ['model' => 'Perfil', 'action' => 'Listar'])

    <div class="container">


        <div class="table-responsive">
            <table class="table table-sm table-borderless table-striped table-hover">
                <caption>Lista de Perfis</caption>
                <thead class="table-dark">
                    <tr>
                        <th><input type="checkbox" class="form-check-input rounded-0" data-checkbox-toggle></th>
                        <th>ID</th>
                        <th>NOME</th>
                        <th>STATUS</th>
                        <th>AÇÕES</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($list as $item)
                        <tr>
                            <td><input type="checkbox" class="form-check-input rounded-0" data-checkboxes-id={{ $item->id }}></td>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>
                                @if ($item->status)
                                    <button type="button" class="btn btn-sm btn-success rounded-0" aria-label="Ativo"
                                        title="Ativo" data-button-status><i class="bi bi-hand-thumbs-up"></i></button>
                                @else
                                    <button type="button" class="btn btn-sm btn-warning rounded-0" aria-label="Inativo"
                                        title="Inativo" data-button-status><i class="bi bi-hand-thumbs-down"></i></button>
                                @endif
                            </td>
                            <td>
                                <div class="btn-group btn-group-sm" role="group" aria-label="Botões de ação">
                                    <a href="{{ route('profiles.show', $item->id) }}" class="btn btn-info rounded-0"><i class="bi bi-eye"></i></a>
                                    <a href="{{ route('profiles.edit', $item->id) }}" class="btn btn-default rounded-0"><i class="bi bi-pencil"></i></a>
                                    <button data-button-delete type="button" class="btn btn-danger rounded-0"><i class="bi bi-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="container">
        {{ $list->links() }}
    </div>

    <div class="container">
        <a href="{{ route('profiles.create' )}}" class="btn btn-sm btn-primary rounded-0"><i class="bi bi-plus"></i> Adicionar</a>
    </div>

    @push('scripts')
        <script src="{{ asset('checkboxToggle.js') }}"></script>
        <script src="{{ asset('delete.js') }}" type="module"></script>
        <script src="{{ asset('status.js') }}" type="module"></script>
    @endpush
@endsection
