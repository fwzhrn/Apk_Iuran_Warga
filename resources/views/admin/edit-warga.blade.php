@extends('admin.template')

@section('title', 'Edit Data Warga')

@section('content')
<div class="container py-4">
    <div class="card mx-auto shadow" style="max-width: 450px; border-radius: 12px;">
        <div class="card-header bg-primary text-white" style="border-top-left-radius: 12px; border-top-right-radius: 12px;">
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
                        style="border-radius: 6px;"
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
                        style="border-radius: 6px;"
                    >
                    @error('username')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-success w-100" style="font-weight: 600;">
                    Simpan Perubahan
                </button>
                <a href="{{ route('admin.data-warga') }}" class="btn btn-secondary w-100 mt-2" style="font-weight: 600;">
                    Kembali
                </a>
            </form>
        </div>
    </div>
</div>
@endsection
