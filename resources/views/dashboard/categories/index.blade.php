@extends('layout.dashboard')

@section('title')
    Dashboard - Categories - index
@endsection

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Categories</li>
    <li class="breadcrumb-item active">index</li>
@endsection

@section('content')
    <!------ Sersh ------->
    <form action="{{ URL::current() }}" method="get" class="d-flex justify-content-between m-2">
        @csrf
        <input name="name" type="text" class="form-control mx-2 mt-3 ml-5" placeholder="Category name" value="{{ request('name') }}"/>
        <select name="status" id="" class="form-control mx-2 mt-3 ml-4">
            <option value="">All</option>
            <option value="active" @selected(request('status') == 'active')>Active</option>
            <option value="inactive" @selected(request('status') == 'inactive')>Inactive</option>
        </select>
        <input type="date" name="start_date" class="form-control mx-2 mt-3 ml-4" placeholder="start_date" value="{{ request('start_date') }}" />
        <input type="date" name="end_date" class="form-control mx-2 mt-3 ml-4" placeholder="end_date" value="{{ request('end_date') }}" />

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
                                <h2 class="ml-lg-2">Categories Schedule</h2>
                            </div>
                            <div class="col-sm-6 p-0 flex justify-content-lg-end justify-content-center">
                                <a href="{{ route('categories.create') }}" class="btn btn-success btn_add"
                                    data-toggle="modal">
                                    <i class="material-icons">&#xE147;</i>
                                    <span>Add a Category</span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <table class="table table-striped table-hover">
                        <thead class="thead">
                            <tr>
                                <th>#</th>
                                <th>Category Name</th>
                                <th>Products Count </th>
                                <th>Description</th>
                                <th>İcon</th>
                                <th>Status</th>
                                <th>Created at</th>
                                <th>Show Products</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>

                        <tbody class="tbody">
                            @forelse ($categories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->products_count }}</td>
                                    <td>{{ $category->description }}</td>
                                    <td>{{ $category->icon }}</td>
                                    <td>{{ $category->status }}</td>
                                    <td>{{ $category->created_at }}</td>
                                    <td>
                                        <a href="{{ route('categories.show', $category->id) }}" style="color: #ffffffe1" class="btn btn_add">
                                            Show Products
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('categories.edit', $category->id) }}" class="edit"
                                            data-toggle="modal">
                                            <i class="material-icons edit" data-toggle="tooltip" title="Edit">&#xE254;</i>
                                        </a>
                                    </td>
                                    <td>
                                        <form action="{{ route('categories.destroy', $category->id) }}" method="post">
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
                                    <td colspan="11" style="text-align: center">No Data</td>
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
        .aa{
            color: #fff;
        }
    </style>
@endpush

@push('scripts')
@endpush
