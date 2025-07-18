@extends('layout')

@section('content')
<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h4>Detail Penerima</h4>
        </div>
        <div class="card-body">

            <p><strong>Nama:</strong> {{ $penerima->nama }}</p>
            <p><strong>NIK:</strong> {{ $penerima->nik }}</p>
            <p><strong>Alamat:</strong> {{ $penerima->alamat }}</p>
            <p><strong>Jenis Bantuan:</strong> {{ $penerima->jenis_bantuan }}</p>

            <a href="{{ route('assessment.create', ['penerima_id' => $penerima->id]) }}" class="btn btn-success mb-3">+ Tambah Assessment</a>

            <form method="GET" class="mb-3">
                <select name="filter" class="form-select" onchange="this.form.submit()">
                    <option value="">-- Semua --</option>
                    <option value="Layak" {{ request('filter') == 'Layak' ? 'selected' : '' }}>Layak</option>
                    <option value="Tidak Layak" {{ request('filter') == 'Tidak Layak' ? 'selected' : '' }}>Tidak Layak</option>
                </select>
            </form>

            <table class="table table-bordered">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Penghasilan</th>
                        <th>Kondisi Rumah</th>
                        <th>Hasil</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($assessments as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item->penghasilan }}</td>
                            <td>{{ $item->kondisi_rumah }}</td>
                            <td>{{ $item->hasil_akhir }}</td>
                            <td>
                                <a href="{{ route('assessment.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('assessment.destroy', $item->id) }}" method="POST" class="d-inline"
                                      onsubmit="return confirm('Yakin ingin menghapus assessment ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">Belum ada data assessment.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="mt-4">
                <a href="{{ route('penerima.index') }}" class="btn btn-secondary">Kembali</a>
            </div>

        </div>
    </div>
</div>
@endsection
