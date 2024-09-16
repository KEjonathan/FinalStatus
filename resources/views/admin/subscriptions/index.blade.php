<!-- resources/views/admin/subscriptions/index.blade.php -->

@extends('layouts.home')

@section('content')
    <div class="container">
        <h1 class="mb-4">Manage Subscriptions</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-striped">
            <thead>
            <tr>
                <th>User</th>
                <th>Package</th>
                <th>Subscribed At</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($subscriptions as $subscription)
                <tr>
                    <td>{{ $subscription->user->name }}</td>
                    <td>{{ $subscription->package->title }}</td>
                    <td>{{ $subscription->subscribed_at->format('Y-m-d') }}</td>
                    <td>{{ ucfirst($subscription->status) }}</td>
                    <td>
                        @if ($subscription->status === 'pending')
                            <form action="{{ route('admin.admin.subscriptions.approve', $subscription->id) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-primary">Approve</button>
                            </form>
                        @else
                            <span class="text-muted">Approved</span>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
