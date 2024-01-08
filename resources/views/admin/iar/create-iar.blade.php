<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Item Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        section {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px; /* Adjust the width as needed */
        }

        label {
            display: block;
            margin-bottom: 15px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 15px;
            margin-bottom: 20px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 16px;
        }

        button {
            width: 100%; /* Make the button full width */
            padding: 15px;
            margin:5px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
        }

        button.cancel-btn {
            background-color: #d9534f;
        }
    </style>
</head>
<body>
    <section>
        <form action="{{ route('iar.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="item_name">Item Name:</label>
                <input type="text" name="item_name" id="item_name" required>
            </div>

            <div>
                <label for="description">Description:</label>
                <input type="text" name="description" id="description" required>
            </div>

            <div>
                <label for="unit">Unit:</label>
                <input type="text" name="unit" id="unit" required>
            </div>

            <div>
                <label for="quantity">Quantity:</label>
                <input type="text" name="quantity" id="quantity" required>
            </div>

            <div>
                <button type="submit">Save</button>
                <button type="button" class="cancel-btn" onclick="window.history.back()">Cancel</button>
            </div>
        </form>
    </section>
</body>
</html>
