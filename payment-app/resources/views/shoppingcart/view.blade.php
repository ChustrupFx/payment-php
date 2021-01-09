@extends('layouts.main.root')
@section('head')

    <script src="https://js.stripe.com/v3/"></script>


@endsection
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
                <button class="btn btn-success" id="checkout-btn">Finalizar compra</button>
            </div>
        </div>
    </div>

@endsection
@section('scripts')

    <script>
        const stripe = Stripe('{{ env('STRIPE_KEY') }}')
        const checkoutBtn = $('#checkout-btn')

        checkoutBtn.click(async () => {
            try {

                const checkoutResponse = await fetch('{{ route('checkout.do') }}', {
                    headers: {
                        "Content-Type": "application/json"
                    },
                    method: 'POST',
                })

                const data = await checkoutResponse.json()

                const result = stripe.redirectToCheckout({ sessionId: data.id })

                if (result.error) {
                    console.log(error)
                }
            } catch {
                console.log(error)
            }
        })
    </script>

@endsection
