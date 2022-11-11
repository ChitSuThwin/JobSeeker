<div class="modal" id="delete">
    <div class="modal-dialog">
        <div class="modal-content">
            <button class="btn-close" data-bs-dismiss="modal"></button>
            <div class="body d-flex justify-content-center flex-column gap-2">
                <i></i>
                <p>Are You Sure To Delete?</p>
                <div class="d-flex justify-content-center gap-2">
                    <button class="btn btn-primary" data-bs-dismiss="modal">Cancel</button>
                    <form action="" method="POST" id="deleteForm">
                        @csrf
                        {{ method_field('delete') }}
                        <button class="btn btn-dark">OK</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>