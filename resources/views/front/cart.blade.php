@extends('layout.front')

@section('title')
    Online Store - Cart
@endsection

@section('content')
    <!-- Shopping Cart -->
    <x-messages.alert type="success" />

    <div class="shopping-cart section py-10 bg-gray-100">
        <div class="container mx-auto px-4">
            <div class="flex flex-col gap-6">
                <!-- Shopping Summary -->
                <div class="bg-white shadow-lg rounded-lg p-6">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-200 text-gray-700">
                                <th class="p-3">PRODUCT</th>
                                <th class="p-3">NAME</th>
                                <th class="p-3 text-center">UNIT PRICE</th>
                                <th class="p-3 text-center">QUANTITY</th>
                                <th class="p-3 text-center">TOTAL</th>
                                <th class="p-3 text-center"><i class="fa-solid fa-trash"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                                <tr class="border-b">
                                    <td class="p-3">
                                        {{-- <img src="{{ asset('{{ $item->product->image ?? 'https://via.placeholder.com/100x100' }}') }}"
                                        alt="{{ $item->product->name }}" class="w-16 h-16 object-cover rounded-md"> --}}
                                        <img src="{{ asset('front/img/banner_home2.png') }}"
                                            class="w-16 h-16 object-cover rounded-md" alt="">
                                    </td>
                                    <td class="p-3">
                                        <p class="text-gray-900 font-semibold">{{ $item->product->name }}</p>
                                        <p class="text-gray-500 text-sm">Awesome product details...</p>
                                    </td>
                                    <td class="p-3 text-center text-gray-900">${{ $item->product->price }}</td>
                                    <td class="p-3 text-center">
                                        <form action="{{ route('cart.update', $item->id) }}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <div class="flex items-right gap-2">
                                                <input type="number" name="quantity" value="{{ $item->quantity }}"
                                                    class="w-16 text-center border border-gray-300 rounded-md p-1 ml-10">
                                                <button type="submit"
                                                    class="bg-blue-500 text-white px-3 py-1 rounded-md">Update</button>
                                            </div>
                                        </form>
                                    </td>
                                    <td class="p-3 text-center font-semibold text-gray-900">
                                        ${{ $item->quantity * $item->product->price }}
                                    </td>
                                    <td class="p-3 text-center">
                                        <form action="{{ route('cart.destroy', $item->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit">
                                                <i class="fa-solid fa-trash text-red-500 hover:text-red-700"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Total Amount -->
                <div class="bg-white shadow-lg rounded-lg p-6 flex flex-col md:flex-row justify-between items-center">
                    <div class="mb-4 md:mb-0">
                        <p class="text-xl font-semibold">Cart Subtotal: <span
                                class="text-blue-600">${{ $total }}</span></p>
                        <p class="text-gray-500">Shipping: <span class="font-semibold">Free</span></p>
                    </div>
                    <div class="flex gap-4">
                        <a href="{{ route('checkout.index') }}"
                            class="bg-green-500 text-white px-5 py-2 rounded-md hover:bg-green-600">Checkout</a>
                        <a href="{{ route('front.home') }}"
                            class="bg-gray-300 text-gray-700 px-5 py-2 rounded-md hover:bg-gray-400">Continue Shopping</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



@push('styles')
    <style>
        /* alert */
        .al-su {
            margin: 0 100px;
        }
        .shopping-cart{
            position: relative;
            z-index: 5;
        }
    </style>
@endpush

@push('scripts')

@endpush
