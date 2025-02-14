@props([])

<div class="sidebar-header mt-4">
    <h3 class="flex items-center">
        <img src="{{ asset('img/logo.jpg') }}" style="border-radius: 50px;" class="img-fluid rounded-full mr-3" />
        <span> admi</span>
    </h3>
</div>
<br>
<hr style="background-color: #fff">

<ul class="list-unstyled component m-0">

    @foreach ($items as $item)
        <li class="{{ $active == $item['route'] ? 'active' : '' }}">
            <a href="{{ route($item['route']) }}" class=""><i
                    class="material-icons">{{ $item['icon'] }}</i>{{ $item['title'] }}</a>
        </li>
    @endforeach

</ul>
