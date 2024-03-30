<!DOCTYPE html>
<html>
<head>
    <title>Payment Successful</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background-color: #f4f4f4;">
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="card" style="width: 100%; max-width: 600px; border: none; border-radius: 10px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);">
            <div class="card-body">
                <div class="text-center">
                    <img src="images/logo.png" alt="Your Logo" width="150">
                </div>
                <hr>
                <h2 class="text-center" style="color: #333333;">Payment Successful</h2>
                <p>Hello <strong>[Customer Name]</strong>,</p>
                <p>Thank you for your recent purchase. Your payment has been successfully processed.</p>
                <p>Thank you for choosing us!</p>
                <p>If you have any questions or concerns, please don't hesitate to contact our <a href="mailto:support@example.com" style="color: #007bff; text-decoration: none;">support team</a>.</p>
                <hr>
                <p class="text-center" style="color: #888888;">© <span id="currentYear"></span> Mtechub LLC. All rights reserved.</p>
            </div>
        </div>
    </div>
    <script>
        const currentYear = new Date().getFullYear();
        document.getElementById('currentYear').textContent = currentYear;
    </script>
</body>
</html>
