<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tharayil Opticals - POS Login</title>
    <style>
        /* Reset and basic styling */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        /* Center the form on the page */
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #2c3e50;  /* Dark blue-grey background */
        }

        /* Form container with POS aesthetic */
        .form-container {
            background-color: #ffffff;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
            max-width: 380px;
            width: 100%;
            text-align: center;
        }

        h2 {
            color: #34495e;  /* Darker text color */
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
        }

        /* Styling for error messages */
        .error-messages {
            background-color: #ffdddd;
            color: #d9534f;
            padding: 0.8rem;
            margin-bottom: 1rem;
            border-radius: 4px;
            font-size: 0.9rem;
            list-style-type: none;
        }

        /* Input fields styling */
        label {
            display: block;
            font-weight: bold;
            margin-bottom: 0.5rem;
            color: #2c3e50;
            text-align: left;
        }

        input[type="email"], input[type="password"] {
            width: 100%;
            padding: 0.8rem;
            margin-bottom: 1rem;
            border: 1px solid #bdc3c7;
            border-radius: 4px;
            font-size: 1rem;
            background-color: #ecf0f1;
        }

        input[type="email"]:focus, input[type="password"]:focus {
            border-color: #3498db; /* Light blue accent */
            outline: none;
        }

        /* POS style button */
        button {
            width: 100%;
            padding: 0.8rem;
            background-color: #3498db;  /* Bright blue for POS visibility */
            color: #ffffff;
            border: none;
            border-radius: 4px;
            font-size: 1rem;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #2980b9;  /* Darker blue for hover */
        }

        /* Footer note for branding */
        .footer-note {
            margin-top: 1.5rem;
            font-size: 0.85rem;
            color: #7f8c8d;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Tharayil Opticals POS Login</h2>

        @if($errors->any())
            <div class="error-messages">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf
            <label for="email">Username:</label>
            <input type="email" name="email" required>

            <label for="password">Password:</label>
            <input type="password" name="password" required>

            <button type="submit">Login</button>
        </form>

        <div class="footer-note">
        </div>
    </div>
</body>
</html>
