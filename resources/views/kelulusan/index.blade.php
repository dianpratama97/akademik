@extends('layouts.app')
@section('title', 'halaman data kelulusan kelas 12')
@section('content')

    <div class="card">
        <form method="post" role="alert" action="{{ url('hapusAllKelulusan') }}" enctype="multipart/form-data">
            @csrf
            @method('DELETE')
            <div class="card-header ">
                <div class="card " style="width: 25rem;">
                    <ul class="list-group list-group-flush ">
                        <li class="list-group-item d-grid gap-2">
                            <button type="button" class="btn btn-relief-success btn-sm btn-block text-capitalize"
                                data-bs-toggle="modal" data-bs-target="#modal-upload">upload excel</button>
                        </li>
                        <li class="list-group-item d-grid gap-2">
                            <button type="button" class="btn btn-relief-primary btn-sm btn-block text-capitalize"
                                data-bs-toggle="modal" data-bs-target="#modal-tambah">tambah</button>
                        </li>
                        <li class="list-group-item d-grid gap-2">
                            <a href="{{ asset('berkas/format_kelulusan.xlsx') }}"
                                class="btn btn-relief-primary btn-sm btn-block text-capitalize">Download Format
                                Kelulusan</a>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-6 d-grid gap-2">
                                    <button type="submit"
                                        class="btn btn-danger btn-sm btn-block text-capitalize delete-confirm">
                                        <i class="fa fa-times"></i> hapus data
                                    </button>
                                </div>
                                <div class="col-md-6">
                                    <input type="checkbox" class="form-check-input" id="checkAll"
                                        style="width: 30px; height: 28px;">
                                    PILIH SEMUA
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered" id="kelulusan-table">
                    <thead>
                        <tr>

                            <th>
                                PILIH
                            </th>
                            <th>NO</th>
                            <th>NAMA SISWA</th>
                            <th>NISN</th>
                            <th>STATUS KELULUSAN</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" value='{{ $item->id }}'
                                                name="id[]">
                                            <i class="input-helper"></i>
                                        </label>
                                    </div>
                                </td>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->nisn }}</td>
                                <td>

                                    @if ($item->status_lulus == 1)
                                    <span class="badge badge-glow bg-success">Lulus</span>
                                    @else
                                    <span class="badge badge-glow bg-danger">Tidak Lulus</span>
                                    @endif
                                </td>
                                <td>
                                    <button type="button" data-id='{{ $item->id }}' data-jenis="show"
                                        class="btn btn-sm action btn-relief-info"><i
                                            class="fa fa-pencil"></i></button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </form>
    </div>


    <!-- Modal -->
    @include('kelulusan.upload')
    @include('kelulusan.tambah')

    {{-- modal detail --}}
    <div class="modal fade" id="modalEdit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-detail modal-lg">

        </div>

    </div>
@endsection
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

        $("#checkAll").click(function() {
            $('input:checkbox').not(this).prop('checked', this.checked);
        });
    </script>
    <script>
        const modalShow = new bootstrap.Modal($('#modalEdit'));

        $('#kelulusan-table').on('click', '.action', function() {
            let data = $(this).data();
            let id = data.id;
            let jenis = data.jenis;

            //js show
            if (jenis == 'show') {
                $.ajax({
                    method: 'get',
                    url: `{{ url('kelulusan/') }}/${id}/edit`,
                    success: function(response) {
                        $('#modalEdit').find('.modal-detail').html(response);
                        modalShow.show();
                    }
                });
                return
            }

        })
    </script>
@endpush
