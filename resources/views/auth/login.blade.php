@extends('template.layout')

@section('content')

    <div class="container">
        <div class="card rounded-0">
            <div class="card-header">
                Acessar Sistema
            </div>
            <div class="card-body">
                <form action="{{ route('authenticate') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="email" class="form-control form-control-sm rounded-0" id="email" name="email" placeholder="Digite email cadastrado" required value="{{ old('email') ?? '' }}" autofocus>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Senha</label>
                        <input type="password" class="form-control form-control-sm rounded-0" id="password" name="password" placeholder="Digite password cadastrado" required value="{{ old('email') ?? '' }}">
                    </div>
                    <button class="btn btn-sm btn-primary rounded-0"> Acessar <i class="bi bi-box-arrow-in-right"></i></button>
                </form>
            </div>
            <div class="card-footer">
                <a class="btn btn-sm btn-secondary rounded-0" href="{{ route('password.request') }}">Esqueceu a senha ??</a>
            </div>
        </div>
    </div>

@endsection
