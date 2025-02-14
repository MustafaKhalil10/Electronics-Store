@extends('layout.front')

@section('title')
    Online Store - Home
@endsection

@section('content')
    <div class="slider">
        <div class="container">

            <!-- Swiper -->
            <div class="slide-swp mySwiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <a href="#"><img src="{{ asset('front/img/banner_home1.png') }}" alt=""></a>
                    </div>
                    <div class="swiper-slide">
                        <a href="#"><img src="{{ asset('front/img/banner_home2.png') }}" alt=""></a>
                    </div>
                </div>
                <div class="swiper-pagination"></div>
            </div>

            <div class="banner_2">
                <a href="#"><img src="{{ asset('front/img/banner_home3.png') }}" alt=""></a>
            </div>
        </div>
    </div>


    <div class="banners_4">
        <div class="container">
            <div class="box">
                <a href="#" class="link_btn"></a>
                <img src="{{ asset('front/img/banner3_1.png') }}" alt="">
                <div class="text">
                    <h5>Break Disc</h5>
                    <h5>deals on this</h5>
                    <div class="sale">
                        <p>Up <br> To</p>
                        <span>70%</span>
                    </div>
                    <h6>Shop Now</h6>
                </div>
            </div>

            <div class="box">
                <a href="#" class="link_btn"></a>
                <img src="{{ asset('front/img/banner3_2.png') }}" alt="">
                <div class="text">
                    <h5>Break Disc</h5>
                    <h5>deals on this</h5>
                    <div class="sale">
                        <p>Up <br> To</p>
                        <span>70%</span>
                    </div>
                    <h6>Shop Now</h6>
                </div>
            </div>

            <div class="box">
                <a href="#" class="link_btn"></a>
                <img src="{{ asset('front/img/banner3_3.png') }}" alt="">
                <div class="text">
                    <h5>Break Disc</h5>
                    <h5>deals on this</h5>
                    <div class="sale">
                        <p>Up <br> To</p>
                        <span>70%</span>
                    </div>
                    <h6>Shop Now</h6>
                </div>
            </div>

            <div class="box">
                <a href="#" class="link_btn"></a>
                <img src="{{ asset('front/img/banner3_4.png') }}" alt="">
                <div class="text">
                    <h5>Break Disc</h5>
                    <h5>deals on this</h5>
                    <div class="sale">
                        <p>Up <br> To</p>
                        <span>70%</span>
                    </div>
                    <h6>Shop Now</h6>
                </div>
            </div>

        </div>
    </div>

    <div class="slider_products slide">
        <div class="container">
            <div class="slide_product mySwiper">
                <div class="top_slide">
                    <h2><i class="fa-solid fa-tags"></i> Hot Deals</h2>
                </div>
                <div class="products swiper-wrapper" id="swiper_items_sale"></div>
                <div class="swiper-button-next btn_Swip"></div>
                <div class="swiper-button-prev btn_Swip"></div>
            </div>
        </div>
    </div>


    <!------ banners_box ------->

    @foreach ($categories as $category)
        <div class="banners">
            <div class="container">
                <div class="banners_box">
                    @foreach ($category->products as $product)
                        <div class="box">
                            <a href="{{ route('product.show', $product->id) }}">
                                <img src="{{ asset('front/img/banner3_1.png') }}" alt="">
                                <div class="text">
                                    <h5>{{ $product->name }}</h5>
                                    <div class="rating">
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($i <= $product->rating)
                                                ⭐
                                            @else
                                                ☆
                                            @endif
                                        @endfor
                                    </div>
                                    <div class="product-price">{{ $product->price }}$ /
                                        <span class="product-discount">{{ $product->compare_price }}$</span>
                                    </div>
                                    <div class="sale">
                                        <p>Up <br> To</p>
                                        <span>{{ intval((($product->compare_price - $product->price) / $product->compare_price) * 100) }}%</span>
                                    </div>
                                    <h6>Shop Now</h6>
                            </a>

                            <!-- زر الإضافة إلى المفضلة -->
                            <form
                                action="@if ($product->favorite_product) {{ route('favorites.destroy', $product->id) }} @else {{ route('favorites.store') }} @endif"
                                method="POST" class="mt-2">
                                @csrf
                                @if ($product->favorite_product)
                                    @method('DELETE')
                                @endif
                                <input type="text" name="product_Id" hidden value="{{ $product->id }}">
                                <button type="submit" class=" text-white py-1 rounded">
                                    @if ($product->favorite_product)
                                        <h4>ازالة من المفضلة ❌</h4>
                                    @else
                                        <h4>اضافة للمفضلة ❤️</h4>
                                    @endif
                                </button>
                            </form>
                        </div>
                </div>
    @endforeach

    </div>
    </div>
    </div>

    <div class="slider_products slide">
        <div class="container">
            <div class="slide_product mySwiper">
                <div class="top_slide">
                    <h2><i class="fa-solid fa-tags"></i>{{ $category->name }}</h2>
                </div>
                <div class="products swiper-wrapper" id="swiper_elctronics"></div>
                <div class="swiper-button-next btn_Swip"></div>
                <div class="swiper-button-prev btn_Swip"></div>
            </div>
        </div>
    </div>
    @endforeach
@endsection

@push('styles')
@endpush

@push('scripts')
@endpush
