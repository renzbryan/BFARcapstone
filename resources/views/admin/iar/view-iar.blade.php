<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Table</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            position: relative;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 70px;
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

        .delete-btn, .edit-btn {
            padding: 5px 10px;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
        }

        .delete-btn {
            background-color: #e74c3c;
            color: white;
        }

        .delete-btn:hover {
            background-color: #c0392b;
        }

        .edit-btn {
            background-color: #3498db;
            color: white;
        }

        .edit-btn:hover {
            background-color: #2980b9;
        }

        .add-item-btn {
            position: fixed;
            top: 20px;
            left: 20px;
            padding: 10px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .add-item-btn:hover {
            background-color: #2980b9;
        }

        .checkbox-column {
            padding: 10px;
            text-align: center;
        }
    </style>
</head>
<body>

    <a type="button" class="add-item-btn" href="{{ route('iar.create') }}">Add Item</a>

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
                        <a class="edit-btn" href="{{ route('iar.edit', $data->id) }}">Edit</a>
                        <a class="delete-btn" href="{{ route('iar.destroy', $data->id) }}">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
