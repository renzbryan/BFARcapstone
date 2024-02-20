<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
        }

        section {
      padding: 50px;
      
        }

        .container {
            padding: 0px;
            border-radius: 5px;
            border: 2px solid black;
        }
        form {
            width: 100% !important;
            margin: 0 auto;
        }

        .grid-container {
            display: grid;
            grid-template-columns: auto auto;
            padding: 10px;
        }

        .grid-item {
            padding: 20px;
            text-align: center;
        }

        div {
            margin-bottom: 15px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
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
</head>
<body>
    <section>
        <div class="container">
        <form action="{{ route('iar.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="grid-container">
            <div class="grid-item" style="width: 100%">
                <div>
                    <label for="iar_entityname">Entity Name:</label>
                    <input type="text" name="iar_entityname" id="iar_entityname"  required>
                </div>

                <div>
                    <label for="iar_fundcluster">Fund Cluster:</label>
                    <input type="number" name="iar_fundcluster" id="iar_fundcluster" required>
                </div>

                <div>
                    <label for="iar_supplier">Supplier:</label>
                    <input type="text" name="iar_supplier" id="iar_supplier" required>
                </div>

                <div>
                    <label for="iar_Podate">PO No/Date:</label>
                    <input type="date" name="iar_Podate" id="iar_Podate" required>
                </div>

                <div>
                    <label for="iar_rod">Requisitioning Office/Dept.:</label>
                    <input type="text" name="iar_rod" id="iar_rod" required>
                </div>

                <div>
                    <button type="submit">Save</button>
                    <button type="button" class="cancel-btn" onclick="window.history.back()">Cancel</button>
                </div>

            </div>
        
            <div class="grid-item" style="width: 100%">
                <div>
                    <label for="iar_rcc">Responsibility Center Code:</label>
                    <input type="number" name="iar_rcc" id="iar_rcc" required>
                </div>

                <div>
                    <label for="iar_number">IAR No.:</label>
                    <input type="text" name="iar_number" id="iar_number" required>
                </div>

                <div>
                    <label for="iar_date">Date:</label>
                    <input type="date" name="iar_date" id="iar_date" required>
                </div>

                <div>
                    <label for="iar_invoice">Invoice No.:</label>
                    <input type="number" name="iar_invoice" id="iar_invoice" required>
                </div>

                <div>
                    <label for="iar_invoice_d">Date:</label>
                    <input type="date" name="iar_invoice_d" id="iar_invoice_d" required>
                </div>

            </div>

            </div>

            
        </form>
    </div>
    </section>
</body>
</html>
