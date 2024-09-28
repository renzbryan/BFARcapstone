<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document Management System</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    nav.vertical-nav {
      list-style-type: none;
      margin: 0;
      padding: 0;
      width: 15%;
      background-color: #03396c;
      height: 100%; 
      position: fixed; 
      overflow: auto; 
    }

    nav.vertical-nav img {
      display: block;
      width: 100%; 
      margin: 0 auto; 
      padding: 8px 16px;
    }

    nav.vertical-nav a {
      display: block;
      color: white;
      padding: 8px 16px;
      text-decoration: none;
    }

    nav.vertical-nav a:hover {
      background-color: #011f4b;
      color: white;
      text-decoration: none;
    }

    .container img{
      display: block;
      width: 20%; 
      margin: 0 auto; 
    }

    nav.horizontal-nav {
      background-color: white;
      color: black;
      padding: 16px;
      position: fixed;
      width: calc(100% - 15%);
      top: 0;
      left: 15%;
      z-index: 999; /* Ensure the horizontal nav appears above other elements */
    }

    nav.horizontal-nav a {
      color: black;
      text-decoration: none;
      float: right;
      margin-left: 20px; /* Adjust as needed */
    }

    nav.horizontal-nav a:hover {
      color: white;
      text-decoration: none;
      background: gray;
    }
    
    .container img{
      display: block;
      width: 114%; 
      height: 50%;  
    }

    .row {
      margin-left:15%;
      padding:1px 16px;
      height:100px; 
      font-size: 20px; /* Increased font size */
    }

    .dropdown {
      position: relative;
      display: inline-block;
    }

    .dropdown-content {
      display: none;
      position: absolute;
      background-color: gray;
      color: black;
      min-width: 160px;
      box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
      padding: 12px 16px;
      z-index: 999; /* Ensure the dropdown appears above other elements */
    }

    .dropdown:hover .dropdown-content {
      display: block;
    }

    .dropdown-content a {
      color: black; /* Set the color of dropdown options */
      text-decoration: none;
    }

    .dropdown-content a:hover {
      background-color: #ddd; /* Change background color on hover */
    }
    
    /* Modern design for the search bar */
    nav.horizontal-nav input[type="text"] {
      border: none;
      border-radius: 20px;
      padding: 10px 20px;
      font-size: 16px;
      background-color: #f4f4f4;
      color: #333;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
      transition: all 0.3s ease;
      width: 200px;
    }

    nav.horizontal-nav input[type="text"]:focus {
      outline: none;
      background-color: #fff;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
    }

    /* Adjust container padding */
    .container {
      padding-top: 80px; /* Adjust based on your navbar height */
    }

    /* Additional styles for the form */
    .form-group {
      margin-bottom: 20px;
    }

    /* Adjust input width to fill container */
    input[type="text"],
    input[type="password"],
    input[type="email"],
    textarea,
    select {
      width: 100%;
    }

    /* Styles for settings page */
    .settings-form {
      background-color: #f9f9f9;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
  </style>
</head>
<body>

<!-- Vertical Navbar -->
<nav class="vertical-nav">

  <img src="{{ asset('images/logo.png') }}" alt="Logo">

  <a href="#">Dashboard</a>
  <a href="{{ route('usertasks.index') }}">My Task</a>
  <a href="{{ route('chat.index') }}">Chat</a>
  <a href="{{ route('setting.index') }}">Settings</a>
  <div class="dropdown">
    <a href="#" class="dropdown-toggle">Forms</a>
    <div class="dropdown-content">
      <a href="{{ route('iar.index') }}">IAR Form</a>
      <a href="{{ route('stock.index') }}">Stock Card</a>
      <a href="{{ route('property.index') }}">Property Card</a>
      <a href="{{ route('wmr.index') }}">WMR Form</a>
    </div>
  </div>

  <a href="{{ route('archive.iar') }}">Archived Forms</a>
  <a href="{{ route('inventory.index') }}">Inventory</a>

  <div class="dropdown">
    <a href="#" class="dropdown-toggle">Notifications <span class="badge badge-pill badge-primary">{{ auth()->user()->unreadNotifications()->count() }}</span></a>
    <div class="dropdown-content">
      @foreach(auth()->user()->unreadNotifications as $notification)
        <a href="{{ $notification->data['url'] }}">{{ $notification->data['message'] }}</a>
      @endforeach
    </div>
  </div>
  
</nav>

<nav class="horizontal-nav">
  <input type="text" placeholder="Search..." style="float:left; margin-right:10px; width: 25%;background: #EEEEEE;">
  <a href="{{ route('profile.edit') }}">Profile</a>
  <a href="{{ route('logout') }}">Logout</a>
</nav>

<!-- Main Content -->
<div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="settings-form">
          <h2>Create Bfar Office</h2>
  
          @if(session('success'))
            <div class="alert alert-success">
              {{ session('success') }}
            </div>
          @endif
  
          <form method="post" action="{{ route('bfar_office.store') }}">
            @csrf
  
            <div class="form-group">
              <label for="office" class="form-label">Office:</label>
              <input type="text" class="form-control" id="office" name="office" required>
            </div>
  
            <div class="form-group">
              <label for="rcc" class="form-label">RCC:</label>
              <input type="text" class="form-control" id="rcc" name="rcc" required>
            </div>
  
            {{-- Add more input fields for other columns as needed --}}
            
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
  
      <div class="col-md-6">
        <div class="settings-form">
            <h2>Update Excel</h2>
    
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
    
            <form action="{{ route('update.excel') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="excel_file">Select Excel File:</label>
                    <select name="excel_file" class="form-control">
                        <option value="iar">IAR.xlsx</option>
                        <option value="another_excel">Another_Excel.xlsx</option>
                        <option value="yet_another_excel">Yet_Another_Excel.xlsx</option>
                    </select>
                </div>
    
                <div class="form-group">
                    <label for="updated_value">OIC, Property & Supply Officer:</label>
                    <input type="text" name="updated_value" class="form-control" style="text-transform: uppercase;">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
    
      <div class="col-md-6">
        <div class="settings-form">
          <h2>Add a Category</h2>
  
          @if(session('success-category'))
            <div class="alert alert-success">
              {{ session('success-category') }}
            </div>
          @endif
  
          <form action="{{ route('category.insert') }}" method="post">
            @csrf
            <div class="form-group">
              <label for="category">Inventory Category:</label>
              <input type="text" name="category" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Insert</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
