<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Affiliate Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f6f9;
        }

        .dashboard-container {
            max-width: 100%;
            margin: 20px auto;
            padding: 15px;
        }

        .dashboard-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .dashboard-header h1 {
            font-size: 24px;
            font-weight: bold;
            color: #333;
        }

        .dashboard-header p {
            font-size: 14px;
            color: #555;
        }

        .stat-card {
            background-color: #fff;
            border-radius: 10px;
            padding: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            margin-bottom: 20px;
        }

        .stat-card h4 {
            font-size: 16px;
            font-weight: bold;
            color: #007bff;
            margin-bottom: 10px;
        }

        .stat-card p {
            font-size: 18px;
            font-weight: 600;
            color: #333;
        }

        .link-card {
            background-color: #e3f2fd;
            border-radius: 10px;
            padding: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            display: flex;
            flex-direction: column;
        }

        .link-card input {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #007bff;
            border-radius: 5px;
        }

        .link-card button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
        }

        .link-card button:hover {
            background-color: #0056b3;
        }

        .tools-card {
            background-color: #fff;
            border-radius: 10px;
            padding: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            margin-bottom: 20px;
            transition: all 0.3s ease;
        }

        .tools-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
        }

        .tools-card h5 {
            font-size: 16px;
            font-weight: bold;
            color: #333;
            margin-bottom: 10px;
        }

        .tools-card p {
            font-size: 14px;
            color: #555;
        }

        .submit-btn {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px;
            font-size: 14px;
            border-radius: 5px;
            cursor: pointer;
        }

        .submit-btn:hover {
            background-color: #0056b3;
        }

        .table-responsive {
            margin-top: 20px;
        }

        .table th, .table td {
            font-size: 14px;
        }

        .table-hover tbody tr:hover {
            background-color: #f1f1f1;
        }

        /* Responsive Design for smaller screens */
        @media (max-width: 576px) {
            .dashboard-header h1 {
                font-size: 20px;
            }

            .stat-card h4, .tools-card h5 {
                font-size: 14px;
            }

            .stat-card p {
                font-size: 16px;
            }

            .tools-card p {
                font-size: 12px;
            }

            .submit-btn {
                font-size: 12px;
            }
        }
    </style>
</head>
<body>
<div class="container dashboard-container">
    <!-- Dashboard Header -->
    <div class="dashboard-header">
        <h1 class="text-info">Affiliate Dashboard</h1>
        <p>Your hub for managing earnings, referrals, and promotional tools.</p>
    </div>

    <!-- Statistics Row -->
    <div class="row text-center mb-4">
        <div class="col-12 mb-3">
            <div class="stat-card">
                <h4>Total Referrals</h4>
                <p>0</p>
            </div>
        </div>
        <div class="col-12 mb-3">
            <div class="stat-card">
                <h4>Total Earnings</h4>
                <p>UGX 0</p>
            </div>
        </div>
        <div class="col-12 mb-3">
            <div class="stat-card">
                <h4>Pending Withdrawals</h4>
                <p>UGX 0</p>
            </div>
        </div>
    </div>

    <!-- Referral Links -->
    <div class="link-card">
        <h5>Your Unique Referral Link</h5>
        <input type="text" value="https://example.com/referral?id=12345" readonly>
        <button>Copy Link</button>
    </div>

    <!-- Promotional Tools Row -->
    <div class="row">
        <div class="col-12 mb-3">
            <div class="tools-card">
                <h5>Banners</h5>
                <p>Download high-quality banners for your website or blog.</p>
                <button class="submit-btn">Download Now</button>
            </div>
        </div>
        <div class="col-12 mb-3">
            <div class="tools-card">
                <h5>Social Media Posts</h5>
                <p>Share pre-designed posts to attract referrals via social media.</p>
                <button class="submit-btn">Get Posts</button>
            </div>
        </div>
        <div class="col-12 mb-3">
            <div class="tools-card">
                <h5>Email Templates</h5>
                <p>Use our professionally designed email templates to invite affiliates.</p>
                <button class="submit-btn">Download Templates</button>
            </div>
        </div>
    </div>

    <!-- Recent Activity Row -->
    <div class="table-responsive">
        <h4>Recent Affiliate Activity</h4>
        <table class="table table-striped table-hover">
            <thead class="table-dark">
            <tr>
                <th>Date</th>
                <th>Affiliate Name</th>
                <th>Action</th>
                <th>Earnings (UGX)</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>2024-09-07</td>
                <td>John Doe</td>
                <td>Referral Signup</td>
                <td>UGX 4,600</td>
            </tr>
            <tr>
                <td>2024-09-06</td>
                <td>Jane Smith</td>
                <td>Referral Purchase</td>
                <td>UGX 46,000</td>
            </tr>
            <tr>
                <td>2024-09-05</td>
                <td>Peter Johnson</td>
                <td>Referral Signup</td>
                <td>UGX 4,600</td>
            </tr>
            </tbody>
        </table>
    </div>
</div>

<!-- Include Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
