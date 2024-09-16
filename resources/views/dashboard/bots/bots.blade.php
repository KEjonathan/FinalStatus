<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forex Bots for Sale</title>
    <!-- Include Bootstrap for styling -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }
        h1 {
            font-weight: 700;
            color: #343a40;
            font-size: 1.8rem; /* Bigger title for mobile */
        }
        .forex-bot-card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 8px 15px rgba(0,0,0,0.1);
            overflow: hidden;
            transition: all 0.3s ease;
            background-color: #fff;
            padding: 15px;
            text-align: center;
        }
        .forex-bot-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 20px rgba(0,0,0,0.15);
        }
        .forex-bot-card img {
            max-width: 100%;
            height: auto;
            border-bottom: 1px solid #f0f0f0;
            padding-bottom: 10px;
        }
        .forex-bot-card h3 {
            font-size: 1.2rem;
            font-weight: 600;
            color: #212529;
            margin-top: 10px;
            margin-bottom: 8px;
        }
        .forex-bot-card p {
            font-size: 0.9rem;
            color: #6c757d;
            margin-bottom: 12px;
        }
        .forex-bot-card .price {
            font-size: 1.5rem;
            font-weight: bold;
            color: #28a745;
            margin-bottom: 15px;
        }
        .btn-success {
            background-color: #28a745;
            border: none;
            padding: 12px 20px;
            font-size: 1.1rem;
            transition: background-color 0.3s ease;
            width: 100%; /* Full width for better touch interaction */
        }
        .btn-success:hover {
            background-color: #218838;
        }

        /* Mobile-friendly layout adjustments */
        @media (max-width: 768px) {
            h1 {
                font-size: 1.5rem; /* Slightly smaller for smaller screens */
            }
            .forex-bot-card {
                margin-bottom: 30px;
            }
            .row.g-4 {
                row-gap: 20px; /* More spacing between cards */
            }
        }

        /* Larger screen adjustments for better display */
        @media (min-width: 768px) {
            .forex-bot-card img {
                height: 200px; /* Maintain a standard image height */
            }
            .forex-bot-card {
                padding: 20px;
            }
        }
    </style>
</head>
<body>

<div class="container mt-4">
    <h1 class="mb-4 text-center">Forex Bots for Sale</h1>
    <div class="row g-3">
        @foreach($forexBots as $bot)
            <div class="col-12 col-md-4"> <!-- Full width on mobile, 3 per row on larger screens -->
                <div class="forex-bot-card">
                    <img src="{{ asset('/img/avatar.png') }}" alt="{{ $bot->title }}">
                    <h3>{{ $bot->title }}</h3>
                    <p>{{ $bot->description }}</p>
                    <p class="price">{{ $bot->price }} UGX</p>
                    <a href="{{ $bot->purchase_url }}" class="btn btn-success">Buy Now</a>
                </div>
            </div>
        @endforeach
    </div>
</div>

<!-- Include Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
