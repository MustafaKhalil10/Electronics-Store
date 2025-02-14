<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="icon" href="img/icon.png">

    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">


    <!-- File CSS -->
    <link rel="stylesheet" href="{{ asset('front/CSS/style.css') }}">
    @stack('styles')
</head>

<body>
    <!------ cart ------->
    <x-cart-menu />
    <!------ end cart ------->
    <header>
        <div class="top_header">
            <div class="container">
                <a href="#" class="logo"> <img src="{{ asset('front/img/logo.png') }}" alt=""></a>

                <form action="{{ URL::current() }}" method="get" class="search_box">
                    @csrf
                    <x-category />
                    <input type="text" name="Product_name" id="search" placeholder="Search for Products">
                    <button type="submit">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </form>

                <div class="header_icons">
                    <div class="icon">
                        <a href="{{ route('favorites.index') }}">
                            <i class="fa-regular fa-heart"></i>
                            <span class="count count_favourite">0</span>
                        </a>
                    </div>

                    <div onclick="open_close_cart()" class="icon">
                        <i class="fa-solid fa-cart-shopping"></i>
                        <span class="count count_item_header">0</span>
                    </div>
                </div>
            </div>
        </div>


        <div class="bottom_header">
            <div class="container">
                <nav class="nav">

                    <span onclick="open_Menu()" class="open_menu"><i class="fa-solid fa-bars"></i></span>
                    <!---- category-nav ---->
                    <x-category-nav />

                    <ul class="nav_links">
                        <span onclick="open_Menu()" class="close_menu"><i class="fa-regular fa-circle-xmark"></i></span>
                        <li class="active"><a href="{{ route('front.home') }}">Home</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Accesories</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Contact</a></li>
                        <li class="ml-7"><a href="{{ route('orders.index') }}">Previous Orders</a></li>
                    </ul>
                </nav>

                <div class="login_signup btns">
                    <a href="#" class="btn">Login <i class="fa-solid fa-right-to-bracket"></i></a>

                    <a href="#" class="btn">Sign UP <i class="fa-solid fa-user-plus"></i></a>
                </div>
            </div>
        </div>
    </header>

    <!------main-content-start----------->
    @yield('content')
    <!------main-content-end----------->

    <footer>
        <div class="container">

            <div class="big_row">
                <img class="logo_footer" src="{{ asset('front/img/white_logo.png') }}" alt="">
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sequi, vero?</p>
                <div class="icons_footer">
                    <a href="#"><i class="fa-solid fa-phone"></i></a>
                    <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#"><i class="fa-brands fa-instagram"></i></a>
                    <a href="#"><i class="fa-brands fa-x-twitter"></i></a>
                </div>
            </div>

            <div class="row">
                <h4>Find It Fast</h4>
                <div class="links">
                    <a href="#"><i class="fa-solid fa-caret-right"></i> Laptops & Computers </a>
                    <a href="#"><i class="fa-solid fa-caret-right"></i> Smart Phones & Tablets</a>
                    <a href="#"><i class="fa-solid fa-caret-right"></i> TV & Audio</a>
                    <a href="#"><i class="fa-solid fa-caret-right"></i> Appliances</a>
                    <a href="#"><i class="fa-solid fa-caret-right"></i> Jewelry & Watches</a>
                </div>
            </div>

            <div class="row">
                <h4>Quick Links</h4>
                <div class="links">
                    <a href="#"><i class="fa-solid fa-caret-right"></i> Your Account </a>
                    <a href="#"><i class="fa-solid fa-caret-right"></i> Returns & Exchanges</a>
                    <a href="#"><i class="fa-solid fa-caret-right"></i> Shipping & Delivery</a>
                    <a href="#"><i class="fa-solid fa-caret-right"></i> Estimated Delivery Time</a>
                    <a href="#"><i class="fa-solid fa-caret-right"></i> Purchase Hisotry</a>
                </div>
            </div>
            <div class="row">
                <h4>Service us</h4>
                <div class="links">
                    <a href="#"><i class="fa-solid fa-caret-right"></i> Support Center</a>
                    <a href="#"><i class="fa-solid fa-caret-right"></i> Term & Conditions</a>
                    <a href="#"><i class="fa-solid fa-caret-right"></i> Privacy Policy</a>
                    <a href="#"><i class="fa-solid fa-caret-right"></i> Help</a>
                    <a href="#"><i class="fa-solid fa-caret-right"></i> FAQS</a>
                </div>
            </div>
        </div>

        <div class="bottom_footer">
            <div class="container">
                <p>&copy; <span>Reda Store.</span> All Rights Reserved.</p>

                <div class="payment_img">
                    <img src="{{ asset('front/img/payment_method.png') }}" alt="">
                </div>
            </div>
        </div>
    </footer>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!-- File JS -->
    <script src="front/JS/swiper.js"></script>
    <script src="front/JS/items_home.js"></script>
    <script src="front/JS/main.js"></script>
    @stack('scripts')
</body>

</html>
