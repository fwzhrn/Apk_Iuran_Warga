@extends('template')

@section('title', 'Profil Saya')

@section('content')
<div class="container py-4">
    <div class="card mx-auto shadow" style="max-width: 450px; border-radius: 12px;">
        <div class="card-header" style="background-color: #56b6c2; color: #fff; border-top-left-radius: 12px; border-top-right-radius: 12px;">
            <h5 class="mb-0">Profil Saya</h5>
        </div>
        <div class="card-body" style="color: #33475b;">
            <p><strong>Nama:</strong> {{ $user->name }}</p>
            <p><strong>Username:</strong> {{ $user->username }}</p>
            <p><strong>Level:</strong> {{ ucfirst($user->level) }}</p>
            
            @if($user->duesMembers->count() > 0)
                @php
                    $duesMember = $user->duesMembers->first();
                    $category = $duesMember->duesCategory;
                @endphp
                <p><strong>Kategori Iuran:</strong> {{ $category->display_name }}</p>
                <p><strong>Periode Pembayaran:</strong> {{ ucfirst($duesMember->periode_pembayaran) }}</p>
            @else
                <p><strong>Kategori Iuran:</strong> <span class="text-danger">Belum dipilih</span></p>
            @endif

            <a href="{{ route('profile.edit') }}" class="btn" 
               style="background-color: #a3c4f3; color: #1a3e72; font-weight: 600; width: 100%; margin-top: 1.5rem; border-radius: 6px;">
                Edit Profil
            </a>
        </div>
    </div>

</div>
@endsection
