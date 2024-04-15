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
      margin-left:15%;
      padding: 16px;
      position: fixed;
      width: 85%;
      top: 0;
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
      margin-left:25%;
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
  </style>
</head>
<body>

<!-- Vertical Navbar -->
<nav class="vertical-nav">

  <img src="{{ asset('images/logo.png') }}" alt="Logo">

  <a href="#">Dashboard</a>
  <a href="{{ route('tasks.index') }}">My Task</a>

  <div class="dropdown">
    <a href="#" class="dropdown-toggle">Forms</a>
    <div class="dropdown-content">
      <a href="{{ route('iar.index') }}">IAR Form</a>
      <a href="#">Stock Card</a>
      <a href="#">Property Card</a>
      <a href="#">RIS Form</a>
      <a href="#">ICS Form</a>
      <a href="#">ITR Form</a>
      <a href="#">RLSDDSP Form</a>
      <!-- Add other form links here -->
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
  <img src="{{ asset('images/bg.png') }}" alt="background">
  <div class="row">
    <div  style="font-size: 24px;"> <!-- Increased font size -->
      <h1>Welcome to the BFAR Property Unit Management System</h1>
      <h5>This system helps you organize and manage your inventory and documents efficiently.</h5>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
