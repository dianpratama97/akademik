<h4>Bulan: {{ $bulan }}</h4>
<h4>Kelas: {{ $kelas }} - {{ $jurusan }}</h4>
<table class="rekap" id="users-table">
    <tr class="text-center">
        <th width="5%">NO</th>
        <th width="30%">NAMA</th>
        <th width="15%">TANGGAL</th>
        <th width="40%">KETARANGAN</th>
        <th width="10%">FOTO</th>
    </tr>


    @foreach ($dataKeterangan as $item)
        <tr>
            <td class="text-center">{{ $loop->iteration }}</td>
            <td>{{ $item->name }}</td>
            <td class="text-center"><b>{{ $item->tanggal }}</b></td>
            <td>{{ $item->keterangan }}</td>
            <td>
                <button type="button" data-id='{{ $item->id }}' data-jenis="show"
                    class="btn btn-sm action btn-rounded btn-info"><i class="mdi mdi-eye"></i></button>
            </td>
        </tr>
    @endforeach
</table>

{{-- modal detail --}}
<div class="modal fade" id="modalDetail" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-detail">

    </div>

</div>


<script>
    const modalShow = new bootstrap.Modal($('#modalDetail'));

    $('#users-table').on('click', '.action', function() {
        let data = $(this).data();
        let id = data.id;
        let jenis = data.jenis;

        //js show
        if (jenis == 'show') {
            $.ajax({
                method: 'get',
                url: `{{ url('absensi/') }}/${id}`,
                success: function(response) {
                    $('#modalDetail').find('.modal-detail').html(response);
                    modalShow.show();
                }
            });
            return
        }

    })
</script>
