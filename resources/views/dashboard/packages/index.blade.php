@extends('layouts.home')

@section('content')
    <div class="container mt-2">
        {{-- Display Error --}}
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong><i class="fas fa-exclamation-circle"></i> Subscription Required:</strong>
                {{ session('error') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <h1 class="mb-4 mt-2 text-info">Available Packages</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="row">
            @forelse($packages as $package)
                <div class="col-md-4">
                    <div class="card mb-4 subscription-card shadow-sm position-relative">
                        {{-- Ribbon for Subscription Type --}}
                        <div class="ribbon">
                            <span>{{ $package->type }}</span> <!-- Example: 'Basic' or 'Premium' -->
                        </div>

                        <div class="card-body text-center">
                            <h5 class="card-title font-weight-bold">{{ $package->name }}</h5>
                            <p class="text-muted">{{ $package->description }}</p>
                            <p class="card-price"><strong>{{ $currencySymbol }} {{ $package->price }}</strong>/month</p>

                            {{-- List of Package Features --}}
                            <ul class="list-unstyled package-features">
                                <li><i class="fas fa-check"></i> Whatsapp Ads</li>
                                <li><i class="fas fa-check"></i> Travia</li>
                                <li><i class="fas fa-check"></i> Wheel Spin</li>
                            </ul>

                            <form action="{{ route('packages.subscribe', $package->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-outline-primary btn-block">Subscribe</button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <h3 class="text-info">No Subscription Packages Added Yet.</h3>
                </div>
            @endforelse
        </div>
    </div>
@endsection
