
@extends('template')

@section('title', 'Profil Saya')

@section('content')
<div class="container">
    <div class="card mx-auto" style="max-width: 400px;">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Profil Saya</h5>
        </div>
        <div class="card-body">
            <p><strong>Nama:</strong> {{ $user->name }}</p>
            <p><strong>Username:</strong> {{ $user->username }}</p>
            <p><strong>Level:</strong> {{ ucfirst($user->level) }}</p>
            <a href="{{ route('profile.edit') }}" class="btn btn-warning mt-3 w-100">Edit Profil</a>
        </div>
    </div>
</div>
@endsection