@extends('layouts.app')

@section('title', 'Items View')
@vite(['resources/css/app.css', 'resources/js/app.js'])

<script>
document.addEventListener('DOMContentLoaded', function () {
    const stockBtn = document.getElementById('Stockbtn'); 
    const propertyBtn = document.getElementById('Propertybtn'); 
    const wmrBtn = document.getElementById('WMRbtn'); 
    const itemCheckbox = document.getElementsByName('item_checkbox[]'); 

    // Function to handle stock update
    function updateStock() {
        const transferData = getTransferData();
        sendTransferRequest('/update-items-stock', transferData, 'Stock');
    }

    // Function to handle property card update
    function updatePropertyCard() {
        const transferData = getTransferData();
        sendTransferRequest('/update-items-property', transferData, 'Property Card');
    }

    // Function to handle WMR update
    function updateWMR() {
        const transferData = getTransferData();
        sendTransferRequest('/update-items-wmr', transferData, 'WMR');
    }

    // Function to get transfer data from the form
    function getTransferData() {
        const transferData = [];
        itemCheckbox.forEach(checkbox => {
            if (checkbox.checked) {
                const row = checkbox.closest('tr');
                const quantity = row.querySelector('input[name="transfer_quantity[]"]').value;
                transferData.push({
                    item_id: checkbox.value,
                    quantity: quantity
                });
            }
        });
        return transferData;
    }

    // Function to send transfer request
    function sendTransferRequest(url, transferData, actionName) {
        if (transferData.length > 0) {
            fetch(url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
                body: JSON.stringify({ transfer_data: transferData }),
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert(`${actionName} updated successfully!`);
                } else {
                    alert(`Failed to update ${actionName}. Please try again.`);
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        } else {
            alert('Please select at least one item.');
        }
    }

    // Event listeners for buttons
    stockBtn.addEventListener('click', updateStock);
    propertyBtn.addEventListener('click', updatePropertyCard);
    wmrBtn.addEventListener('click', updateWMR);
});
</script>

@section('content')
<div class="container mx-auto p-4 mt-8 ml-48 lg:p-12 font-nunito">
    @foreach($iars as $iar)
    <header class="mb-8">
        <div class="flex space-x-4 mb-4">
            <button class="bg-red-500 text-white py-2 px-4 rounded-md shadow-sm hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500" onclick="window.history.back()">← Back</button>
            <button id="Stockbtn" class="bg-blue-500 text-white py-2 px-4 rounded-md shadow-sm hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">Stock Card</button>
            <button id="Propertybtn" class="bg-green-500 text-white py-2 px-4 rounded-md shadow-sm hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500">Property Card</button>
            <button id="WMRbtn" class="bg-gray-500 text-white py-2 px-4 rounded-md shadow-sm hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500">WMR</button>
            <a class="bg-yellow-500 text-white py-2 px-4 rounded-md shadow-sm hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-500" href="/iar/{{ $iar->iar_id }}/create-items">+ New Item</a>
        </div>
    </header>

    <div class="bg-white border-t-4 border-blue-900 shadow-lg rounded-lg p-8 mb-8">
        <h2 class="text-xl font-semibold mb-4">INSPECTION AND ACCEPTANCE REPORT</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <p class="text-gray-700 font-semibold"><strong>Entity Name:</strong> {{ $iar->iar_entityname }}</p>
                <p class="text-gray-700 font-semibold"><strong>Supplier:</strong> {{ $iar->iar_supplier }}</p>
                <p class="text-gray-700 font-semibold"><strong>PO No/Date:</strong> {{ $iar->iar_Podate }}</p>
                <p class="text-gray-700 font-semibold"><strong>Requisitioning Office/Dept.:</strong> {{ $iar->iar_rod }}</p>
                <p class="text-gray-700 font-semibold"><strong>Responsibility Center Code:</strong> {{ $iar->iar_rcc }}</p>
            </div>
            <div>
                <p class="text-gray-700 font-semibold"><strong>Fund Cluster:</strong> {{ $iar->iar_fundcluster }}</p>
                <p class="text-gray-700 font-semibold"><strong>IAR No.:</strong> {{ $iar->iar_id }}</p>
                <p class="text-gray-700 font-semibold"><strong>Date:</strong> {{ $iar->iar_date }}</p>
                <p class="text-gray-700 font-semibold"><strong>Invoice No.:</strong> {{ $iar->iar_id }}</p>
                <p class="text-gray-700 font-semibold"><strong>Invoice Date:</strong> {{ $iar->iar_invoice_d }}</p>
            </div>
        </div>
    </div>

    <div class="bg-white border-t-4 border-blue-900 shadow-lg rounded-lg p-8">
        <form id="transferForm">
            <table class="min-w-full bg-white border border-gray-300 rounded-md">
                <thead class="bg-gray-200 text-gray-700">
                    <tr>
                        <th class="py-3 px-4 border-b">Select</th>
                        <th class="py-3 px-4 border-b">Name</th>
                        <th class="py-3 px-4 border-b">Description</th>
                        <th class="py-3 px-4 border-b">Unit</th>
                        <th class="py-3 px-4 border-b">Quantity</th>
                        <th class="py-3 px-4 border-b">Transfer Quantity</th>
                        <th class="py-3 px-4 border-b">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $data)
                    <tr class="hover:bg-gray-100">
                        <td class="py-3 px-4 border-b"><input type="checkbox" name="item_checkbox[]" value="{{ $data->item_id }}"></td>
                        <td class="py-3 px-4 border-b">{{ $data->item_name }}</td>
                        <td class="py-3 px-4 border-b">{{ $data->item_desc }}</td>
                        <td class="py-3 px-4 border-b">{{ $data->item_unit }}</td>
                        <td class="py-3 px-4 border-b">{{ $data->item_quantity }}</td>
                        <td class="py-3 px-4 border-b"><input type="number" name="transfer_quantity[]" min="1" max="{{ $data->item_quantity }}" class="w-full border-gray-300 rounded-md"></td>
                        <td class="py-3 px-4 border-b">
                            <a href="#" class="text-blue-500 hover:underline">Edit</a>
                            <a href="#" class="text-red-500 hover:underline ml-2">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </form>
    </div>
    @endforeach
</div>
@endsection
