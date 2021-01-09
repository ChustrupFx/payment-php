@extends('layouts.main.root')
@section('content')

    <div class="w-100 vh-100 d-flex justify-content-center align-items-center">

        <div class="alert alert-success">
            <h1>Pagamento validado com sucesso!</h1>
        </div>

    </div>

@endsection
@section('scripts')

    <script>
        setTimeout(() => {
            window.location = '{{ route('home.show') }}'
        }, 2000)
    </script>

@endsection