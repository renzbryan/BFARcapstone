<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Stock</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        nav {
            background-color: #29487d;
            padding: 15px;
            margin-bottom: 20px;
            height: 100px;
            display: flex;
            justify-content: flex-end;
        }

        nav a {
            color: #ffffff;
            margin: 25px;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s ease-in-out;
        }

        nav a:hover {
            color: #0056b3;
            text-decoration: none;
        }

        .container {
            margin-top: 150px;
        }

        .card {
            margin-bottom: 20px;
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease-in-out, transform 0.3s ease-in-out;
        }

        .card:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            transform: scale(1.025);
        }

        .card-header {
            background-color: #343a40;
            color: #ffffff;
            border-radius: 10px 10px 0 0;
        }

        .card-body {
            padding: 20px;
        }

        .card-text1 {
            font-size: 25px;
        }

    </style>
</head>

<body>
    <nav class="fixed-top">
        <a href="{{ route('dashboard') }}">Dashboard</a>
        <a href="{{ route('archive.iar') }}">Archived IAR Forms</a>
        <!-- You can add more navigation links here -->
    </nav>
    <div class="container">
        <h1>Wasted Material Report</h1>
        <div class="row">
            @foreach($wmrEntries as $item)
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                    <h2>{{ $item->item_name }}</h2>
                    </div>
                    <div class="card-body">
                        <p class="card-text"><strong>Description:</strong> {{ $item->item_desc }}</p>
                        <p class="card-text"><strong>Quantity:</strong> {{ $item->item_quantity }}</p>
                        <p class="card-text"><strong>Unit:</strong> {{ $item->item_unit }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</body>

</html>
