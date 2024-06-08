@push('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/2.0.7/css/dataTables.bootstrap5.css" rel="stylesheet">
@endpush
@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.bootstrap5.js"></script>
@endpush
@push('javascript')
    {{ $dataTable->scripts() }}

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


    <script>
        $("#checkAll").click(function() {
            $('input:checkbox').not(this).prop('checked', this.checked);
        });


        const modalShow = new bootstrap.Modal($('#modalDetail'));
        const modal = new bootstrap.Modal($('#modalAction'));
        $('#users-table').on('click', '.action', function() {
            let data = $(this).data();
            let id = data.id;
            let jenis = data.jenis;

            //js show
            if (jenis == 'show') {
                $.ajax({
                    method: 'get',
                    url: `{{ url('users/') }}/${id}`,
                    success: function(response) {
                        $('#modalDetail').find('.modal-detail').html(response);
                        modalShow.show();
                    }
                });
                return
            }

            //js hapus
            if (jenis == 'delete') {
                Swal.fire({
                    title: "Anda Yakin ?",
                    text: "Data yang anda pilih akan di hapus!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#5ccec4",
                    cancelButtonColor: "#ceff00",
                    confirmButtonText: "HAPUS",
                    cancelButtonText: "BATAL",
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            method: 'DELETE',
                            url: `{{ url('users/') }}/${id}`,
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(res) {
                                window.LaravelDataTables["users-table"].ajax.reload()
                                Swal.fire({
                                    title: "BERHASIL",
                                    text: res.message,
                                    icon: res.status
                                });
                            }
                        });

                    }
                });
                return
            }
            $.ajax({
                method: 'get',
                url: `{{ url('users/') }}/${id}/edit`,
                success: function(response) {
                    $('#modalAction').find('.modal-dialog').html(response);
                    modal.show();
                    simpan();
                }
            });


            $.ajax({
                method: 'get',
                url: `{{ url('users/') }}/${id}/edit`,
                success: function(response) {
                    $('#modalAction').find('.modal-dialog').html(response);
                    modal.show();
                    simpan();
                }
            });



            function simpan() {
                $('#form-edit').on('submit', function(e) {
                    e.preventDefault()
                    const _form = this;
                    const formData = new FormData(_form);
                    $.ajax({
                        method: 'POST',
                        url: `{{ url('users/') }}/${id}`,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            window.LaravelDataTables["users-table"].ajax.reload()
                            modal.hide();
                        },
                        error: function(res) {
                            let errors = res.responseJSON?.errors;
                            $(_form).find('.text-danger.text-small').remove()
                            if (errors) {
                                for (const [key, value] of Object.entries(errors)) {
                                    $(`[name='${key}']`).parent().append(
                                        `<span class="text-danger text-small">${value}</span>`
                                    )
                                }
                            }

                        }
                    });
                })
            }
        })
    </script>
@endpush
