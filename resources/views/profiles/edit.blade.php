@extends('template.layout')

@section('content')

@include('template.subviews.validations')

<div class="container">
    <div class="card">
        <div class="card-header">Cadastrar Perfil</div>
        <div class="card-body">
            @include('profiles.form', ['action' => route('profiles.update', $profile), 'update' => true])
        </div>
        <div class="card-footer">
            <a class="btn btn-sm btn-secondary rounded-0" href="{{ route('profiles.index')}}"><i class="bi bi-list"></i></a>
        </div>
    </div>
</div>

@endsection
