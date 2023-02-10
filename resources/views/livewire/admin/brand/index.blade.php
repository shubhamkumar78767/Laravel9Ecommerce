<div>
    
    @include('livewire.admin.brand.modal-form')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>
                        Brand List
                        <a href="#" wire:click="openModal()" data-bs-toggle="modal" data-bs-target="#addBrandModal" class="btn btn-primary text-white btn-sm float-end">Add Brands</a>
                    </h4>
                </div>
                <div class="card-body">
                    @if(session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                    @endif
                    <table class="table table-striped table-boarded mb-3 datatablerender">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Slug</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @forelse ($brands as $brand)
                                <tr>
                                    <td> {{ $brand->id }} </td>
                                    <td> {{ $brand->name }} </td>
                                    <td>
                                        @if($brand->category)
                                            {{ $brand->category->name }}
                                        @else
                                            No Category
                                        @endif
                                    </td>
                                    <td> {{ $brand->slug }} </td>
                                    <td> {{ $brand->status == '1' ? 'Visible' : 'Hidden' }} </td>
                                    <td>
                                        <a wire:click="editBrand({{$brand->id}}) " href="#" data-bs-toggle="modal" data-bs-target="#updateBrandModal" class="btn btn-sm btn-success text-white">Edit</a>
                                        <a wire:click="deleteBrand({{$brand->id}}) " href="#" data-bs-toggle="modal" data-bs-target="#deleteBrandModal" class="btn btn-sm btn-danger text-white">Delete</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-danger">No Brand Found</td>
                                </tr>
                            @endforelse
                            
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
</div>

@push('script')
    <script>
        window.addEventListener('close-modal',event => {
            $("#addBrandModal").modal('hide');
            $("#updateBrandModal").modal('hide');
            $("#deleteBrandModal").modal('hide');
        });

    </script>
@endpush