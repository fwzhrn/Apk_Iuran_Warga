@extends('admin.template')

@section('title', 'Tambah Kategori Iuran')

@section('content')
<div class="container py-4">
    <div class="card mx-auto shadow rounded-3" style="max-width: 500px;">
        <div class="card-header bg-primary text-white rounded-top">
            <h5 class="mb-0">Tambah Kategori Iuran</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.kategori-iuran.store') }}" method="POST" novalidate>
                @csrf

                <div class="mb-3">
                    <label for="period" class="form-label">Periode (bulan)</label>
                    <input
                        type="number"
                        class="form-control @error('period') is-invalid @enderror"
                        id="period"
                        name="period"
                        required
                        value="{{ old('period') }}"
                        min="1"
                        aria-describedby="periodHelp"
                    >
                    <div id="periodHelp" class="form-text">Masukkan jumlah bulan, minimal 1.</div>
                    @error('period')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="nominal" class="form-label">Nominal (Rp)</label>
                    <input
                        type="number"
                        class="form-control @error('nominal') is-invalid @enderror"
                        id="nominal"
                        name="nominal"
                        required
                        value="{{ old('nominal') }}"
                        min="0"
                        aria-describedby="nominalHelp"
                    >
                    <div id="nominalHelp" class="form-text">Masukkan nominal dalam rupiah.</div>
                    @error('nominal')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="status" class="form-label">Status</label>
                    <select
                        class="form-select @error('status') is-invalid @enderror"
                        id="status"
                        name="status"
                        required
                    >
                        <option value="">-- Pilih Status --</option>
                        <option value="aktif" {{ old('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                        <option value="tidak aktif" {{ old('status') == 'tidak aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                    </select>
                    @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('admin.kategori-iuran') }}" class="btn btn-secondary px-4">Kembali</a>
                    <button type="submit" class="btn btn-primary px-4">Simpan Kategori</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
