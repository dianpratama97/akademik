<div class="modal fade" id="modal-upload" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('kelulusan.import') }}" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Upload File Excel Kelulusan</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="file" name="excel" id="excel" class="form-control file-upload-info">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-relief-danger" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-relief-primary">Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>
