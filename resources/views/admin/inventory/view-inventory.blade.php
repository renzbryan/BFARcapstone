<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Add your existing head content here -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Company Inventory</title>

    <!-- Add your existing styles and Bootstrap CSS link here -->

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .inventory-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            margin-top: 20px;
        }

        .inventory-item {
            flex: 0 0 30%;
            margin: 10px;
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease-in-out, transform 0.3s ease-in-out;
        }

        .inventory-item:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            transform: scale(1.025);
        }

        .card-header {
            background-color: #343a40;
            color: #ffffff;
            border-radius: 10px 10px 0 0;
            padding: 10px;
        }

        .card-body {
            padding: 20px;
        }

        .card-text1,
        .card-text {
            font-size: 16px;
        }

        .action-buttons {
            display: flex;
            justify-content: space-around;
            margin-top: 10px;
        }

        .inventory-table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        .inventory-table th,
        .inventory-table td {
            padding: 15px;
            text-align: left;
            border: 1px solid #dee2e6;
        }

        .inventory-table th {
            background-color: #343a40;
            color: #ffffff;
        }

        .inventory-table tr:nth-child(even) {
            background-color: #f8f9fa;
        }

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
    </style>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>

<body>
    <nav class="fixed-top">
    </nav>

    <a class="add-item-btn fixed-bottom" href="#">+</a>

    <div class="container">
        <h2>BFAR Inventory</h2>
        <div class="filter-container">
            <label for="officeFilter">Filter by Office:</label>
            <select name="officeFilter" id="officeFilter">
                <option value="">All Items</option> <!-- Option for all items -->
                @foreach ($officeOptions as $key => $office)
                    <option value="{{ $key }}">{{ $office }}</option>
                @endforeach
            </select>
        </div>
        <table class="inventory-table">
            <thead>
                <tr>
                    <th>Item Name</th>
                    <th>Category</th>
                    <th>Quantity</th>
                    <th>Unit</th>
                    <th>Office</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($itemsWithIar as $item)
                <tr>
                    <td>{{ $item->item_name }}</td>
                    <td>{{ $item->item_desc }}</td>
                    <td>{{ $item->item_quantity }}</td>
                    <td>{{ $item->item_unit }}</td>
                    <td>{{ $item->iar->iar_rod ?? 'N/A' }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            $('#officeFilter').change(function () {
                var selectedOffice = $(this).val();
                $('tbody tr').each(function () {
                    var officeInRow = $(this).find('td:nth-child(5)').text().trim(); // Trim to remove any leading/trailing whitespaces
                    if (selectedOffice === '' || officeInRow === selectedOffice) {
                        $(this).show(); // Show the row if it matches the selected office or if no office is selected
                    } else {
                        $(this).hide(); // Hide the row if it doesn't match the selected office
                    }
                });
            }).trigger('change'); // Trigger the change event initially to filter the inventory on page load
        });
    </script>
    
</body>

</html>
