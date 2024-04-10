@extends('template.layout')

@section('content')

    @include('template.subviews.validations')

    <div class="container">
        <div class="card rounded-0">
            <div class="card-header">Esqueci a senha</div>
            <div class="card-body">
                <form action="{{ route('password.email') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="email" class="form-control form-control-sm" id="email" name="email" placeholder="Digite o email cadastrado" value="{{ old('email') ?? '' }}" required>
                    </div>
                    <button class="btn btn-sm btn-primary rounded-0"> Enviar e-mail <i class="bi bi-send"></i></button>
                </form>
            </div>
            <div class="card-footer">
                <a href="{{ route('login') }}" class="btn btn-sm btn-secondary rounded-0" title="Login"> Login <i class="bi bi-box-arrow-in-right"></i></a>
            </div>
        </div>
    </div>

@endsection
