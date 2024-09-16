@extends('layouts.home')

@section('content')
    <div class="container">
        <h1>Withdrawal Requests</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Amount (UGX)</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($withdrawals as $withdrawal)
                <tr>
                    <td>{{ $withdrawal->id }}</td>
                    <td>{{ $withdrawal->user->name }}</td>
                    <td>{{ number_format($withdrawal->amount, 2) }}</td>
                    <td>{{ ucfirst($withdrawal->status) }}</td>
                    <td>
                        @if ($withdrawal->status == 'pending')
                            <a href="{{ route('admin.admin.withdrawals.approve', $withdrawal->id) }}" class="btn btn-success btn-sm">Approve</a>
                            <a href="{{ route('admin.admin.withdrawals.reject', $withdrawal->id) }}" class="btn btn-danger btn-sm">Reject</a>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
