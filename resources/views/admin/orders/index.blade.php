@extends('layouts.admin')

@section('title','My Orders')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>My Orders</h3>
            </div>
            <div class="card-body">
                <form action="" method="GET">
                    <div class="row">
                        <div class="col-md-3">
                            <label class="mb-1">Filter By Date</label>
                            <input type="date" name="date" value="{{ Request::get('date') ?? date('Y-m-d') }}" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label class="mb-1">Filter By Status</label>
                            <select name="status" id="" class="form-select">
                                <option value="">Select Status</option>
                                <option value="in progress {{ Request::get('status') == 'in progress' ? 'selected' : '' }}">In Progress</option>
                                <option value="completed {{ Request::get('status') == 'completed' ? 'selected' : '' }}">Completed</option>
                                <option value="pending {{ Request::get('status') == 'pending' ? 'selected' : '' }}">Pending</option>
                                <option value="cancelled {{ Request::get('status') == 'cancelled' ? 'selected' : '' }}">Cancelled</option>
                                <option value="out-for-delivery {{ Request::get('status') == 'out-for-delivery' ? 'selected' : '' }}">Out For Delivery</option> 
                            </select>
                        </div>
                        <div class="col-md-6">
                            <br>
                            <button type="submit" class="btn btn-primary text-white">Filter</button>
                        </div>
                    </div>
                </form>
                <hr>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered datatablerender">
                        <thead>
                            <tr>
                                <th>Order Id</th>
                                <th>Tracking No</th>
                                <th>Username</th>
                                <th>Payment Mode</th>
                                <th>Order Date</th>
                                <th>Status Message</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($orders as $order)
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->tracking_no }}</td>
                                    <td>{{ $order->fullname }}</td>
                                    <td>{{ $order->payment_mode }}</td>
                                    <td>{{ $order->created_at->format('d-m-Y') }}</td>
                                    <td>{{ $order->status_message }}</td>
                                    <td>
                                        <a href="{{ url('admin/orders/'.$order->id) }}" class="btn btn-sm btn-primary text-white">View</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7">NO Order Items Available</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection