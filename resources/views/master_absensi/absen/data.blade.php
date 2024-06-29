@foreach ($user as $item)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $item->name }}</td>
        <td>{{ $item->jurusan }}</td>
        <td>
            @if ($item->absences()->whereDate('tanggal', $tanggal)->exists())
                <span class="badge badge-glow bg-success">SUDAH ABSEN</span>
            @else
                <span class="badge badge-glow bg-danger">BELUM ABSEN</span>
            @endif
        </td>
    </tr>
@endforeach
