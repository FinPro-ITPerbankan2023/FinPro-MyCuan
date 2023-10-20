<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choose Role</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            text-align: center;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            background-color: #f5f5f5;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            margin: 10px;
            text-decoration: none;
            color: #fff;
            background-color: #3490dc;
            border-radius: 5px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Choose Your Role</h2>

    <a href="{{ route('register', ['role' => 'lender']) }}" class="btn">Register as Lender</a>
    <a href="{{ route('register-borrower', ['role' => 'borrower']) }}" class="btn">Register as Borrower</a>

    <!-- Optional: You can include a link to an existing registration page -->
    <p>Already have an account? <a href="{{ route('login') }}">Login here</a></p>
</div>

</body>
</html>
