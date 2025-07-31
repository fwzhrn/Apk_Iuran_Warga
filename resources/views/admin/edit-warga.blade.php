@extends('admin.template')

@section('title', 'Edit Data Warga')

@section('content')
<div class="container">
    <div class="card mx-auto" style="max-width: 400px;">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Edit Data Warga</h5>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.data-warga.update', $user->id) }}">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" name="name" class="form-control" required value="{{ old('name', $user->name) }}">
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" required value="{{ old('username', $user->username) }}">
                </div>
                <button type="submit" class="btn btn-success w-100">Simpan Perubahan</button>
                <a href="{{ route('admin.data-warga') }}" class="btn btn-secondary w-100 mt-2">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection