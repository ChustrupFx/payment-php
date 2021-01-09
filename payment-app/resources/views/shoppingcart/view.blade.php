@extends('layouts.main.root')
@section('content')

    @if(session('success'))

        <div class="modal show-by-default">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <p>{{ session('success') }}</p>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-danger" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>

    @endif

    <div class="container">
        <div class="border border-dark">
            @foreach($cartContent as $item)

                <div class="row">
                    <div class="col">
                        <img class="img-fluid" src="{{ $item->product->image  }}">
                    </div>
                    <div class="col">
                        <h3>{{ $item->product->title }}</h3>
                        <h4>R${{ $item->product->price }},00</h4>
                        <div class="d-flex justify-content-between">
                            <form method="post" action="{{ route('shoppingcart.deleteItem', ['id' => $item->id]) }}">
                                @csrf
                                @method('DELETE')

                                <input type="submit" value="Excluir" class="btn btn-danger">
                            </form>
                        </div>
                    </div>
                </div>

            @endforeach
            <div class="d-flex justify-content-between">
                <h3>Total: R${{ $cartTotalPrice }},00</h3>
                <a href="{{ route('checkout.show') }}" class="btn btn-success">Finalizar compra</a>
            </div>
        </div>
    </div>

@endsection
