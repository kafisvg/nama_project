@extends('layout')

@section('content')
<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header bg-info text-white">
            <h4>Edit Data Assessment</h4>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    Semua field wajib diisi!
                </div>
            @endif

            <form action="{{ route('assessment.update', $assessment->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Nama Penerima</label>
                    <select name="penerima_id" class="form-select" required>
                        @foreach($penerimas as $penerima)
                            <option value="{{ $penerima->id }}"
                                {{ old('penerima_id', $assessment->penerima_id) == $penerima->id ? 'selected' : '' }}>
                                {{ $penerima->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Penghasilan</label>
                    <input type="text" name="penghasilan" class="form-control"
                        value="{{ old('penghasilan', $assessment->penghasilan) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Kondisi Rumah</label>
                    <input type="text" name="kondisi_rumah" class="form-control"
                        value="{{ old('kondisi_rumah', $assessment->kondisi_rumah) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Hasil Akhir</label>
                    <select name="hasil_akhir" class="form-select" required>
                        <option value="Layak" {{ old('hasil_akhir', $assessment->hasil_akhir) == 'Layak' ? 'selected' : '' }}>Layak</option>
                        <option value="Tidak Layak" {{ old('hasil_akhir', $assessment->hasil_akhir) == 'Tidak Layak' ? 'selected' : '' }}>Tidak Layak</option>
                    </select>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('penerima.show', $assessment->penerima_id) }}" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
