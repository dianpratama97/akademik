<!-- Modal -->
<div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('kelas.store') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Kelas</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            name="name">
                        @error('name')
                            <small class='text-danger'>{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="kode_kelas" class="form-label">Kode Kelas</label>
                        <input type="text" class="form-control @error('kode_kelas') is-invalid @enderror"
                            id="kode_kelas" name="kode_kelas">
                        @error('kode_kelas')
                            <small class='text-danger'>{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-relief-danger" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-relief-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- hapus --}}

@push('js-internal')
    <script>
        $(document).ready(function() {
            //event : Delete
            $("form[role='alert']").submit(function(e) {
                e.preventDefault();
                Swal.fire({
                    title: "Anda Yakin ?",
                    text: "Data Yang di Hapus Tidak Dapat Dikembalikan.",
                    icon: 'warning',
                    allowOutsideClick: false,
                    showCancelButton: true,
                    confirmButtonColor: '#0cf01b',
                    cancelButtonColor: '#d33',
                    cancelButtonText: "Batal",
                    reverseButtons: true,
                    confirmButtonText: "Hapus",
                }).then((result) => {
                    if (result.isConfirmed) {
                        // todo: process of deleting categories
                        e.target.submit();
                    }
                });
            })
        });
    </script>
@endpush
