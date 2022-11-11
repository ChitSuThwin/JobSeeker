<div class="modal fade" id="create">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">New Category</h4>
                <span class="btn-close" data-bs-dismiss="modal"></span>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.categories.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Category Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter category name">
                    </div>
                    @if ($errors->has('name'))
                    <p class="mb-3 text-danger">{{ $errors->first('name') }}</p>
                    @endif
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>