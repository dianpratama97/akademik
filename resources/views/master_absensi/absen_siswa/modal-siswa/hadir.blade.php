<div class="modal fade" id="hadir" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">HADIR</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('absensi.store_absen') }}" method="post">
                @csrf
                <input type="hidden" id="lokasi" name="lokasi">
                <input type="hidden" name="status" value="hadir">
                <div class="modal-body text-center">
                    <h1>Selamat Pagi, {{ Auth::user()->name }}</h1>
                    <h3>Jam {{ date('h:m') }}, {{ date('d-m-yy') }}. </h3>
                    <h3>Terimakasih Sudah Absen. </h3>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-bs-dismiss="modal">BATAL</button>
                    <button type="submit" class="btn btn-success" id="store">KIRIM</button>
                </div>
            </form>
        </div>
    </div>
</div>
