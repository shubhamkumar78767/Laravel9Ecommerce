@extends('layouts.admin')

@section('title','My Order Details')
@section('content')

    <div class="row">
        <div class="col-md-12">
            @if(session('message'))
                <div class="alert alert-success mb-3">{{ session('message') }}</div>
            @endif

            <div class="card">
                <div class="card-header">
                    <h3>My Order Details</h3>
                </div>
                <div class="card-body">

                    <h4 class="text-primary">
                        <i class="fa fa-shopping-cart text-dark"></i> &nbsp;My Order Details
                        <a href="{{ url('admin/orders') }}" class="btn btn-sm btn-primary float-end mx-1 text-white">Back</a>
                        <a href="{{ url('admin/invoice/'.$order->id.'/generate') }}" class="btn btn-sm btn-secondary text-white float-end mx-1">
                            Download Invoice
                        </a>
                        <a href="{{ url('admin/invoice/'.$order->id) }}" target="_blank" class="btn btn-sm btn-info float-end mx-1">
                            View Invoice
                        </a>
                        <a href="{{ url('admin/invoice/'.$order->id.'/mail') }}" class="btn btn-sm btn-dark float-end mx-1">
                            Send Invoice Via Email
                        </a>
                    </h4>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <h5>Order Details</h5>
                            <hr>
                            <h6>Order Id: {{ $order->id }}</h6>
                            <h6>Tracking Id/No: {{ $order->tracking_no }}</h6>
                            <h6>Ordered Date: {{ $order->created_at->format('d-m-Y h:i A') }}</h6>
                            <h6>Payment Mode: {{ $order->payment_mode }}</h6>
                            <h6 class="border p-2">
                                Order Status Message: <span class="text-success text-uppercase">{{ $order->status_message }}</span>
                            </h6>
                        </div>
                        <div class="col-md-6">
                            <h5>User Details</h5>
                            <hr>
                            <h6>Full Name: {{ $order->fullname }}</h6>
                            <h6>Email Id: {{ $order->email }}</h6>
                            <h6>Phone {{ $order->phone }}</h6>
                            <h6>Address: {{ $order->address }}</h6>
                            <h6>Pincode: {{ $order->pincode }}</h6>
                        </div>
                    </div>
                    <br>
                    <h5>Order Items</h5>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Item Id</th>
                                    <th>Image</th>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $totalPrice = 0; @endphp
                                @foreach($order->orderItems as $orderItem)
                                    <tr>
                                        <td width="10%">{{ $orderItem->id }}</td>
                                        <td width="10%">
                                            @if($orderItem->product->productImages)
                                                <img src="{{ asset($orderItem->product->productImages[0]->image) }}" style="width: 50px; height: 50px" alt="">
                                            @endif
                                            
                                        </td>
                                        <td>
                                            {{ $orderItem->product->name }}
                                            @if($orderItem->productColor)

                                                @if($orderItem->productColor->color)
                                                    <span>- Color: {{ $orderItem->productColor->color->name }}</span>
                                                @endif
                                            @endif
                                        </td>
                                        <td width="10%">&#8377;{{ $orderItem->price }}</td>
                                        <td width="10%">{{ $orderItem->quantity }}</td>
                                        <td width="10%" class="fw-bold">{{ $orderItem->price * $orderItem->quantity }}</td>

                                        @php
                                            $totalPrice+= $orderItem->price * $orderItem->quantity; 
                                        @endphp
                                    </tr>
                                @endforeach
                                <tr>
                                    <td class="fw-bold" colspan="5">Total Amount:</td>
                                    <td class="fw-bold" colspan="1">&#8377;{{ $totalPrice }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="card border mt-3">
                <div class="card-body">
                    <h4>Order Process (Order Status Updates)</h4>
                    <hr>
                    <div class="row">
                        <div class="col-md-5">
                            <form action="{{ url('admin/orders/'.$order->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <label for="">Update Your Order Status</label>
                                <div class="input-group">
                                    <select name="order_status" id="" class="form-select">
                                        <option value="">Select Order Status</option>
                                        <option value="in progress {{ Request::get('status') == 'in progress' ? 'selected' : '' }}">In Progress</option>
                                        <option value="completed {{ Request::get('status') == 'completed' ? 'selected' : '' }}">Completed</option>
                                        <option value="pending {{ Request::get('status') == 'pending' ? 'selected' : '' }}">Pending</option>
                                        <option value="cancelled {{ Request::get('status') == 'cancelled' ? 'selected' : '' }}">Cancelled</option>
                                        <option value="out-for-delivery {{ Request::get('status') == 'out-for-delivery' ? 'selected' : '' }}">Out For Delivery</option> 
                                    </select>
                                    <button type="submit" class="btn btn-primary text-white">Update</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-7">
                            <br>
                            <h4 class="mt-3">Current Order Status: <span class="text-uppercase">{{ $order->status_message }}</span> </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
