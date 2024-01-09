<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Table</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0px;
            position: relative;
        }

        header {
            background-color: #00005E;
            height: 75px;
            padding: 10px;
        }

        .archive-btn {
            position: absolute;
            top: 20px;
            right: 20px;
            padding: 10px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
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

        /* Footer Styles */
        footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            height: 100px;
            background-color: #ddd;
            line-height: 50px;
            text-align: center;
        }

        /* Dropdown Styles */
        .status-dropdown {
            margin-right: 10px;
        }

        /* Transfer Button Styles */
        .transfer-button {
            padding: 10px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .transfer-button:hover {
            background-color: #2980b9;
        }
    </style>
</head>

<body>

<header>
    <a type="button" class="add-item-btn" href="{{ route('iar.create') }}">Add Item</a>
    <a class="archive-btn" href="archive-iar">Archive</a>
</header>

<div class="form_iar">
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
</div>
    
<!-- Footer -->
<footer>
    <select class="status-dropdown" name="status">
        <option value="stock">Stock Card</option>
        <option value="property">Property Card</option>
        <option value="semi-property">Semi-property Card</option>
    </select>
    <button class="transfer-button">Transfer</button>
</footer>

</body>
</html>
