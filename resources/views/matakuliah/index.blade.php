<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mata Kuliah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow rounded-4">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="fw-bold mb-0">Data Mata Kuliah</h3>
                <a href="{{ url('matakuliah/create') }}" class="btn btn-primary">+ Tambah Data</a>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover align-middle">
                    <thead class="table-dark text-center">
                        <tr>
                            <th>No</th>
                            <th>Nama Mata Kuliah</th>
                            <th>Kode Mata Kuliah</th>
                            <th>SKS</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($matakuliah as $m)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $m->nama_matkul }}</td>
                            <td>{{ $m->kode_matkul }}</td>
                            <td>{{ $m->sks }}</td>
                            <td class="text-center">
                                <a href="{{ url('matakuliah/'.$m->id.'/edit') }}" class="btn btn-warning btn-sm">Edit</a>

                                <form action="{{ url('matakuliah/'.$m->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus data?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach

                        @if(count($matakuliah) == 0)
                        <tr>
                            <td colspan="5" class="text-center text-muted">Belum ada data mata kuliah</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

</body>
</html>