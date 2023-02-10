@extends('layouts.admin')
    @section('title','Edit User Page')
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
                <h3>Edit User
                    <a href="{{ url('admin/users') }}" class="btn btn-sm text-white btn-primary float-end">Back</a>
                </h3>
            </div>
            <div class="card-body">
                <form action="{{ url('admin/users/'.$user->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="">Name</label>
                            <input value="{{ $user->name }}" type="text" name="name" class="form-control">
                            @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Email</label>
                            <input value="{{ $user->email }}" type="text" name="email" class="form-control">
                            @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Password</label>
                            <input value="{{ $user->password }}" type="password" name="password" class="form-control">
                            @error('password') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Select Role</label>
                            <select name="role_as" id="" class="form-select">
                                <option value="">Select Role</option>
                                <option value="0" {{ $user->role_as == '0' ? 'selected' : '' }}>User</option>
                                <option value="1" {{ $user->role_as == '1' ? 'selected' : '' }}>Admin</option>
                            </select>
                            @error('role_as') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="col-md-12 text-end">
                            <button type="submit" name="submit" class="btn btn-primary text-white">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection