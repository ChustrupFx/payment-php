@extends('layouts.main.root')
@section('content')

    <div class="vw-100 vh-100 d-flex justify-content-center align-items-center">

        <div class="card">
            <div class="card-title">
                <h1>Login</h1>
                @error('failed')

                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>

                @enderror
            </div>
            <div class="card-body">
                <form action="{{ route('login.do') }}" method="post">
                    
                    @csrf
                    <label for="">Email</label>
                     <input type="email" name="email" value="{{ old('email') }}" placeholder="Email" class="form-control">

                    <label for="">Senha</label>
                    <input type="password" name="password" placeholder="Senha" class="form-control">

                    <input type="submit" class="btn btn-success">

                </form>
            </div>
        </div>

    </div>

@endsection