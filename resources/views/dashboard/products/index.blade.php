@extends('layout.dashboard')

@section('title')
    Dashboard - Products - index
@endsection

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">products</li>
    <li class="breadcrumb-item active">index</li>
@endsection

@section('content')
    <!------ Sersh ------->
    <form action="{{ URL::current() }}" method="get" class="d-flex justify-content-between m-2">
        @csrf
        <input name="name" type="text" class="form-control mx-2 mt-3 ml-5" placeholder="Product name"
            value="{{ request('name') }}" />
        <select name="status" id="" class="form-control mx-2 mt-3 ml-4">
            <option value="">All</option>
            <option value="active" @selected(request('status') == 'active')>Active</option>
            <option value="inactive" @selected(request('status') == 'inactive')>Inactive</option>
        </select>
        <input type="date" name="start_date" class="form-control mx-2 mt-3 ml-4" placeholder="start_date"
            value="{{ request('start_date') }}" />
        <input type="date" name="end_date" class="form-control mx-2 mt-3 ml-4" placeholder="end_date"
            value="{{ request('end_date') }}" />

        <button type="submit" class="btn btn-primary mx-2 pl-5 pr-5 mr-4 mt-3 ml-4 btn_add">Sersh</button>
    </form>
    <!------ End Sersh ------->

    <!------ messages ------->
    <x-messages.alert type="success" />
    <x-messages.alert type="info" />

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
                            <div class="col-sm-6 p-0 flex justify-content-lg-end justify-content-center">
                                <a href="{{ route('products.create') }}" class="btn btn-success btn_add"
                                    data-toggle="modal">
                                    <i class="material-icons">&#xE147;</i>
                                    <span>Add a Pproduct</span>
                                </a>
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
                                <th>Edit</th>
                                <th>Delete</th>>
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
                                    <td>
                                        <a href="{{ route('products.edit', $product->id) }}" class="edit" data-toggle="modal">
                                            <i class="material-icons edit" data-toggle="tooltip" title="Edit">&#xE254;</i>
                                        </a>
                                    </td>
                                    <td>
                                        <form action="{{ route('products.destroy', $product->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="delete" data-toggle="modal"><i
                                                    class="material-icons" data-toggle="tooltip"
                                                    title="Delete">&#xE872;</i></button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9" style="text-align: center">No Data</td>
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
    <style>
        .thead {
            background: rgba(134, 134, 134, 0.982);
            color: #fff;
            font-size: 30px;
        }

        .delete {
            border: none;
        }

        .edit {
            color: #eabb00;
        }
    </style>
@endpush

@push('scripts')
@endpush
