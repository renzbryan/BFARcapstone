<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inventory Dashboard</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <style>
    .chart-container {
      width: 80%; /* Adjust the width as needed */
      margin: auto;
    }
    canvas {
      max-width: 100%;
      height: auto !important;
    }
  </style>
</head>

<body>
  <div class="container-fluid">
    <div class="row">
      <!-- Sidebar -->
      <nav class="col-md-2 d-none d-md-block bg-light sidebar">
        <h1>BFAR</h1>
        <div class="sidebar-sticky">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link active" href="#">Dashboard</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Analytics</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Reports</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Settings</a>
            </li>
          </ul>
        </div>
      </nav>
      
      <!-- Main content area -->
      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Analytics</h1>
        </div>
        <div class="chart-container">
          <canvas id="myChart"></canvas>
        </div>
        <div class="chart-container">
          <canvas id="ItemChart"></canvas>
        </div>
        <div class="chart-container">
          <canvas id="InventoryDate"></canvas>
        </div>
      </main>
    </div>
  </div>

  <script>
    fetch('/get-inventory-data')
      .then(response => response.json())
      .then(data => {
        // Extract item names and quantities
        const itemNames = data.map(item => item.item_name);
        const itemQuantities = data.map(item => item.item_quantity);

        // Create chart
        var ctx = document.getElementById('ItemChart').getContext('2d');
        var myChart = new Chart(ctx, {
          type: 'bar',
          data: {
            labels: itemNames,
            datasets: [{
              label: 'Inventory Quantity',
              data: itemQuantities,
              backgroundColor: 'rgba(54, 162, 235, 0.2)',
              borderColor: 'rgba(54, 162, 235, 1)',
              borderWidth: 1
            }]
          },
          options: {
            scales: {
              yAxes: [{
                ticks: {
                  beginAtZero: true
                }
              }]
            }
          }
        });
      });
    fetch('/get-iar')
      .then(response => response.json())
      .then(data => {
        // Create chart with count as label
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
          type: 'bar',
          data: {
            labels: ['Total IARs: ' + data.count], // Display count in label
            datasets: [{
              label: 'Inventory Quantity',
              data: [data.count], // Use count as the only data point
              backgroundColor: 'rgba(54, 162, 235, 0.2)',
              borderColor: 'rgba(54, 162, 235, 1)',
              borderWidth: 1
            }]
          },
          options: {
            scales: {
              yAxes: [{
                ticks: {
                  beginAtZero: true
                }
              }]
            }
          }
        });
      });
      fetch('/get-inventory-dates')
      .then(response => response.json())
      .then(data => {
        // Extract dates and count occurrences
        const dates = data.map(item => new Date(item.created_at).toLocaleDateString());
        const uniqueDates = [...new Set(dates)]; // Get unique dates
        const dateCounts = uniqueDates.map(date => dates.filter(d => d === date).length);

        // Create chart
        var ctx = document.getElementById('InventoryDate').getContext('2d');
        var myChart = new Chart(ctx, {
          type: 'bar',
          data: {
            labels: uniqueDates,
            datasets: [{
              label: 'Date When the Items are Added',
              data: dateCounts,
              backgroundColor: 'rgba(54, 162, 235, 0.2)',
              borderColor: 'rgba(54, 162, 235, 1)',
              borderWidth: 1
            }]
          },
          options: {
            scales: {
              yAxes: [{
                ticks: {
                  beginAtZero: true
                }
              }]
            }
          }
        });
      });
  </script>
</body>
</html>
