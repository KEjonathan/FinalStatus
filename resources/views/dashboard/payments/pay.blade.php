<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Methods</title>
    <!-- Include Bootstrap for styling -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .payment-card {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            text-align: center;
            transition: 0.3s ease;
            cursor: pointer;
        }

        .payment-card:hover {
            background-color: #f1f1f1;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .payment-card img {
            width: 50px;
            height: auto;
            margin-bottom: 15px;
        }

        /* Mobile-friendly grid */
        .payment-methods-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 20px;
        }

        @media(min-width: 768px) {
            .payment-methods-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media(min-width: 992px) {
            .payment-methods-grid {
                grid-template-columns: repeat(4, 1fr);
            }
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center mb-4 text-info mt-2">Select Your Payment Method</h1>

    <div class="payment-methods-grid">
        <!-- MTN Pay -->
{{--        <div class="payment-card" data-bs-toggle="modal" data-bs-target="#paymentModal" onclick="selectPayment('MTN Pay')">--}}
{{--            <img src="{{ asset('img/mtn.png') }}" alt="MTN Pay">--}}
{{--            <h5>MTN Pay</h5>--}}
{{--            <p>Pay securely using MTN Mobile Money.</p>--}}
{{--        </div>--}}

        <!-- Airtel Pay -->
{{--        <div class="payment-card" data-bs-toggle="modal" data-bs-target="#paymentModal" onclick="selectPayment('Airtel Pay')">--}}
{{--            <img src="{{ asset('img/airtel.png') }}" alt="Airtel Pay">--}}
{{--            <h5>Airtel Pay</h5>--}}
{{--            <p>Pay securely using Airtel Mobile Money.</p>--}}
{{--        </div>--}}

        <!-- Perfect Money -->
{{--        <div class="payment-card" data-bs-toggle="modal" data-bs-target="#paymentModal" onclick="selectPayment('Perfect Money')">--}}
{{--            <img src="{{ asset('img/perfect.png') }}" alt="Perfect Money">--}}
{{--            <h5>Perfect Money</h5>--}}
{{--            <p>Pay with Perfect Money for global transactions.</p>--}}
{{--        </div>--}}

        <!-- Debit/Credit Card -->
        <div class="payment-card" data-bs-toggle="modal" data-bs-target="#paymentModal" onclick="selectPayment('EverSend')">
            <img src="{{ asset('img/eversend.png') }}" alt="EverSend">
            <h5>EverSend</h5>
            <p>Borderless money payments across Africa.</p>
        </div>
    </div>

    <!-- Payment form Modal -->
    <div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="paymentModalLabel">Payment Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h5 id="selected-payment" class="text-center mb-4">No Payment Method Selected</h5>
{{--                    <form action="" method="POST">--}}
{{--                        @csrf--}}
{{--                        <input type="hidden" name="payment_method" id="paymentMethod">--}}
{{--                        <div class="form-group mb-3">--}}
{{--                            <label for="amount">Amount (UGX):</label>--}}
{{--                            <input type="number" class="form-control" id="amount" name="amount" placeholder="Enter amount" required>--}}
{{--                        </div>--}}
{{--                        <button type="submit" class="btn btn-primary btn-block w-100">Proceed to Payment</button>--}}
{{--                    </form>--}}
                    <a class="link-info" href="http://eversend.me/upsox">Continue</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Include Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    function selectPayment(method) {
        document.getElementById('selected-payment').innerHTML = 'Selected Payment Method: ' + method;
        document.getElementById('paymentMethod').value = method;
    }
</script>
</body>
</html>
