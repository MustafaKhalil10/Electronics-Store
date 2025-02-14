@extends('layout.front')

@section('title')
    Online Store - Order
@endsection

@section('content')

    <div class="bg-white shadow-lg rounded-lg p-6">
        <h1 class="text-2xl font-semibold text-gray-900 mb-6">الطلبات :</h1>
        <table class="w-full text-center border-collapse mb-6">
            <thead>
                <tr class="bg-gray-200 text-gray-700">
                    <th class="p-3">رقم الطلب</th>
                    <th class="p-3">طريقة الدفع</th>
                    <th class="p-3">حالة الطلب</th>
                    <th class="p-3">تفاصيل الطلب</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr class="border-b">
                        <td class="p-3">{{ $order->number }}</td>
                        <td class="p-3">{{ $order->payment_method }}</td>
                        <td class="p-3">
                            <span class="inline-block px-3 py-1 rounded-md">
                                {{ $order->status }}
                            </span>
                        </td>
                        <td class="p-3"><a class="inline-block px-3 py-1 rounded-md bg-blue-300"
                                href="{{ route('orders.show', $order->id) }}">عرض تفاصيل الطلب</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@push('styles')
    <style>

    </style>
@endpush

@push('scripts')
    <script></script>
@endpush
