@extends('layouts.admin')
    @section('title','Users Page')
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
                <h3>Users
                    <a href="{{ url('admin/users/create') }}" class="btn btn-sm text-white btn-primary float-end">Add User</a>
                </h3>
            </div>
            <div class="card-body">
                <table class="table table-boarded table-striped datatablerender">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i = 0; @endphp
                        @forelse($users as $user)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @if($user->role_as == '0')
                                    <label class="badge btn-primary">User</label>
                                @elseif($user->role_as == '1')
                                    <label class="badge btn-success">Admin</label>
                                @else
                                    <label class="badge btn-danger">None</label>
                                @endif
                            </td>
                            <td>
                                <a href="{{ url('admin/users/'.$user->id.'/edit') }}" class="btn btn-success btn-sm text-white">
                                    Edit
                                </a>
                                <!-- <a href="{{ url('admin/users/'.$user->id.'/delete') }}"  onclick="return confirm('Are You Sure You Want To Delete This Data ?')" class="btn btn-danger btn-sm text-white">
                                    Delete
                                </a> -->
                                <form action="{{ url('admin/users/'.$user->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Are You Sure You Want To Delete This Data ?')" class="text-white btn btn-sm btn-danger mt-1">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5">No User Found</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
