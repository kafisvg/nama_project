@extends('layout')

@section('content')
<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header bg-info text-white">
            <h4>Tambah Assessment</h4>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    Semua field wajib diisi!
                </div>
            @endif

            <!-- Tombol Kembali -->
             <a href="{{ route('assessment.index') }}" class="btn btn-secondary mb-3">Kembali</a>


            <form action="{{ route('assessment.store') }}" method="POST">
                @csrf
                <input type="hidden" name="penerima_id" value="{{ request('penerima_id') }}">

                <div class="mb-3">
                    <label for="penghasilan" class="form-label">Penghasilan</label>
                    <input type="text" name="penghasilan" class="form-control" value="{{ old('penghasilan') }}" required>
                </div>

                <div class="mb-3">
                    <label for="kondisi_rumah" class="form-label">Kondisi Rumah</label>
                    <input type="text" name="kondisi_rumah" class="form-control" value="{{ old('kondisi_rumah') }}" required>
                </div>

                <div class="mb-3">
                    <label for="hasil_akhir" class="form-label">Hasil Akhir</label>
                    <select name="hasil_akhir" class="form-select" required>
                        <option value="layak" {{ old('hasil_akhir') == 'layak' ? 'selected' : '' }}>Layak</option>
                        <option value="tidak layak" {{ old('hasil_akhir') == 'tidak layak' ? 'selected' : '' }}>Tidak Layak</option>
                    </select>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('penerima.show', request('penerima_id')) }}" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

