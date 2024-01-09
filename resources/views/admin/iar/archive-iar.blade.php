<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restored Items</title>
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
    </style>
</head>
<body>
    <a class="back-btn" href="iar">Back</a>
    <section>
        <table>
            <thead>
                <tr>
                    <th>Select</th>
                    <th>Item Name</th>
                    <th>Description</th>
                    <th>Unit</th>
                    <th>Quantity</th>
                    <th>Forms</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($iars as $data)
                <tr>
                    <td class="checkbox-column"><input type="checkbox" name="selected_items[]" value="{{ $data->id }}"></td>
                    <td>{{ $data->item_name }}</td>
                    <td>{{ $data->description }}</td>
                    <td>{{ $data->unit }}</td>
                    <td>{{ $data->quantity }}</td>
                    <td>{{ $data->forms }}</td>
                    <td class="action-column">
                        <a class="restore-btn" href="/restore-iar/{{ $data->id }}">Restore</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </section>
</body>
</html>
