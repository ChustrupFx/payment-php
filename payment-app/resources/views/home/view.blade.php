@extends('layouts.main.root')
@section('content')

    <section class="container">
        <h1>Produtos</h1>

        <div class="row">

            @foreach($products as $product)
                <div class="col-6 col-lg-3 px-1 col-md-4 col-sm-6 mb-2">
                    <div class="mx-1 border rounded py-2">
                        <img class="img-fluid" src="{{ $product->image }}"
                             alt="camista preta">
                        <h3>{{ $product->title }}</h3>
                        <p class="text-dark">{{ $product->description }}</p>
                        <a href="{{ route('product.show', ['slug' => $product->slug]) }}" class="btn btn-primary">Comprar <br> R${{ $product->price }},00</a>
                    </div>
                </div>
            @endforeach

        </div>
    </section>

@endsection