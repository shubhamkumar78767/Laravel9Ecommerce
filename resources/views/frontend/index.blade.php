@extends('layouts.app')

@section('title','Home Page')
@section('content')
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">

    <div class="carousel-inner">
        @foreach($sliders as $key=>$slider)
        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
            @if($slider->image)
            <img src='{{ asset("$slider->image") }}' class="d-block w-100" alt="...">
            @endif
            <div class="carousel-caption d-none d-md-block">
                <div class="custom-carousel-content">
                    <h1>
                        {{ $slider->title }}
                    </h1>
                    <p>
                        {{ $slider->description }}
                    </p>
                    <div>
                        <a href="#" class="btn btn-slider">
                            Get Now
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<div class="py-5 bg-white">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                <h4>E-Commerce</h4>
                <div class="underline mx-auto"></div>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ipsa harum minus, assumenda voluptate quo a rem cumque facere omnis numquam rerum dicta pariatur iure quisquam. Fugiat molestiae tempora rem doloribus unde nihil blanditiis, dolor modi ad aperiam consequuntur porro est! Nemo odit laboriosam laborum quasi voluptatum dolore distinctio aspernatur nesciunt.</p>
            </div>
        </div>
    </div>
</div>

<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>Tending Products</h4>
                <div class="underline mb-4"></div>
            </div>
            @if($trendingProducts)
            <div class="col-md-12">
                <div class="owl-carousel owl-theme four-carousel">
                @foreach($trendingProducts as $product)
                    <div class="item">
                        <div class="product-card">
                            <div class="product-card-img">
                                <label class="stock bg-danger">New</label>

                                @if($product->productImages->count() > 0)
                                <a href="{{ url('/collections/'.$product->category->slug.'/'.$product->slug) }}">
                                    <img src='{{ asset($product->productImages[0]->image) }}' alt="{{ $product->name }}">
                                </a>
                                @endif
                            </div>
                            <div class="product-card-body">
                                <p class="product-brand">{{ $product->brand }}</p>
                                <h5 class="product-name">
                                    <a href="{{ url('/collections/'.$product->category->slug.'/'.$product->slug) }}">
                                        {{ $product->name }}
                                    </a>
                                </h5>
                                <div>
                                    <span class="selling-price">&#8377;{{ $product->selling_price }}</span>
                                    <span class="original-price">&#8377;{{ $product->original_price }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                
                @endforeach
                </div>
            </div>
            @else
            <div class="col-md-12">
                <div class="p-2">
                    <h4>No Product Available</h4>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>

<div class="py-5 bg-white">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>New Arrivals Products
                <a href="{{ url('new-arrivals') }}" class="btn btn-warning float-end">View More</a>
                </h4>
                <div class="underline mb-4"></div>
            </div>
            @if($newArrivalProducts)
            <div class="col-md-12">
                <div class="owl-carousel owl-theme four-carousel">
                @foreach($newArrivalProducts as $product)
                    <div class="item">
                        <div class="product-card">
                            <div class="product-card-img">
                                <label class="stock bg-danger">New</label>

                                @if($product->productImages->count() > 0)
                                <a href="{{ url('/collections/'.$product->category->slug.'/'.$product->slug) }}">
                                    <img src='{{ asset($product->productImages[0]->image) }}' alt="{{ $product->name }}">
                                </a>
                                @endif
                            </div>
                            <div class="product-card-body">
                                <p class="product-brand">{{ $product->brand }}</p>
                                <h5 class="product-name">
                                    <a href="{{ url('/collections/'.$product->category->slug.'/'.$product->slug) }}">
                                        {{ $product->name }}
                                    </a>
                                </h5>
                                <div>
                                    <span class="selling-price">&#8377;{{ $product->selling_price }}</span>
                                    <span class="original-price">&#8377;{{ $product->original_price }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                
                @endforeach
                </div>
            </div>
            @else
            <div class="col-md-12">
                <div class="p-2">
                    <h4>No New Arrivals Available</h4>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>

<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>Featured Products
                    <a href="{{ url('featured-products') }}" class="btn btn-warning float-end">View More</a>
                </h4>
                <div class="underline mb-4"></div>
            </div>
            @if($featurdProducts)
            <div class="col-md-12">
                <div class="owl-carousel owl-theme four-carousel">
                @foreach($featurdProducts as $product)
                    <div class="item">
                        <div class="product-card">
                            <div class="product-card-img">
                                <label class="stock bg-danger">New</label>

                                @if($product->productImages->count() > 0)
                                <a href="{{ url('/collections/'.$product->category->slug.'/'.$product->slug) }}">
                                    <img src='{{ asset($product->productImages[0]->image) }}' alt="{{ $product->name }}">
                                </a>
                                @endif
                            </div>
                            <div class="product-card-body">
                                <p class="product-brand">{{ $product->brand }}</p>
                                <h5 class="product-name">
                                    <a href="{{ url('/collections/'.$product->category->slug.'/'.$product->slug) }}">
                                        {{ $product->name }}
                                    </a>
                                </h5>
                                <div>
                                    <span class="selling-price">&#8377;{{ $product->selling_price }}</span>
                                    <span class="original-price">&#8377;{{ $product->original_price }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                
                @endforeach
                </div>
            </div>
            @else
            <div class="col-md-12">
                <div class="p-2">
                    <h4>No New Arrivals Available</h4>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>

@endsection

@section('script')
    <script>
        $('.four-carousel').owlCarousel({
            loop:true,
            margin:10,
            nav:false,
            dots:true,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:3
                },
                1000:{
                    items:4
                }
            }
        })
    </script>
@endsection