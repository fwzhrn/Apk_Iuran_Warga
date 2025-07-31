@extends('admin.template')

@section('title', 'Kategori Iuran')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Kategori Iuran</h5>
            <a href="#" class="btn btn-success btn-sm">
                <i class="fas fa-plus"></i> Tambah Kategori
            </a>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped align-middle">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Periode</th>
                        <th>Nominal</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($kategori as $i => $kat)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td>{{ $kat->period }}</td>
                            <td>Rp{{ number_format($kat->nominal,0,',','.') }}</td>
                            <td>{{ $kat->status }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">Belum ada kategori iuran.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection