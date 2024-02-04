<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        section {
            padding: 50px;
            text-align: left;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border-radius: 5px;
            border: 2px solid #333;
            background-color: #f8f9fa;
        }

        form {
            width: 100%;
            margin: 0 auto;
        }

        .grid-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            grid-gap: 20px;
            padding: 10px;
        }

        .grid-item {
            text-align: left;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            background-color: #007bff;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100px;
        }

        .cancel-btn {
            background-color: #dc3545;
        }


    </style>

<body>
<section>
    <div class="container">
    <form action="{{ route('items.store', ['iar_id' => $iar_id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div >
                <div>
                    <label for="item_name"> Name:</label>
                    <input type="text" name="item_name" id="item_name"  required>
                </div>

                <div>
                    <label for="item_desc">Description:</label>
                    <input type="text" name="item_desc" id="item_desc" required>
                </div>

                <div>
                    <label for="item_unit">Unit:</label>
                    <input type="text" name="item_unit" id="item_unit" required>
                </div>

                <div>
                    <label for="item_quantity">Quantity:</label>
                    <input type="text" name="item_quantity" id="item_quantity" required>
                </div>

                <button type="submit">Save</button>
                <button type="button" class="cancel-btn" onclick="window.history.back()">Cancel</button>
            </div>
        </form>
    </div>
    </section>

</body>

</html>