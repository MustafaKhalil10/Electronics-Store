@extends('layout.front')

@section('title')
    Online Store - Favorites
@endsection

@section('content')


    <h1 class="text-2xl font-bold mb-4 px-12">منتجاتك المفضلة :</h1>
    @if ($favorites->isEmpty())
        <h1 class=" px-14 mb-6">ليس لديك منتجات مفضلة بعد.</h1>
    @else
        <div class="banners">
            <div class="container mb">
                <div class="banners_box">
                    @foreach ($favorites as $favorite)
                        <div class="box">
                            <a href="{{ route('product.show', $favorite->product->id) }}">
                                <img src="{{ asset('front/img/banner3_1.png') }}" alt="{{ $favorite->product->name }}">
                                <div class="text">
                                    <h5>{{ $favorite->product->name }}</h5>
                                    <div class="rating">
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($i <= $favorite->product->rating)
                                                ⭐
                                            @else
                                                ☆
                                            @endif
                                        @endfor
                                    </div>
                                    <div class="product-price">{{ $favorite->product->price }}$ /
                                        <span class="product-discount">{{ $favorite->product->compare_price }}$</span>
                                    </div>
                                    <div class="sale">
                                        <span>60%</span>
                                    </div>
                                    <h6>Shop Now</h6>
                            </a>
                            <!-- زر إزالة المنتج من المفضلة -->
                            <form action=" {{ route('favorites.destroy', $favorite->product->id) }}f" method="POST"
                                class="mt-2">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class=" text-white py-1 rounded">
                                    <h4>ازالة من المفضلة ❌</h4>
                                </button>
                            </form>
                        </div>
                </div>
    @endforeach
    </div>
    </div>
    @endif
@endsection

@push('styles')
    <style>
        .mb{
            margin-bottom: 30px;
        }
    </style>
@endpush

@push('scripts')
    <script></script>
@endpush
