<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <div class="container">
        <h1>Stock Card</h1>
        <table>
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
                @foreach($stockEntries as $entry)
                <tr>
                    <td>{{ $entry->sc_id }}</td>
                    <td>{{ $entry->item_id }}</td>
                    <td>{{ $entry->iar_id }}</td>
                    <td>{{ $entry->sc_stock_no }}</td>
                    <td>{{ $entry->sc_reorder_point }}</td>
                    <td>{{ $entry->sc_date }}</td>
                    <td>{{ $entry->sc_reference }}</td>
                    <td>{{ $entry->sc_receipt_qty }}</td>
                    <td>{{ $entry->sc_issue_offc }}</td>
                    <td>{{ $entry->sc_balance }}</td>
                    <td>{{ $entry->sc_consume }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- Add your JavaScript links and scripts here -->
</body>

</html>
