<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory List</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        nav {
            background-color: #00005E;
            padding: 20px; /* Increased padding for a taller navbar */
            text-align: center;
            height: 50px;
        }

        nav a {
            display: inline-block;
            padding: 15px 20px; /* Adjusted padding for better spacing */
            text-decoration: none;
            color: #ecf0f1;
            border-radius: 5px;
            transition: background-color 0.3s;
            float: right; /* Float options to the left */
            margin-right: 10px; /* Added margin between options */
        }

        nav a:hover {
            background-color: #2c3e50;
        }

        .dashboard-btn {
            float: left; /* Move dashboard to the left */
        }

        .profile-btn {
            float: right; /* Move profile to the right */
        }

        section {
            max-width: 800px;
            margin: 20px auto;
            background-color: #ecf0f1;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            border: 1px solid #bdc3c7;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px;
            border-bottom: 1px solid #bdc3c7;
            text-align: left;
        }

        th {
            background-color: #2c3e50;
            color: #ecf0f1;
        }

        .action-column {
            text-align: center;
        }

        .edit-btn, .delete-btn {
            padding: 8px 16px;
            margin-right: 8px;
            cursor: pointer;
            border: none;
            border-radius: 4px;
            color: #ecf0f1;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .edit-btn {
            background-color: #27ae60;
        }

        .delete-btn {
            background-color: #e74c3c;
        }

        .action-buttons {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .action-buttons a {
            display: inline-block;
            text-decoration: none;
            color: #ecf0f1;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .add-inventory-btn {
            background-color: #3498db;
            padding: 12px 20px;
        }

        .add-inventory-btn:hover {
            background-color: #2980b9;
        }

        .archive-btn {
            background-color: #f39c12;
            padding: 12px 20px;
        }

        .archive-btn:hover {
            background-color: #d08c10;
        }
    </style>
</head>
<body>
    <nav>
        <a class="dashboard-btn" href="dashboard">Dashboard</a>
        <a class="inventory-btn" href="view-inventory">Inventory</a>
        <a class="profile-btn" href="profile">Profile</a>
    </nav>
    <section>
        <div class="action-buttons">
            <a class="add-inventory-btn" href="create-inventory">Add Inventory</a>
            <a class="archive-btn" href="archive-inventory">Archive</a>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Quantity</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($inventories as $data)
                <tr>
                    <td>{{ $data->inventory_name }}</td>
                    <td>{{ $data->inventory_category }}</td>
                    <td>{{ $data->inventory_quantity }}</td>
                    <td>{{ $data->inventory_status }}</td>
                    <td class="action-column">
                        <a class="edit-btn" href="edit-inventory/{{ $data->inventory_id }}">Edit</a>
                        <a class="delete-btn" href="/delete-inventory/{{ $data->inventory_id }}">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </section>
</body>
</html>
