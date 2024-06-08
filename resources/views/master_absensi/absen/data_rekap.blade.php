<h4>Bulan: {{ $bulan }}</h4>
<h4>Kelas: {{ $kelas }} - {{ $jurusan }}</h4>
<table class="rekap">
    <tr class="text-center">
        <th rowspan="2">NO</th>
        <th rowspan="2">NAMA</th>
        <th colspan="31">TANGGAL</th>
        <th colspan="3">Total</th>
    </tr>
    <tr>
        <?php for($i=1; $i<=31; $i++){ ?>
        <th>{{ $i }}</th>
        <?php } ?>
        <th>H</th>
        <th>S</th>
        <th>I</th>
    </tr>
    @foreach ($rekap as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->name }}</td>
            <?php 
            $total_hadir = 0; 
            for($i=1; $i<=31; $i++){ $tgl = "tgl_".$i; 
            ?>
            <td>{{ $item->$tgl }}</td>
            <?php } ?>
            <td>{{ $item->jumlah_hadir }}</td>
            <td>{{ $item->jumlah_sakit }}</td>
            <td>{{ $item->jumlah_izin }}</td>
        </tr>
    @endforeach
</table>
