<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Stock</title>
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
          
