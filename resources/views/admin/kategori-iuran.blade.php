@extends('admin.template')

@section('title', 'Kategori Iuran')

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
    .btn-soft-warning {
        background-color: #f9d8a6;
        color: #7a4e00;
        font-weight: 600;
        border-radius: 6px;
    }
    .btn-soft-danger {
        background-color: #f4a6a6;
        color: #721c24;
        font-weight: 600;
        border-radius: 6px;
    }
    table thead {
        background-color: #e9f3f4;
    }
</style>

<div class="container py-4">
    <div class="card shadow">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Kategori Iuran</h5>
            <a href="{{ route('admin.kategori-iuran.create') }}" class="btn btn-soft-primary btn-sm">
                <i class="fas fa-plus"></i> Tambah Kategori
            </a>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped align-middle mb-0">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 5%;">No</th>
                        <th>Periode</th>
                        <th>Nominal</th>
                        <th class="text-center">Status</th>
                        <th class="text-center" style="width: 20%;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($kategori as $i => $kat)
                        <tr>
                            <td class="text-center">{{ $i + 1 }}</td>
                            <td>{{ $kat->period }}</td>
                            <td>Rp{{ number_format($kat->nominal,0,',','.') }}</td>
                            <td class="text-center">
                                @if(strtolower($kat->status) === 'aktif')
                                    <span class="badge bg-success">{{ $kat->status }}</span>
                                @else
                                    <span class="badge bg-secondary">{{ $kat->status }}</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{ route('admin.kategori-iuran.edit', $kat->id) }}" class="btn btn-soft-warning btn-sm me-1">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('admin.kategori-iuran.delete', $kat->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-soft-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-3">Belum ada kategori iuran.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
