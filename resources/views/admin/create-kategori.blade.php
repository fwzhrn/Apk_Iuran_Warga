@extends('admin.template')

@section('title', 'Tambah Kategori Iuran')

@section('content')
<style>
    .card {
        border-radius: 12px;
    }
    .card-header {
        background-color: #56b6c2 !important;
        color: white !important;
        border-top-left-radius: 12px;
        border-top-right-radius: 12px;
    }
    .form-control:focus, .form-select:focus {
        border-color: #56b6c2;
        box-shadow: 0 0 0 0.2rem rgba(86, 182, 194, 0.25);
    }
    .btn-soft-primary {
        background-color: #a3c4f3;
        color: #1a3e72;
        font-weight: 600;
        border-radius: 6px;
    }
    .btn-soft-secondary {
        background-color: #e9f3f4;
        color: #33475b;
        font-weight: 600;
        border-radius: 6px;
        border: 1px solid #c9dfe0;
    }
</style>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow border-0">
                <div class="card-header text-center py-3">
                    <h4 class="mb-0 fw-bold">Tambah Kategori Iuran</h4>
                </div>
                <div class="card-body p-4" style="color: #33475b;">
                    <form method="POST" action="{{ route('admin.kategori-iuran.store') }}">
                        @csrf

                        {{-- Periode --}}
                        <div class="mb-3">
                            <label for="period" class="form-label fw-semibold">Periode (bulan)</label>
                            <input
                                type="number"
                                id="period"
                                name="period"
                                class="form-control form-control-lg @error('period') is-invalid @enderror"
                                value="{{ old('period') }}"
                                min="1"
                                required
                            >
                            @error('period')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Nominal --}}
                        <div class="mb-3">
                            <label for="nominal" class="form-label fw-semibold">Nominal (Rp)</label>
                            <input
                                type="number"
                                id="nominal"
                                name="nominal"
                                class="form-control form-control-lg @error('nominal') is-invalid @enderror"
                                value="{{ old('nominal') }}"
                                min="0"
                                required
                            >
                            @error('nominal')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Status --}}
                        <div class="mb-4">
                            <label for="status" class="form-label fw-semibold">Status</label>
                            <select
                                id="status"
                                name="status"
                                class="form-select form-select-lg @error('status') is-invalid @enderror"
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

                        {{-- Tombol --}}
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-soft-primary btn-lg">
                                Simpan Kategori
                            </button>
                            <a href="{{ route('admin.kategori-iuran') }}" class="btn btn-soft-secondary btn-lg">
                                Kembali
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
