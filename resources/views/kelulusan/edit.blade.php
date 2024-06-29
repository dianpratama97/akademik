<div class="modal-content">
    <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Kelulusan</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <form action="{{ route('kelulusan.update', $kelulusan->id) }}" method="post">
        @csrf
        @method('put')
        <div class="modal-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="status_lulus">Status Kelulusan Siswa</label>
                        <select class="form-control form-control-lg" name="status_lulus" id="status_lulus">
                            <option value="">--PILIH--</option>
                            <option value="1" {{ $kelulusan->status_lulus == 1 ? 'selected' : '' }}>Lulus</option>
                            <option value="0" {{ $kelulusan->status_lulus == 0 ? 'selected' : '' }}>Tidak Lulus
                            </option>
                        </select>
                        @error('status_lulus')
                            <small class='text-danger'>{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="kelas">Kelas</label>
                        <select class="form-control form-control-lg" name="kelas" id="kelas">
                            <option value="">--PILIH--</option>
                            @foreach ($kelas as $data_kelas)
                                <option value="{{ $data_kelas->kode_kelas }}"
                                    {{ $kelulusan->kelas == $data_kelas->kode_kelas ? 'selected' : '' }}>
                                    {{ $data_kelas->kode_kelas }}
                                </option>
                            @endforeach
                        </select>
                        @error('kelas')
                            <small class='text-danger'>{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="jurusan">Jurusan</label>
                        <select class="form-control form-control-lg" name="jurusan" id="jurusan">
                            <option value="">--PILIH--</option>
                            @foreach ($jurusan as $data_jurusan)
                                <option value="{{ $data_jurusan->kode_jurusan }}"
                                    {{ $kelulusan->jurusan == $data_jurusan->kode_jurusan ? 'selected' : '' }}>
                                    {{ $data_jurusan->kode_jurusan }}
                                </option>
                            @endforeach
                        </select>
                        @error('jurusan')
                            <small class='text-danger'>{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="name">Nama Siswa</label>
                        <input type="text" class="form-control" name="name" id="name"
                            value="{{ $kelulusan->name }}">
                        @error('name')
                            <small class='text-danger'>{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="nisn">Nomor Induk Siswa Nasional/NISN Siswa</label>
                        <input type="text" class="form-control" name="nisn" id="nisn"
                            value="{{ $kelulusan->nisn }}">
                        @error('nisn')
                            <small class='text-danger'>{{ $message }}</small>
                        @enderror
                    </div>
                </div>

            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-relief-danger" data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-relief-success">Simpan</button>
        </div>
    </form>
</div>
