
<div class="modal fade" id="edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Category</h4>
                <span class="btn-close" data-bs-dismiss="modal"></span>
            </div>
            <div class="modal-body">
                <form id="editForm" action="" method="POST">
                    {{ method_field('PUT') }}
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Category Name</label>
                        <input type="text" required class="form-control" name="name" id="editName" placeholder="Enter category name">
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