<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>EPR BFAR System</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <style>
            /* Tailwindcss styling */
            * {
                box-sizing: border-box;
            }
            body {
                font-family: Figtree, sans-serif;
                margin: 0;
                background-color: #f3f4f6;
                background-image: url('/images/welcome.png'); /* Replace with your image URL */
                background-size: cover;
                background-position: center;
            }
            .header {
                font-size: 2.5rem;
                font-weight: 600;
                color: #111827;
                margin-bottom: 1rem;
            }
            .subheader {
                font-size: 1.25rem;
                font-weight: 400;
                color: indigo;
                margin-bottom: 2rem;
            }
            .btn {
                display: inline-block;
                padding: 10px 20px;
                background-color: #0B2F9F;
                color: white;
                text-decoration: none;
                border-radius: 5px;
                font-weight: 600;
                transition: background-color 0.3s ease;
            }
            .btn:hover {
                background-color: #161D6F;
            }
            .welcome-container {
                text-align: center;
                padding: 3rem 1rem;
            }
            .link-container {
                margin-top: 1.5rem;
            }
            /* Even smaller Button style for Log in and Register */
            .auth-btn {
                display: inline-block;
                padding: 4px 10px; /* Even smaller padding */
                background-color: #0B2F9F;
                color: white;
                text-decoration: none;
                border-radius: 5px;
                font-weight: 600;
                font-size: 0.65rem; /* Smaller font size */
                margin-left: 10px;
                margin-top: 5px;
                transition: background-color 0.3s ease;
            }
            .auth-btn:hover {
                background-color: #161D6F;
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-gray-100 dark:bg-gray-900">
            @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10 auth-links">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="auth-btn">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="auth-btn">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="welcome-container">
                <h1 class="header">Welcome to the EPR BFAR System</h1>
                <p class="subheader">Your one-stop platform for managing fisheries-related data efficiently and effectively.</p>

                <a href="{{ route('login') }}" class="btn">Get Started</a>
                
                <div class="link-container">
                    <a href="https://www.bfar.da.gov.ph/" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Learn More</a>
                </div>
                
            </div>
        </div>
    </body>
</html>
