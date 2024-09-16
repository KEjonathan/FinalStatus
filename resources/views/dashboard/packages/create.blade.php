@extends('layouts.home')

@section('content')
    <div class="container">
        <h1>Add New Package</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form action="{{ route('admin.packages.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="title">Package Name</label>
                <input type="text" id="title" name="title" class="form-control" value="{{ old('title') }}" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description" class="form-control" rows="4" required>{{ old('description') }}</textarea>
            </div>

            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" id="price" name="price" class="form-control" step="0.01" value="{{ old('price') }}" placeholder="In USD" required>
            </div>

            <div class="form-group">
                <label for="type">Package Type</label>
                <select id="type" name="type" class="form-control" required>
                    <option value="basic" {{ old('type') == 'basic' ? 'selected' : '' }}>Basic</option>
                    <option value="premium" {{ old('type') == 'premium' ? 'selected' : '' }}>Premium</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Add Package</button>
        </form>
    </div>
@endsection
