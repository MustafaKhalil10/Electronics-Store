@props(['name', 'lable' => null, 'value'=> null])

<div class="form-group">
    @if ($lable)
        <label for="">{{ $lable }}</label>
    @endif
    <textarea name="{{ $name }}" id="" cols="30" rows="10"
        class="form-control @error($name)is-invalid @enderror">
        {{ old($name, $value) }} </textarea>
    @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
