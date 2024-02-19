<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Items View</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            color: #333;
        }

        header {
            background-color: #29487d;
            color: #fff;
            padding: 15px; /* Adjusted padding */
            text-align: center;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .header-buttons {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 115px;
        }

        .iar-box {
            border: 1px solid #ddd;
            border-radius: 8px;
            margin-bottom: 20px;
            padding: 20px;
        }

        .iar-details {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        .iar-details div {
            flex: 0 0 48%;
            padding: 10px;
            box-sizing: border-box;
        }

        .iar-details p {
            margin: 10px 0;
        }

        h2 {
            text-align: center;
            font-family: 'Times New Roman', Times, serif; /* Formal font */
            color: #090088; /* Matching the header background color */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #29487d; /* Google Blue */
            color: #fff;
        }

        tbody tr:hover {
            background-color: #f0f8ff;
        }

        .cancel-btn,
        .add-item-btn {
            padding: 15px;
            font-size: 16px;
            cursor: pointer;
            border: none;
            border-radius: 10px;
            color: #fff;
            text-decoration: none; /* Remove underline */
            transition: background-color 0.3s;
        }

        .cancel-btn {
            background-color: #29487d;
            font-weight: bold;
        }

        .add-item-btn {
            background-color: #29487d; /* Google Green */
            font-weight: bold;
        }

        .cancel-btn:hover,
        .add-item-btn:hover {
            background-color: #4267b2; /* Darker gray */
        }

        footer {
    text-align: center;
    padding: 20px;
    background-color: #dfe3ee;
    color: #29487d;
    position: fixed;
    bottom: 0;
    width: 100%;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.footer-links {
    display: flex;
    gap: 20px;
}

.footer-links a {
    color: #fff;
    text-decoration: none;
    transition: color 0.3s;
}

.footer-links a:hover {
    color: #007bff;
}

.footer-dropdown {
    position: relative;
    display: inline-block;
    margin-left: 20px;
    cursor: pointer;
}

/* Updated dropdown content styles */
.dropdown-content {
    display: none;
    position: absolute;
    background-color: #fff;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 4px;
    z-index: 1;
    min-width: 160px;
    text-align: left;
    top: 100%; /* Adjusted to appear below the triggering element */
}

/* Adjusted dropdown item styles */
.dropdown-item {
    padding: 12px 20px;
    text-decoration: none;
    color: #333;
    display: block;
    transition: background-color 0.3s;
    font-size: 14px;
}

.dropdown-item:hover {
    background-color: #f4f4f4;
}

/* Show the dropdown menu above when hovering */
.footer-dropdown:hover .dropdown-content {
    display: block;
    top: auto; /* Resetting the 'top' property for proper positioning */
    bottom: 100%;
}



    </style>
</head>
<body>
    @foreach($iars as $iar)
    <header>
        <div class="header-buttons">
            <button class="cancel-btn" onclick="window.history.back()">< Back</button>
            <a class="add-item-btn" href="/iar/{{ $iar->iar_id }}/create-items">+ New Item</a>
        </div>
    </header>

    <div class='container'>

        <div class='iar-box'>
            <div>
                <h2> INSPECTION AND ACCEPTANCE REPORT</h2>
            </div>
            <div class='iar-details'>
                <div>
                    <p><strong>Entity Name: </strong>{{ $iar->iar_entityname }}</p><br>
                    <p><strong>Supplier: </strong>{{ $iar->iar_supplier }}</p>
                    <p><strong>PO No/Date: </strong>{{ $iar->iar_Podate }}</p>
                    <p><strong>Requisitioning Office/Dept.: </strong>{{ $iar->iar_rod }}</p>
                    <p><strong>Responsibility Center Code: </strong>{{ $iar->iar_rcc }}</p>
                </div>
                <div>
                    <p><strong>Fund Cluster: </strong>{{ $iar->iar_fundcluster }}</p><br>
                    <p><strong>IAR No.: </strong>{{ $iar->iar_number }}</p>
                    <p><strong>Date: </strong>{{ $iar->iar_date }}</p>
                    <p><strong>Invoice No.: </strong>{{ $iar->iar_invoice }}</p>
                    <p><strong>Date: </strong>{{ $iar->iar_invoice_d }}</p>
                </div>
            </div>
        </div>
        @endforeach

        <table>
            <thead>
                <tr>
                    <th></th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Unit</th>
                    <th>Quantity</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $data)
                <tr>
                    <td><input type="checkbox" name="item_checkbox[]" value="{{ $data->item_id }}"></td> <!-- Checkbox column -->
                    <td>{{ $data->item_name }}</td>
                    <td>{{ $data->item_desc }}</td>
                    <td>{{ $data->item_unit }}</td>
                    <td>{{ $data->item_quantity }}</td>
                    <td>
                        <!-- Add any action buttons or links here if needed -->
                        {{-- Example: --}}
                        <a href="#">Edit</a>
                        <a href="#">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <footer>
        <div class="footer-dropdown">
            <span>Menu</span>
            <div class="dropdown-content">
                <a class="dropdown-item" href="#">Privacy Policy</a>
                <a class="dropdown-item" href="#">Terms of Service</a>
                <a class="dropdown-item" href="#">Contact Us</a>
                <a class="dropdown-item" href="{{ route('export.excel', ['iar_id' => $iar['iar_id']]) }}">Print</a>
            </div>
        </div>
    </footer>

</body>

</html>
