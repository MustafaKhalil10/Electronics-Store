@extends('layout.dashboard')

@section('title')
    {{ isset($product) ? 'Edit Product' : 'Create Product' }}
@endsection

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Products</a></li>
    <li class="breadcrumb-item active">{{ isset($product) ? 'Edit' : 'Create' }}</li>
@endsection

@section('content')
    <div class="m-5">

        <!--Errors_any-->
        <x-messages.errors />

        <!--form_create_edit_date-->
        <form action="{{ isset($product) ? route('products.update', $product->id) : route('products.store') }}"
            method="post">
            @csrf
            @if (isset($product))
                @method('PUT')
            @endif

            <x-form.input name="name" type="text" label="Product Name"
                value="{{ isset($product) ? $product->name : '' }}" />

            <div class="form-group">
                <label for=""> Store</label>
                <select name="store_id" id="" class="form-control">
                    @foreach ($stores as $store)
                        <option value="{{ $store->id }}" @selected(old('store_id', $product->store_id ?? '') == $store->id)>
                            {{ $store->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <x-form.input name="category_name" type="text" label="Categories Name"
            value="{{ isset($product) ? $product->category->name : '' }}" />

            <x-form.textarea name="description" lable="Description"
                value="{{ isset($product) ? $product->description : '' }}" />

            <x-form.input name="price" type="number" label="price"
                value="{{ isset($product) ? $product->price : '' }}" />

            <x-form.input name="rating" type="number" label="Rating"
                value="{{ isset($product) ? $product->rating : '' }}" />

            <x-form.input name="compare_price" type="number" label="Discount Price"
                value="{{ isset($product) ? $product->compare_price : '' }}" />

            {{-- <x-form.textarea name="options" lable="options"
                value="{{ json_encode($product->options ?? []) }}" /> --}}

            <div class="form-group">
                <label for=""> options</label>
                <textarea class="form-control" name="options" id="" cols="30" rows="10">
                {{ old('options', json_encode($product->options ?? [])) }}
            </textarea>
            </div>
            <x-form.radio-group name="status" :options="[
                'active' => 'active',
                'inactive' => 'inactive',
            ]" checked="active" />
            <button type="submit" class="btn btn-primary btn_add">{{ isset($product) ? 'Update' : 'Create' }}</button>
        </form>
    </div>
@endsection

@push('styles')
@endpush

@push('scripts')
@endpush
