@extends('layout.front')

@section('title')
    Online Store - Checkout
@endsection

@section('content')
    <!-- messages -->
    <x-messages.alert type="success" />
    <x-messages.alert type="info" />
    <x-messages.errors />

    <!-- Checkout Section -->
    <section class="w-full bg-gray-100 py-10">
        <div class="container mx-auto px-4 grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Checkout Form -->
            <div class="md:col-span-2 bg-white p-6 rounded-lg shadow-lg">
                <h2 class="text-2xl font-semibold mb-4">Make Your Checkout Here</h2>
                <p class="text-gray-600 mb-6">Please register in order to checkout more quickly</p>

                <form class="form" method="post" action="{{ route('checkout.store') }}">
                    @csrf
                    <!-- Billing Details -->
                    <div>
                        <h3 class="text-lg font-semibold mb-2">Billing Details</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <input type="text" name="address[billing][first_name]" placeholder="First Name *" required
                                class="w-full p-2 border border-gray-300 rounded">
                            <input type="text" name="address[billing][last_name]" placeholder="Last Name *" required
                                class="w-full p-2 border border-gray-300 rounded">
                            <input type="email" name="address[billing][email]" placeholder="Email Address *" required
                                class="w-full p-2 border border-gray-300 rounded col-span-2">
                        </div>
                    </div>

                    <!-- Shipping Details -->
                    <div>
                        <h3 class="text-lg font-semibold mb-2">Shipping Details</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <input type="text" name="address[shipping][first_name]" placeholder="First Name *" required
                                class="w-full p-2 border border-gray-300 rounded">
                            <input type="text" name="address[shipping][last_name]" placeholder="Last Name *" required
                                class="w-full p-2 border border-gray-300 rounded">
                            <input type="email" name="address[shipping][email]" placeholder="Email Address *" required
                                class="w-full p-2 border border-gray-300 rounded col-span-2">
                        </div>
                    </div>

                    <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700">Save
                        Order</button>
                </form>
            </div>

            <!-- Order Summary -->
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h2 class="text-xl font-semibold mb-4">Cart Totals :</h2>
                <ul class="mb-4 text-gray-700">
                    @foreach ($items as $item)
                        <li class="flex justify-between">{{ $item->product->name }} <span
                                class="text-orange-500">x{{ $item->quantity }} ->
                                ${{ $item->quantity * $item->product->price }}</span></li>
                    @endforeach
                    <hr>
                    <li class="flex justify-between font-semibold text-lg mt-2">Total <span
                            class="text-red-500">${{ $total }}</< /span>
                    </li>
                </ul>
                <h2 class="text-xl font-semibold mb-3 mt-6">Payments :</h2>
                <div class="space-y-2 mt-6">
                    <label class="flex items-center text-orange-500">
                        <input type="checkbox" class="mr-2"> Flutterwave
                    </label>
                    <label class="flex items-center text-orange-500">
                        <input type="checkbox" class="mr-2"> PayPal
                    </label>
                </div>
                <button class="w-full bg-green-500 text-white py-2 mt-12 rounded-lg hover:bg-green-600">Proceed to
                    Checkout</button>
            </div>
        </div>
    </section>
@endsection



@push('styles')
    <style>
        /* alert */
        .al-su {
            margin: 0 100px;
        }
    </style>
@endpush

@push('scripts')
    <script></script>
@endpush
