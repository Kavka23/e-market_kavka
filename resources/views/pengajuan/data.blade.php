<table id="tbl-pengajuan" class="table table-compact table stripped">
    <thead>
        <tr>
            <th>No.</th>
            <th>Nama Pengaju</th>
            <th>Nama Barang</th>
            <th>Tanggal Pengajuan</th>
            <th>Qty</th>
            <th>Terpenuhi</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pengajuan as $p)
        <tr>
            <td>{{ $i = !isset($i) ? ($i = 1) : ++$i }}</td>
            <td>{{ $p->nama_pengaju}}</td>
            <td>{{ $p->nama_barang}}</td>
            <td>{{ $p->created_at}}</td>
            <td>{{ $p->Qty}}</td>
            <td>
            @livewire('pengajuan-terpenuhi', ['model' => $p, 'field' => 'terpenuhi'], key($p->id))
            </td>
            <td>
                <button class="btn" data-toggle="modal" data-target="#modalFormPengajuan" data-mode="edit" data-id="{{ $p->id }}" data-nama_pengaju="{{ $p->nama_pengaju }}" data-nama_barang="{{ $p->nama_barang }}" data-Qty="{{ $p->Qty }}">
                    <i class="fas fa-edit text-success"></i>
                </button>
                <form method="post" action="{{ route('pengajuan.destroy', $p->id) }}" style="display: inline">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn delete-data" data-nama-pengaju="{{ $p->nama_pengaju }}">
                        <i class="fas fa-trash text-danger"></i>
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<script>
    // $(function() {
    //     $('#tbl-produk').DataTable()

    //     //dialog hapus data
    //     $('.btn-delete').on('click', function(e) {
    //         let nama_produk = $(this).closest('tr').find('')
    //     })
    // // })
</script>