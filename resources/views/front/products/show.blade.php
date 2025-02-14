@extends('layout.front')

@section('title')
    Online Store - Product-Show
@endsection

@section('content')
    <div class="container mx-auto px-4 py-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-16 mb-16">

            <div>
                <img src="{{ asset($product->image ? $product->image : 'product_image.png') }}"
                    class="w-full h-96 object-cover rounded-lg shadow-md">
            </div>

            <div class="space-y-4">
                <h2 class="text-2xl font-bold">{{ $product->name }}</h2>
                <!---- alert-success ---->
                <x-messages.alert type="success" />

                <div class="flex items-center">
                    <span class="text-yellow-500 text-xl">⭐ ⭐ ⭐ ⭐ ☆</span>
                    <span class="ml-2 text-gray-600">({{ rand(50, 200) }} Reviews)</span>
                </div>

                <div class="text-lg font-bold text-green-500">{{ $product->price }} $ / <span
                        class="product-discount">{{ $product->compare_price }}$</span></div>
                <p class="text-gray-600">{{ $product->description }}</p>

                <div class="flex items-center space-x-8">

                    <div>
                        <h3 class="font-semibold pb-2">Available | Options</h3>
                        <div class="flex space-x-2">
                            <span class="w-8 h-8 bg-blue-500 rounded-full cursor-pointer"></span>
                            <span class="w-8 h-8 bg-orange-500 rounded-full cursor-pointer"></span>
                            <span class="w-8 h-8 bg-green-500 rounded-full cursor-pointer"></span>
                        </div>
                    </div>

                    <div>
                        <h3 class="font-semibold"> Size :</h3>
                        <div class="flex space-x-2">
                            <button class="border px-4 py-2 rounded">S</button>
                            <button class="border px-4 py-2 rounded">M</button>
                            <button class="border px-4 py-2 rounded">L</button>
                            <button class="border px-4 py-2 rounded">XL</button>
                            <button class="border px-4 py-2 rounded">XXL</button>
                        </div>
                    </div>

                </div>

                <!----form-add to cart----->
                <form action="{{ route('cart.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <div>
                        <h3 class="font-semibold">Quantity</h3>
                        <div class="flex items-center space-x-4">
                            <div>
                                <button class="border px-4 py-2 rounded bg-gray-200">-</button>
                                <input id="quantity" name="quantity" type="number" value="1" min="1"
                                    class="border px-4 py-2 rounded text-center w-14">
                                <button class="border px-4 py-2 rounded bg-gray-200">+</button>
                            </div>
                            <div> <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded-lg shadow ml-5">Add
                                    to
                                    Cart</button>
                                <button class="border px-4 py-3 rounded-lg shadow">❤️</button>
                                <button class="border px-4 py-3 rounded-lg shadow">🔍</button>
                            </div>

                        </div>
                    </div>
                    <form />
                    <p class="text-gray-500">Category: {{ $product->category->name }}</p>
                    <p class="text-gray-500">Availability: Products In Stock</p>
            </div>
        </div>
    </div>
@endsection


@push('styles')
    <style>
        .product-discount {
            font-size: 15px;
            color: #e74c3c;
            text-decoration: line-through;
        }
    </style>
@endpush

@push('scripts')
    <script></script>
@endpush
