@extends('layouts.home')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4 text-center">WhatsApp Ads</h1>

        {{-- Check if there are ads available --}}
        @if($ads->isEmpty())
            <div class="alert alert-info text-center">
                <p>No ads available at the moment.
                </p>
            </div>
        @else
            <div class="row g-3">
                @foreach($ads as $ad)
                    <div class="col-12 col-md-4 mb-4">
                        <div class="card whatsapp-ad-card shadow-sm h-100">
                            {{-- Ad Image --}}
                            <div class="ad-image-wrapper">
                                <img src="{{ asset('storage/' . $ad->image) }}" class="card-img-top ad-image" alt="{{ $ad->title }}">
                            </div>

                            {{-- Ad Details --}}
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">{{ $ad->title }}</h5>
                                <p class="card-text">{{ Str::limit($ad->description, 100) }}</p>

                                {{-- Action Buttons --}}
                                <div class="mt-auto">
                                    <a href="{{ asset('storage/' . $ad->image) }}" class="btn btn-outline-success w-100" download>Download Ad</a>
                                </div>
                             </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
