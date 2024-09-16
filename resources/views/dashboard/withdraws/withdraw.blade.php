<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Withdraw History</title>
    <!-- Include Bootstrap for styling -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    @vite(['resources/js/status.js', 'resources/css/status.css'])
    <style>
        body {
            background-color: #f8f9fa;
        }
        .withdraw-history-table {
            margin-top: 30px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #fff;
            padding: 20px;
        }
        .table thead {
            background-color: #f8f9fa;
        }
        .table th, .table td {
            text-align: center;
            vertical-align: middle;
        }
        /* Styling for mobile */
        @media (max-width: 768px) {
            h1 {
                font-size: 1.5rem;
            }
            .table th, .table td {
                font-size: 0.9rem;
            }
            .btn-sm {
                padding: 0.5rem 1rem;
                font-size: 0.9rem;
            }
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-4 text-center text-info">Withdrawal History</h1>
    <div class="withdraw-history-table">
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Transaction ID</th>
                    <th>Amount (UGX)</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Details</th>
                </tr>
                </thead>
                <tbody>
                @forelse($withdrawals as $withdrawal)
                    <tr>
                        <td>{{ $withdrawal->transaction_id }}</td>
                        <td>{{ number_format($withdrawal->amount) }}</td>
                        <td>{{ $withdrawal->date }}</td>
                        <td>
                            @if($withdrawal->status == 'completed')
                                <span class="badge bg-success">Completed</span>
                            @elseif($withdrawal->status == 'pending')
                                <span class="badge bg-warning">Pending</span>
                            @else
                                <span class="badge bg-danger">Failed</span>
                            @endif
                        </td>
                        <td><a href="" class="btn btn-info btn-sm w-100">View Details</a></td>
                    </tr>
                @empty
                    <div class="col-12 text-center">
                        <h3 class="text-info">No Withdraw History Yet.</h3>
                    </div>
                @endforelse

                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Include Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
