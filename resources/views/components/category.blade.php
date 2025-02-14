
<div class="select_box">
    <select id="category_name" name="category_name">
        @foreach ($categories as $category)
            <option value="{{ $category->name }}" @selected(request('category_name') == $category->name)>{{ $category->name }}</option>
        @endforeach
    </select>
</div>

