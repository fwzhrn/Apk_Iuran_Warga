@extends('admin.template')

@section('title', 'Data Warga')

@section('content')
<div class="container py-4">
    <div class="card shadow rounded-3">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center rounded-top">
            <h5 class="mb-0">Data Warga</h5>
            <a href="{{ route('admin.data-warga.create') }}" class="btn btn-success btn-sm">
                <i class="fas fa-plus"></i> Tambah Warga
            </a>
        </div>
        <div class="card-body p-0">
            <table class="table table-bordered table-striped mb-0 align-middle">
                <thead class="table-light">
                    <tr>
                        <th style="width: 5%;">No</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Level</th>
                        <th style="width: 15%;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($warga as $i => $user)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ ucfirst($user->level) }}</td>
                            <td>
                                <a href="{{ route('admin.data-warga.edit', $user->id) }}" class="btn btn-sm btn-warning me-1">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                
                                <form action="{{ route('admin.data-warga.delete', $user->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button
                                        type="submit"
                                        class="btn btn-sm btn-danger"
                                        onclick="return confirm('Yakin hapus?')"
                                    >
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-3">Tidak ada data warga.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
