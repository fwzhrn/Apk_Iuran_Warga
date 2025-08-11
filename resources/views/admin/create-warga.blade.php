@extends('admin.template')

@section('title', 'Tambah Data Warga')

@section('content')
<div class="container py-4">
    <div class="card mx-auto shadow rounded-3" style="max-width: 450px;">
        <div class="card-header bg-primary text-white rounded-top">
            <h5 class="mb-0">Tambah Data Warga</h5>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.data-warga.store') }}">
                @csrf
                
                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        class="form-control @error('name') is-invalid @enderror"
                        required
                        value="{{ old('name') }}"
                        autofocus
                        autocomplete="name"
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
                        value="{{ old('username') }}"
                        autocomplete="username"
                    >
                    @error('username')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        class="form-control @error('password') is-invalid @enderror"
                        required
                        autocomplete="new-password"
                    >
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-success w-100">Simpan</button>
                <a href="{{ route('admin.data-warga') }}" class="btn btn-secondary w-100 mt-2">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection
