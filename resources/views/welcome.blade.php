@extends('template.layout')

@section('content')
    <div class="container">

        @include('template.subviews.breadcrumb')

        <div class="card rounded-0">
            <div class="card-header">
                Página Inicial
            </div>
            <div class="card-body">
                <p>Seja bem-vindo ao sistema TCC.</p>
            </div>
        </div>

    </div>
@endsection
