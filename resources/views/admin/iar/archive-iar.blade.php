<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restored Items</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            position: relative;
        }

        .back-btn {
            display: inline-block;
            padding: 10px;
            background-color: #3498db;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .checkbox-column {
            padding: 10px;
            text-align: center;
        }

        .restore-btn {
            padding: 5px 10px;
            background-color: #27ae60;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .restore-btn:hover {
            background-color: #219e56;
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

        nav {
            background-color: #29487d;
            padding: 15px;
            margin-bottom: 20px;
            height: 100px;
            display: flex;
            justify-content: flex-end;
        }



        nav a:hover {
            color: #0056b3;
            text-decoration: none;
        }

        .cancel-btn {
            background-color: #29487d;
            font-weight: bold;
        }

        .cancel-btn:hover {
            background-color: #4267b2; /* Darker gray */
        }

        .cancel-btn {
            padding: 15px;
            font-size: 16px;
            cursor: pointer;
            border: none;
            border-radius: 10px;
            color: #fff;
            text-decoration: none; /* Remove underline */
            transition: background-color 0.3s; 
        }

    </style>
</head>
<body>
    <nav class="fixed-top">
    <button class="cancel-btn" onclick="window.history.back()">< Back</button>
    </nav>
    <section>
        <div class="container">
            @php
            $reversedIars = array_reverse($softDeletedItem->toArray());
            @endphp
            @foreach($reversedIars as $data)
            <div class="card">
                <div class="card-header">
                    IAR Form #{{ $data['iar_number'] }}
                </div>
                <div class="card-body">
                    <p class="card-text1"><strong>{{ $data['iar_entityname'] }}</strong> </p>
                    <p class="card-text"><strong>Fund Cluster:</strong> {{ $data['iar_fundcluster'] }}</p>
                    <p class="card-text"><strong>Supplier:</strong> {{ $data['iar_supplier'] }}</p>
    
                    <div class="action-column">
                        <!-- <a class="btn btn-primary" href="{{ route('archive.item', $data['iar_id']) }}">View</a> -->
                        <a class="btn btn-success" href="{{ route('restore.iar', ['iar_id' => $data['iar_id']]) }}">Restore</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
</body>
</html>
