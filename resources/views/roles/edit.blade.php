@extends('template.layout')

@section('content')

@include('template.subviews.validations')

<div class="container">
    <div class="card">
        <div class="card-header">Editar Role</div>
        <div class="card-body">
            @include('roles.form', ['action' => route('roles.update', $role), 'update' => true])
        </div>
        <div class="card-footer">
            <a class="btn btn-sm btn-secondary rounded-0" href="{{ route('roles.index')}}"><i class="bi bi-list"></i></a>
        </div>
    </div>
</div>

@endsection
