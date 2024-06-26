<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern IAR Forms</title>
    <!-- Add Bootstrap CSS link -->
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

        .add-item-btn {
            color: #eeffff;
            margin: 70px;
            text-decoration: none;
            font-weight: bold;
            font-size:40px;
            background-color: #29487d;
            padding-top: 8px;
            padding-left: 23px;
            transition: color 0.3s ease-in-out, background-color 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
            border-radius: 50px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            height:70px;
            width:70px;
        }

        .container{
            margin-top:125px;
        }

        .add-item-btn:hover {
            color: #eeffff;
            background-color: #4267b2;
            text-decoration: none;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        /* Updated card styles */
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

        .card-text1{
            font-size:25px;
        }

        /* Updated button styles */
        .btn {
            border-radius: 5px;
        }

        .btn-primary {
            background-color: #3a5998;
            border-color: #3a5998;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .btn-success {
            background-color: #67b868;
            border-color: #67b868;
        }

        .btn-success:hover {
            background-color: #218838;
            border-color: #218838;
        }

        .btn-danger {
            background-color: #ff5ca1;
            border-color: #ff5ca1;
        }

        .btn-danger:hover {
            background-color: #c82333;
            border-color: #c82333;
        }
        /* Style the dropdown button */
        /* Style the dropdown button */
.dropbtn {
    background-color: #29487d; /* Match the background color of your other navigation buttons */
    color: #ffffff;
    padding: 15px;
    font-size: 16px;
    border: none;
    cursor: pointer;
    transition: background-color 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
}

/* Style the dropdown content (hidden by default) */
.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f8f9fa; /* Match the background color of your body */
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
    z-index: 1;
    border-radius: 10px; /* Match the border-radius of your other buttons */
}

/* Style the links inside the dropdown */
.dropdown-content a {
    color: #29487d; /* Match the color of your other navigation buttons */
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    border-radius: 10px; /* Match the border-radius of your other buttons */
}

/* Change color on hover */
.dropdown-content a:hover {
    background-color: #3498db; /* Match the hover background color of your other navigation buttons */
    color: #ffffff;
}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {
    display: block;
}

    </style>
</head>

<body>
    <nav class="fixed-top">
        <a href="{{ route('dashboard') }}">Dashboard</a>
        <a href="{{ route('archive.iar') }}">Archived IAR Forms</a>

    </nav>
    <a class="add-item-btn fixed-bottom" href="{{ route('iar.create') }}">+</a>

    <div class="container">
        <div class="mb-4">
            <input type="text" id="searchInput" class="form-control" placeholder="Search IAR...">
        </div>
        @php
        $reversedIars = array_reverse($iars->toArray());
        @endphp
        @foreach($reversedIars as $data)
        <div class="card iar-card">
            <div class="card-header">
                IAR Form #{{ $data['iar_id'] }}
            </div>
            <div class="card-body">
                <p class="card-text1"><strong>{{ $data['iar_entityname'] }}</strong> </p>
                <p class="card-text"><strong>Fund Cluster:</strong> {{ $data['iar_fundcluster'] }}</p>
                <p class="card-text"><strong>Supplier:</strong> {{ $data['iar_supplier'] }}</p>

                <div class="action-column">
                    <a class="btn btn-primary" href="{{ route('item.show', $data['iar_id']) }}">View</a>
                    <a class="btn btn-success" href="{{ route('export.excel', ['iar_id' => $data['iar_id']]) }}">Print</a>

                    <a class="btn btn-danger" href="{{ route('delete.iar', ['iar_id' => $data['iar_id']]) }}">Delete</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const searchInput = document.getElementById('searchInput');
            const iarCards = document.querySelectorAll('.iar-card');

            searchInput.addEventListener('input', function () {
                const query = searchInput.value.toLowerCase();

                iarCards.forEach(function (card) {
                    const cardText = card.innerText.toLowerCase();
                    const isVisible = cardText.includes(query);
                    card.style.display = isVisible ? 'block' : 'none';
                });
            });
        });
    </script>
</body>

</html>