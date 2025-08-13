<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Iuran Warga</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            border-radius: 12px;
        }
        .card-header {
            background-color: #56b6c2;
            color: white;
            border-top-left-radius: 12px;
            border-top-right-radius: 12px;
        }
        .btn-submit {
            background-color: #a3c4f3;
            color: #1a3e72;
            font-weight: 600;
            border-radius: 6px;
        }
        .form-control {
            border-radius: 6px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">
                        <h4>Form Pembayaran</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('payment.process') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan nama Anda" required>
                            </div>
                            <div class="mb-3">
                                <label for="amount" class="form-label">Jumlah Pembayaran</label>
                                <input type="number" class="form-control" id="amount" name="amount" placeholder="Masukkan jumlah pembayaran" required>
                            </div>
                            <div class="mb-3">
                                <label for="payment_method" class="form-label">Metode Pembayaran</label>
                                <select class="form-select" id="payment_method" name="payment_method" required>
                                    <option value="bank_transfer">Transfer Bank</option>
                                    <option value="credit_card">Kartu Kredit</option>
                                    <option value="cash">Tunai</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-submit w-100">Bayar Sekarang</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>