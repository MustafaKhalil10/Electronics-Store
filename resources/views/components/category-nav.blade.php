<div class="category_nav">
    <div onclick="Open_Categ_list()" class="category_btn">
        <i class="fa-solid fa-bars"></i>
        <p>Browse Category</p>
        <i class="fa-solid fa-angle-down"></i>
    </div>
    <div class="category_nav_list">
        @foreach ($categories as $category)
            <a href="#">{{ $category->name }}</a>
        @endforeach
    </div>
</div>
