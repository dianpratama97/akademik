<div class="modal fade" id="sakit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">SAKIT</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          {{-- <form action="{{ route('absensi.store') }}" method="post">
              @csrf --}}
          <input type="hidden" name="status" id="status" value="sakit">
          <div class="modal-body">
              <div class="webcam-absen"></div>
              <ul class="m-2 text-danger">
                  <li>Hanya orang tua/wali siswa yang boleh foto.</li>
                  <li>Hanya boleh fotokan surat sakit dari dokter/puskesmas.</li>
              </ul>
              <div class="form-group">
                  <label for="desc">JELASKAN SAKIT ANDA</label>
                  <textarea class="form-control" id="desc" name="desc" rows="3" required></textarea>
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-warning" data-bs-dismiss="modal">BATAL</button>
              <button id="take-absen" class="btn btn-success">KIRIM</button>
          </div>
          {{-- </form> --}}

      </div>
  </div>
</div>