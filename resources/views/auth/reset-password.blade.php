@extends('template.layout')

@section('content')

    @include('template.subviews.validations')

    <div class="container">
        <div class="card">
            <div class="card-header">Redefinir a senha</div>
            <div class="card-body">
                <form action="{{ route('password.update') }}" method="POST">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    <div class="mb-3">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="email" class="form-control form-control-sm rounded-0" id="email" name="email" placeholder="Digite o email cadastrado" value="{{ old('email') ?? '' }}" required autofocus>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Senha</label>
                        <input type="password" class="form-control form-control-sm rounded-0" id="password" name="password" placeholder="Digite o password cadastrado" value="{{ old('password') ?? '' }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Repita a senha</label>
                        <input type="password" class="form-control form-control-sm rounded-0" id="password_confirmation" name="password_confirmation" placeholder="Digite o email cadastrado" required>
                    </div>
                    <button class="btn btn-sm btn-primary rounded-0"> Salvar alteração <i class="bi bi-floppy"></i></button>
                </form>
            </div>
            <div class="card-footer">
                <a href="{{ route('login') }}" class="btn btn-sm btn-secondary rounded-0" title="Login"> Login <i class="bi bi-box-arrow-in-right"></i></a>
            </div>
        </div>
    </div>

@endsection
