@extends('layouts.admin')

@section('title', 'Admin Setting')

@section('content')
<div class="row">
    <div class="col-md-12 grid-margin">
        @if(session('message'))
            <div class="alert alert-success mb-3">{{ session('message') }}</div>
        @endif

        <form action="{{ url('admin/settings') }}" method="POST">
            @csrf
            <div class="card mb-3">
                <div class="card-header bg-primary">
                    <h3 class="text-white mb-0">Website</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="">Website Name</label>
                            <input type="text" name="website_name" value="{{ $setting->website_name ?? '' }}"  class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Website URL</label>
                            <input type="text" name="website_url" value="{{ $setting->website_url ?? '' }}" class="form-control">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="">Page Title</label>
                            <input type="text" name="page_title" value="{{ $setting->page_title ?? '' }}" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Meta Keywords</label>
                            <textarea name="meta_keyword" class="form-control" rows="3">{{ $setting->meta_keyword ?? '' }}</textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Meta Description</label>
                            <textarea name="meta_description" class="form-control" rows="3">{{ $setting->meta_description ?? '' }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-3">
                <div class="card-header bg-primary">
                    <h3 class="text-white mb-0">Website - Information</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="">Address</label>
                            <textarea name="address" value="{{ $setting->address ?? '' }}" class="form-control" rows="3"></textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Phone No. *</label>
                            <input type="text" value="{{ $setting->phone1 ?? '' }}" name="phone1" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Alternative Phone No.</label>
                            <input type="text" value="{{ $setting->phone2 ?? '' }}" name="phone2" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Email Id *</label>
                            <input type="text" value="{{ $setting->email1 ?? '' }}" name="email1" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Alternative Email</label>
                            <input type="text" value="{{ $setting->email2 ?? '' }}" name="email2" class="form-control">
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-3">
                <div class="card-header bg-primary">
                    <h3 class="text-white mb-0">Website - Social Media</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="">Facebook (Optional)</label>
                            <input type="text" value="{{ $setting->facebook ?? '' }}" name="facebook" class="form-control">

                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Twitter (Optional)</label>
                            <input type="text" value="{{ $setting->twitter ?? '' }}" name="twitter" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Instagram (Optional)</label>
                            <input type="text" value="{{ $setting->instagram ?? '' }}" name="instagram" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Youtube (Optional)</label>
                            <input type="text" value="{{ $setting->youtube ?? '' }}" name="youtube" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            

            <div class="text-end">
                <button type="submit" class="btn btn-primary text-white">Save Settings</button>
            </div>

        </form>
    </div>
</div>

@endsection