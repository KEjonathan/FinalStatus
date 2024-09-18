@extends('layouts.home')

@section('content')
    <div class="container text-info">
        <h1>Request WhatsApp Withdrawal</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('user.withdrawal.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="screenshot">Upload Screenshot</label>
                <input type="file" class="form-control @error('screenshot') is-invalid @enderror" id="screenshot" name="screenshot" required>
                @error('screenshot')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Submit Request</button>
        </form>
    </div>
@endsection
