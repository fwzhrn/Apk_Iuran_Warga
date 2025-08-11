@extends('admin.template')

@section('title', 'Edit Data Warga')

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
            <h5 class="mb-0">Edit Data Warga</h5>
        </div>
        <div class="card-body" style="color: #33475b;">
            <form method="POST" action="{{ route('admin.data-warga.update', $user->id) }}">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        class="form-control @error('name') is-invalid @enderror"
                        required
                        value="{{ old('name', $user->name) }}"
                        autofocus
                    >
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input
                        type="text"
                        id="username"
                        name="username"
                        class="form-control @error('username') is-invalid @enderror"
                        required
                        value="{{ old('username', $user->username) }}"
                    >
                    @error('username')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-soft-primary w-100">
                    Simpan Perubahan
                </button>
                <a href="{{ route('admin.data-warga') }}" class="btn btn-soft-secondary w-100 mt-2">
                    Kembali
                </a>
            </form>
        </div>
    </div>
</div>
@endsection
