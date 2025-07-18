@extends('layout')

@section('content')
<div class="card">
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Daftar Assessment</h5>
        <a href="{{ route('assessment.create') }}" class="btn btn-light btn-sm">+ Tambah Assessment</a>
    </div>
    <div class="card-body">

        <div class="mb-3 d-flex gap-2">
            <a href="{{ route('assessment.index') }}" class="btn btn-outline-secondary btn-sm">Semua</a>
            <a href="{{ route('assessment.index', ['filter' => 'layak']) }}" class="btn btn-outline-success btn-sm">Layak</a>
            <a href="{{ route('assessment.index', ['filter' => 'tidak layak']) }}" class="btn btn-outline-danger btn-sm">Tidak Layak</a>
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Nama</th>
                        <th>Penghasilan</th>
                        <th>Kondisi Rumah</th>
                        <th>Hasil</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($assessments as $a)
                    <tr>
                        <td>{{ $a->penerima->nama }}</td>
                        <td>{{ $a->penghasilan }}</td>
                        <td>{{ $a->kondisi_rumah }}</td>
                        <td>
                            <span class="badge bg-{{ $a->hasil_akhir == 'layak' ? 'success' : 'danger' }}">
                                {{ ucfirst($a->hasil_akhir) }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('assessment.edit', $a->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('assessment.destroy', $a->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus data ini?')">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted">Belum ada data assessment.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

