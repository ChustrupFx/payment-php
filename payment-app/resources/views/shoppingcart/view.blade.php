@extends('layouts.main.root')
@section('content')

    <div class="container">
        <div class="border border-dark">
            @foreach($cardContent as $product)

                <div class="row">
                    <div class="col">
                        <img src="{{ $product->image }}">
                    </div>
                </div>

            @endforeach
        </div>
    </div>

@endsection