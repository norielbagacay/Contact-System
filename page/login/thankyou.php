<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You for Registering</title>
    <style>
        .thank-you-container {
            text-align: center;
            margin-top: 50px;
        }
        .thank-you-message {
            font-size: 24px;
            margin-bottom: 20px;
        }
        .continue-button {
            padding: 10px 20px;
            font-size: 18px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="thank-you-container">
        <p class="thank-you-message">Thank you for registering!</p>
        <button class="continue-button" onclick="continueToLogin()">Continue</button>
    </div>

    <script>
        function continueToLogin() {
            window.location.href = "../login/login.php";
        }
    </script>
</body>
</html>
