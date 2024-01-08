<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<section>
        <a class="back-btn" href="view-inventory">Back</a>
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
                @foreach($inventories as $data)
                <tr>
                    <td class="checkbox-column"><input type="checkbox" name="selected_items[]" value="{{ $data->id }}"></td>
                    <td>{{ $data->item_name }}</td>
                    <td>{{ $data->description }}</td>
                    <td>{{ $data->unit }}</td>
                    <td>{{ $data->quantity }}</td>
                    <td>{{ $data->forms }}</td>
                    <td class="action-column">
                        <a class="restore-btn" href="{{ route('iar.restore', $data->id) }}">Restore</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </section>
</body>
</html>