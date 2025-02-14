@props(['type'])

@if (session()->has($type))
    @if ($type == 'info')
        <div class="alert alert-danger m-3 ml-5">
            {{ session($type) }}
        </div>
    @else
        <div class="alert alert-success m-3 ml-5 al-su">
            {{ session($type) }}
        </div>
    @endif
@endif
