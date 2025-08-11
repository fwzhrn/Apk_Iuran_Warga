@extends('admin.template')

@section('title', 'Kategori Iuran')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Kategori Iuran</h5>
            <a href="{{ route('admin.kategori-iuran.create') }}" class="btn btn-success btn-sm">
                <i class="fas fa-plus"></i> Tambah Kategori
            </a>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped align-middle">
                <thead class="table-light">
                    <tr>
                        <th class="text-center">No</th>
                        <th>Periode</th>
                        <th>Nominal</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Aksi</th>
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
                                <a href="{{ route('admin.kategori-iuran.edit', $kat->id) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('admin.kategori-iuran.delete', $kat->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">Belum ada kategori iuran.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
