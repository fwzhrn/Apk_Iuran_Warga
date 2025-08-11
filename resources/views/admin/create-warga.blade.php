@extends('admin.template')

@section('title', 'Tambah Data Warga')

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
    .btn-soft-primary {
        background-color: #a3c4f3;
        color: #1a3e72;
        font-weight: 600;
        border-radius: 6px;
    }
    .btn-soft-secondary {
        background-color: #e0e0e0;
        color: #333;
        font-weight: 600;
        border-radius: 6px;
    }
</style>

<div class="container py-4">
    <div class="card mx-auto shadow" style="max-width: 500px;">
        <div class="card-header text-center">
            <h5 class="mb-0 fw-bold">Tambah Data Warga</h5>
        </div>
        <div class="card-body p-4" style="color: #33475b;">
            <form method="POST" action="{{ route('admin.data-warga.store') }}">
                @csrf
                
                {{-- Nama --}}
                <div class="mb-3">
                    <label for="name" class="form-label fw-semibold">Nama</label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        class="form-control @error('name') is-invalid @enderror"
                        required
                        value="{{ old('name') }}"
                        autofocus
                        style="border-radius: 8px;"
                    >
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                {{-- Username --}}
                <div class="mb-3">
                    <label for="username" class="form-label fw-semibold">Username</label>
                    <input
                        type="text"
                        id="username"
                        name="username"
                        class="form-control @error('username') is-invalid @enderror"
                        required
                        value="{{ old('username') }}"
                        style="border-radius: 8px;"
                    >
                    @error('username')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                {{-- Password --}}
                <div class="mb-4">
                    <label for="password" class="form-label fw-semibold">Password</label>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        class="form-control @error('password') is-invalid @enderror"
                        required
                        style="border-radius: 8px;"
                    >
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Tombol --}}
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-soft-primary btn-lg">
                        Simpan Data
                    </button>
                    <a href="{{ route('admin.data-warga') }}" class="btn btn-soft-secondary btn-lg">
                        Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
