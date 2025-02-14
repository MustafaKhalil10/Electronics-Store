@props(['name', 'options' => [], 'checked' => null])

<div class="form-group">
    @if ($name)
        <label for="">{{ $name }}</label>
    @endif
    @foreach ($options as $value => $lable)
        <div class="form-check">
            <input class="form-check-input" type="radio" name="{{ $name }}" value="{{ $value }}"
                {{ old($name, $checked) == $value ? 'checked' : '' }}>

            <label class="form-check-label">
                {{ $lable }}
            </label>
        </div>
    @endforeach
</div>
