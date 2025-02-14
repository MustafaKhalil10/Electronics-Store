@extends('layout.dashboard')

@section('title')
    {{ isset($category) ? 'Edit Category' : 'Create Category' }}
@endsection

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">Categories</a></li>
    <li class="breadcrumb-item active">{{ isset($category) ? 'Edit' : 'Create' }}</li>
@endsection

@section('content')
    <div class="m-5">

        <!--Errors_any-->
        <x-messages.errors />

        <!--form_create_edit_date-->
        <form action="{{ isset($category) ? route('categories.update', $category->id) : route('categories.store') }}" method="post">
            @csrf
            @if (isset($category))
                @method('PUT')
            @endif

            <x-form.input name="name" type="text" lable="Category Name"
                value="{{ isset($category) ? $category->name : '' }}" />

            <x-form.textarea name="description" lable="Description"
                value="{{ isset($category) ? $category->description : '' }}"/>

            <x-form.input name="icon" type="file" lable="Icon" />

            <x-form.radio-group name="status" :options="[
                'active' => 'active',
                'inactive' => 'inactive',
            ]" checked="active" />

            <button type="submit" class="btn btn-primary btn_add">{{ isset($appointment) ? 'save edit' : 'save' }}</button>
        </form>
    </div>
@endsection

@push('styles')
@endpush

@push('scripts')
@endpush
