<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Stock</title>

    <title>Stock Card</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .container {
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>
<body>
    <h1>Stock Items</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Item ID</th>
                <th>IAR ID</th>
                <th>Stock No</th>
                <th>Reorder Point</th>
                <th>Date</th>
                <th>Reference</th>
                <th>Receipt Quantity</th>
                <th>Issue Officer</th>
                <th>Balance</th>
                <th>Consume</th>
            </tr>
        </thead>
        <tbody>
            @foreach($items as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->item_id }}</td>
                <td>{{ $item->iar_id }}</td>
                <td>{{ $item->stock_no }}</td>
                <td>{{ $item->reorder_point }}</td>
                <td>{{ $item->date }}</td>
                <td>{{ $item->reference }}</td>
                <td>{{ $item->receipt_quantity }}</td>
                <td>{{ $item->issue_officer }}</td>
                <td>{{ $item->balance }}</td>
                <td>{{ $item->consume }}</td>
            </tr>
          
