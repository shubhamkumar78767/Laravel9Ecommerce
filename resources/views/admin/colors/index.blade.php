@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        @if(session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
        @endif
        <div class="card">
            <div class="card-header">
                <h3>Colors List
                    <a href="{{ url('admin/colors/create') }}" class="btn btn-sm text-white btn-primary float-end">Add Color</a>
                </h3>
            </div>
            <div class="card-body">
                <table class="table table-striped table-boarded datatablerender">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Code</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($colors as $color)
                        <tr>
                            <td>{{ $color->id }}</td>
                            <td>{{ $color->name }}</td>
                            <td>{{ $color->code }}</td>
                            <td>{{ $color->status == 1 ? 'Visible' : 'Hidden' }}</td>
                            <td>
                                <a href="{{ url('admin/colors/'.$color->id.'/edit') }}" class="text-white btn btn-sm btn-primary">Edit</a>
                                <!-- <a href="{{ url('admin/colors/'.$color->id.'/delete') }}" onclick="return confirm('Are You Sure You Want To Delete This Data ?')" class="text-white btn btn-sm btn-danger">Delete</a> -->
                                <form action="{{ url('admin/colors/'.$color->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Are You Sure You Want To Delete This Data ?')" class="text-white btn btn-sm btn-danger mt-1">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
