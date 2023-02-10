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
                <h3>Products
                    <a href="{{ url('admin/products/create') }}" class="btn btn-sm text-white btn-primary float-end">Add Products</a>
                </h3>
            </div>
            <div class="card-body">
                <table class="table table-boarded table-striped datatablerender">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Category</th>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i = 1; @endphp
                        @forelse($products as $product)
                        <tr>
                            <td> {{ $i++; }} </td>
                            <td>
                                @if($product->category)
                                    {{ $product->category->name }}
                                    @else
                                    No Category
                                @endif 
                            </td>
                            <td> {{ $product->name }} </td>
                            <td> {{ $product->selling_price }} </td>
                            <td> {{ $product->quantity }} </td>
                            <td> {{ $product->status == '1' ? 'Visible' : 'Hidden' }} </td>
                            <td>
                                <a href="{{ url('admin/products/'.$product->id.'/edit') }}" class="btn btn-success btn-sm text-white">Edit</a>
                                <!-- <a href="{{ url('admin/products/'.$product->id.'/delete') }}"  onclick="return confirm('Are You Sure You Want To Delete This Data ?')" class="btn btn-danger btn-sm text-white">Delete</a> -->
                                <form action="{{url('admin/products/'.$product->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Are You Sure You Want To Delete This Data ?')" class="btn btn-danger btn-sm text-white">
                                            Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7">No Data Found</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
