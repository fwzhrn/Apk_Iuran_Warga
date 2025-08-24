<!-- filepath: d:\Laravel\iuran_warga\resources\views\home.blade.php -->
@extends('template')

@section('title', 'Home')

@section('content')
    <h1>Selamat datang di Aplikasi Iuran Warga!</h1>
    <p>Silakan gunakan menu di atas untuk navigasi.</p>

    @if(Auth::check() && Auth::user()->payments->count() > 0)
    <div class="card mx-auto shadow mt-4" style="border-radius: 12px;">
        <div class="card-header" style="background-color: #56b6c2; color: #fff; border-top-left-radius: 12px; border-top-right-radius: 12px;">
            <h5 class="mb-0">Daftar Tagihan</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Periode</th>
                            <th>Nominal</th>
                            <th>Petugas</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(Auth::user()->payments as $payment)
                            <tr>
                                <td>{{ $payment->period }}</td>
                                <td>Rp {{ number_format($payment->nominal, 0, ',', '.') }}</td>
                                <td>{{ $payment->petugas }}</td>
                                <td>{{ $payment->created_at->format('d/m/Y') }}</td>
                                <td>
                                    <button class="btn btn-sm btn-success">Bayar</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @elseif(Auth::check())
        <p class="text-center">Belum ada tagihan.</p>
    @endif
@endsection
