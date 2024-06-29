<div class="modal fade" id="izin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">IZIN</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('absensi.store_absen') }}" method="post">
                @csrf
                <input type="hidden" name="status" value="izin">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="keterangan">JELASKAN IZIN ANDA</label>
                        <textarea class="form-control" id="keterangan" name="keterangan" rows="3" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-bs-dismiss="modal">BATAL</button>
                    <button type="submit" class="btn btn-success">KIRIM</button>
                </div>
            </form>

        </div>
    </div>
</div>
