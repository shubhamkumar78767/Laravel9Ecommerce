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
                <h3>Sliders List
                    <a href="{{ url('admin/sliders/create') }}" class="btn btn-sm text-white btn-primary float-end">Add Slider</a>
                </h3>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered datatablerender" id="SliderTable">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($sliders)
                            @foreach($sliders as $slider)
                                <tr>
                                    <td>{{ $slider->id }}</td>
                                    <td>{{ $slider->title }}</td>
                                    <td>{{ $slider->description }}</td>
                                    <td>
                                        <img src='{{ asset("$slider->image") }}' alt="" style="width:70px;height:70px;">
                                    </td>
                                    <td>{{ $slider->status == 1 ? 'Visible' : 'Hidden' }}</td>
                                    <td>
                                        <a href="{{ url('admin/sliders/'.$slider->id.'/edit') }}" class="text-white btn btn-sm btn-primary">Edit</a>
                                        <!-- <a href="{{ url('admin/sliders/'.$slider->id.'/delete') }}" onclick="return confirm('Are You Sure You Want To Delete This Data ?')" class="text-white btn btn-sm btn-danger">Delete</a> -->
                                        <form action="{{ url('admin/sliders/'.$slider->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Are You Sure You Want To Delete This Data ?')" class="text-white btn btn-sm btn-danger mt-1">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="6">
                                    <h3 class="text-danger">No Data Found</h3>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


@endsection

@push('script')

@endpush
