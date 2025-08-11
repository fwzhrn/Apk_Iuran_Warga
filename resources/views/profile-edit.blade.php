@extends('template')

@section('title', 'Edit Profil')

@section('content')
<div class="container py-4">
    <div class="card mx-auto shadow" style="max-width: 450px; border-radius: 12px;">
        <div class="card-header" style="background-color: #56b6c2; color: #fff; border-top-left-radius: 12px; border-top-right-radius: 12px;">
            <h5 class="mb-0">Edit Profil</h5>
        </div>
        <div class="card-body" style="color: #33475b;">
            <form method="POST" action="{{ route('profile.update') }}">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        class="form-control @error('name') is-invalid @enderror"
                        value="{{ old('name', $user->name) }}"
                        required
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
                        value="{{ old('username', $user->username) }}"
                        required
                        style="border-radius: 6px;"
                    >
                    @error('username')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit"
                    class="btn"
                    style="background-color: #a3c4f3; color: #1a3e72; font-weight: 600; width: 100%; border-radius: 6px;">
                    Simpan Perubahan
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
