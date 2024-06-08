<div class="modal-content">
    <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Data User</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <form action="{{ route('users.update', $user->id) }}" method="POST" id="form-edit">
        @csrf
        @method('PUT')
        <div class="modal-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="name">Nama Siswa</label>
                        <input type="text" class="form-control" name="name" id="name"
                            value="{{ $user->name }}">
                        @error('name')
                            <small class='text-danger'>{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="role">Role User</label>
                        <select name="role" id="role" class="form-control">
                            <option value="">--pilih--</option>
                            <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                            <option value="staff" {{ $user->role == 'staff' ? 'selected' : '' }}>Guru</option>
                            <option value="siswa" {{ $user->role == 'siswa' ? 'selected' : '' }}>Siswa</option>
                        </select>
                        @error('role')
                            <small class='text-danger'>{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="status_biodata">Status Biodata</label>
                        <select name="status_biodata" id="status_biodata" class="form-control">
                            <option value="">--pilih--</option>
                            <option value="0" {{ $user->status_biodata == 0 ? 'selected' : '' }}>Belum Lengkap
                            </option>
                            <option value="1" {{ $user->status_biodata == 1 ? 'selected' : '' }}>Lengkap</option>
                            <option value="2" {{ $user->status_biodata == 2 ? 'selected' : '' }}>Reset</option>
                        </select>
                        @error('status_biodata')
                            <small class='text-danger'>{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="text" class="form-control" name="password" id="password">
                        @error('password')
                            <small class='text-danger'>{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name="email" id="email"
                            value="{{ $user->email }}">
                        @error('email')
                            <small class='text-danger'>{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="username">Usename</label>
                        <input type="text" class="form-control" name="username" id="username"
                            value="{{ $user->username }}">
                        @error('username')
                            <small class='text-danger'>{{ $message }}</small>
                        @enderror
                    </div>
                </div>

            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-gradient-danger" data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-gradient-success">Simpan</button>
        </div>
    </form>
</div>
