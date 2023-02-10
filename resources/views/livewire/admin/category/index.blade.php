<div>
    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Category Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form wire:submit.prevent="destroyCategory">
                    <div class="modal-body">
                        <h6>Are you sure you want to delete this data ?</h6>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success btn-sm text-white" data-bs-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-danger btn-sm text-white">Yes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            @if(session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h3>Category
                        <a href="{{ url('admin/category/create') }}" class="btn btn-sm text-white btn-primary float-end">Add Category</a>
                    </h3>
                </div>
                <div class="card-body">
                    <table class="table table-boarded table-striped table-responsive datatablerender">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i = 1; @endphp
                            @forelse($categories as $category)
                            <tr>
                                <td> {{ $i++ }} </td>
                                <td> {{ $category->name }} </td>
                                <td> {{ $category->status == '1' ? 'Visible' : 'Hidden' }} </td>
                                <td class="p-0">
                                    <a href="{{ url('admin/category/'.$category->id.'/edit') }}" class="btn btn-success text-white">Edit</a>
                                    <a href="#" wire:click="deleteCategory({{$category->id}})" data-bs-toggle="modal" data-bs-target="#deleteModal" class="btn btn-danger  text-white">Delete</a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-danger"><h4>No Data Found</h4></td>
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
    window.addEventListener('close-modal', event => {
        $("#deleteModal").modal('hide');
    });
</script>
@endpush