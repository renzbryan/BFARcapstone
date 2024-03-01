<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stock Card Table</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<h2>Stock Card  </h2>

<table>
    <thead>
        <tr>
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
        <?php foreach ($stockData as $stock): ?>
            <tr>
                <td><?= $stock->sc_stock_no ?></td>
                <td><?= $stock->sc_reorder_point ?></td>
                <td><?= $stock->sc_date ?></td>
                <td><?= $stock->sc_reference ?></td>
                <td><?= $stock->sc_receipt_qty ?></td>
                <td><?= $stock->sc_issue_offc ?></td>
                <td><?= $stock->sc_balance ?></td>
                <td><?= $stock->sc_consume ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>
