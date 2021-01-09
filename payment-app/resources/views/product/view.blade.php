@extends('layouts.main.root')
@section('content')

    @if(session('success'))

        <div class="modal show-by-default">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="alert alert-success">
                            <p>O produto foi adicionado ao seu carrinho de compras!</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-danger" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>

    @endif

    <section class="container">
        <div class="row">
            
            <div class="col-12 col-sm-12 col-md-12 col-lg-6 product-image">
                <img class="img-fluid" src="{{ $product->image }}">
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-6 d-flex flex-column justify-content-center">
                <h1>{{ $product->title }}</h1>
                <p>{{ $product->description }}</p>
                <h3>R${{ $product->price }},00</h3>
                <div>
                    <form action="{{ route('shoppingcart.store', ['id' => $product->id]) }}" method="post">
                        @csrf
                        <button class="btn btn-success">Adicionar ao carrinho</button>
                    </form>
                </div>
            </div>
            
        </div>
    </section>

@endsection