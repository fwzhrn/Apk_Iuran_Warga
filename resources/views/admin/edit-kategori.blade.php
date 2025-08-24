@extends('admin.template')

@section('title', 'Edit Kategori Iuran')

@section('content')
<style>
    .card {
        border-radius: 12px;
    }
    .card-header {
        background-color: #56b6c2;
        color: white;
        border-top-left-radius: 12px;
        border-top-right-radius: 12px;
    }
    .btn-soft-primary {
        background-color: #a3c4f3;
        color: #1a3e72;
        font-weight: 600;
        border-radius: 6px;
    }
    .btn-soft-secondary {
        background-color: #d9d9d9;
        color: #333;
        font-weight: 600;
        border-radius: 6px;
    }
    .form-control {
        border-radius: 6px;
    }
</style>

<div class="container py-4">
    <div class="card mx-auto shadow" style="max-width: 450px;">
        <div class="card-header">
            <h5 class="mb-0">Edit Kategori Iuran</h5>
        </div>
        <div class="card-body" style="color: #33475b;">
            <form method="POST" action="{{ route('admin.kategori-iuran.update', $kategori->id) }}">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="period" class="form-label">Periode (bulan)</label>
                    <input
                        type="number"
                        id="period"
                        name="period"
                        class="form-control @error('period') is-invalid @enderror"
                        required
                        value="{{ old('period', $kategori->period) }}"
                        autofocus
                    >
                    @error('period')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="nominal" class="form-label">Nominal</label>
                    <input
                        type="number"
                        id="nominal"
                        name="nominal"
                        class="form-control @error('nominal') is-invalid @enderror"
                        required
                        value="{{ old('nominal', $kategori->nominal) }}"
                    >
                    @error('nominal')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select
                        id="status"
                        name="status"
                        class="form-control @error('status') is-invalid @enderror"
                        required
                    >
                        <option value="aktif" {{ old('status', $kategori->status) == 'aktif' ? 'selected' : '' }}>Aktif</option>
                        <option value="tidak aktif" {{ old('status', $kategori->status) == 'tidak aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                    </select>
                    @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-soft-primary w-100">
                    Simpan Perubahan
                </button>
                <a href="{{ route('admin.kategori-iuran') }}" class="btn btn-soft-secondary w-100 mt-2">
                    Kembali
                </a>
            </form>
        </div>
    </div>
</div>
@endsection
