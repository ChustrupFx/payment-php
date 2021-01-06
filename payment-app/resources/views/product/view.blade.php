@extends('layouts.main.root')
@section('content')

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
                    <button class="btn btn-success">Adicionar ao carrinho</button>
                </div>
            </div>
            
        </div>
    </section>

@endsection