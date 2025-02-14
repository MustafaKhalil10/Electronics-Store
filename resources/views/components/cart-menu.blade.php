
    <div class="cart">
        <div class="top_cart">
            <h3>Cart Items : {{ $items->count() }}</h3>
            <span onclick="open_close_cart()" class="close_cart"><i class="fa-regular fa-circle-xmark"></i></span>
        </div>

        <div class="items_in_cart_container">
            @foreach ($items as $item)
                <div class="items_in_carta">
                    <p class="product_name">{{ $item->product->name }}</p>
                    <p class="product_price text-red-500">${{ $item->product->price }}</p>
                    <p class="product_quantity text-blue-500">x{{ $item->quantity }}</p>
                    <form action="{{ route('cart.destroy', $item->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="remove_item" type="submit"><i class="fa-solid fa-trash text-red-500 hover:text-red-700"></i></button>
                        <form />
                </div>
            @endforeach
        </div>

        <div class="bottom_cart">
            <div class="total">
                <p>Subtotal :&nbsp;</p>
                <p class="price_cart_total">${{ $total }}</p>
            </div>

            <div class="button_cart">
                <a href="{{ route('checkout.index') }}" class="btn_cart btn">Checkout</a>
                <a href="{{ route('cart.index') }}" class="btn_cart trans_bg btn">Cart Show</a>
            </div>
        </div>
    </div>
