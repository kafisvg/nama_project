@extends('layout')

@section('content')
<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header bg-warning text-dark">
            <h4>Edit Data Penerima</h4>
        </div>
        <div class="card-body">
            @if($errors->any())
                <div class="alert alert-danger">Semua field wajib diisi!</div>
            @endif

            <form action="{{ route('penerima.update', $penerima->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" name="nama" class="form-control"
                        value="{{ old('nama', $penerima->nama) }}" required>
                </div>

                <div class="mb-3">
                    <label for="nik" class="form-label">NIK</label>
                    <input type="text" name="nik" class="form-control"
                        value="{{ old('nik', $penerima->nik) }}" required>
                </div>

                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea name="alamat" class="form-control" required>{{ old('alamat', $penerima->alamat) }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="kategori" class="form-label">Kategori</label>
                    <select name="kategori" class="form-select" required>
                        <option value="">-- Pilih Kategori --</option>
                        <option value="Lansia" {{ old('kategori', $penerima->kategori) == 'Lansia' ? 'selected' : '' }}>Lansia</option>
                        <option value="Difabel" {{ old('kategori', $penerima->kategori) == 'Difabel' ? 'selected' : '' }}>Difabel</option>
                        <option value="Miskin" {{ old('kategori', $penerima->kategori) == 'Miskin' ? 'selected' : '' }}>Miskin</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="jenis_bantuan" class="form-label">Jenis Bantuan</label>
                    <input type="text" name="jenis_bantuan" class="form-control"
                        value="{{ old('jenis_bantuan', $penerima->jenis_bantuan) }}" required>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('penerima.index') }}" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

