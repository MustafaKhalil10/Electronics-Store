@extends('layout.front')

@section('title')
    Online Store - Order
@endsection

@section('content')
    <a href="{{ route('orders.index') }}" class="btn btn-primary mx-2 pl-5 pr-5 mr-4 mt-3 ml-5 aa">orders</a>
    <div class="bg-white shadow-lg rounded-lg p-6">
        <h1 class="text-2xl font-semibold text-gray-900 mb-6">تفاصيل الطلب :</h1>

        <table class="w-full text-center border-collapse mb-6">
            <thead>
                <tr class="bg-gray-200 text-gray-700">
                    <th class="p-3">type</th>
                    <th class="p-3">first_name</th>
                    <th class="p-3">last_name </th>
                    <th class="p-3"> - </th>
                    <th class="p-3">product_name</th>
                    <th class="p-3">price</th>
                    <th class="p-3">quantity </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order->addresses as $address)
                    <tr class="border-b">
                        <td class="p-3">{{ $address->type }}</td>
                        <td class="p-3">{{ $address->first_name }}</td>
                        <td class="p-3">{{ $address->last_name }}</td>
                        <td class="p-3"> - </td>
                        @foreach ($order->orderitems as $item)
                            <td class="p-3">{{ $item->product_name }}</td>
                            <td class="p-3 text-red-600">{{ $item->price }}</td>
                            <td class="p-3">{{ $item->quantity }}</td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@push('styles')
    <style>
        .aa {
            width: 100px;
            border-radius: 8px;
        }
    </style>
@endpush

@push('scripts')
    <script></script>
@endpush
