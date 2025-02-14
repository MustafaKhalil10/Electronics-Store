@extends('layout.dashboard')

@section('title')
    Dashboard - Products - Show
@endsection

@section('breadcrumbs')
    @parent
    <li class="breadcrumb-item">Category Name: {{ $category->name }}</li>
    <li class="breadcrumb-item active">Product Show</li>
@endsection

@section('content')
    <!--- وصف الفئة--->
    <div class="section mt-3 ml-5">
        <p><h4>Description :</h4> {{ $category->description }}</p>
    </div>

    <!--- زر الرجوع إلى صفحة الفئات --->
    <a href="{{ route('categories.index') }}" class="btn btn-primary mx-2 pl-5 pr-5 mr-4 mt-3 ml-5 btn_add">Categories</a>


    <!------main-content-start----------->
    <div class="main-content">
        <div class="row">
            <div class="col-md-12">
                <div class="table-wrapper">
                    <div class="table-title">
                        <div class="row">
                            <div class="col-sm-6 p-0 flex justify-content-lg-start justify-content-center">
                                <h2 class="ml-lg-2">Products Schedule</h2>
                            </div>
                        </div>
                    </div>

                    <table class="table table-striped table-hover">
                        <thead class="thead">
                            <tr>
                                <th>#</th>
                                <th>Product Name</th>
                                <th>Store Name</th>
                                <th>Category Name</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Status</th>
                            </tr>
                        </thead>

                        <tbody class="tbody">
                            @forelse ($products as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->store->name }}</td>
                                    <td>{{ $product->category->name ?? 'null' }}</td>
                                    <td>{{ $product->description }}</td>
                                    <td>{{ $product->image }}</td>
                                    <td>{{ $product->status }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" style="text-align: center">No Data</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
@endpush

@push('scripts')
@endpush
