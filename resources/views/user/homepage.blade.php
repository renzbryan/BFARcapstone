<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document Management System</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f8f9fa;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    nav {
        background-color: #29487d;
        padding: 15px;
        margin-bottom: 20px;
        height: 100px;
        display: flex;
        justify-content: flex-end;
    }

    nav a {
        color: #ffffff;
        margin: 25px;
        text-decoration: none;
        font-weight: bold;
        transition: color 0.3s ease-in-out;
        float: right;
    }

    nav a:hover {
        color: #0056b3;
        text-decoration: none;
    }

    .dropdown {
        position: relative;
        display: inline-block;
        margin: 25px;
    }

    .dropdown:hover .dropdown-menu {
        display: block;
    }

    .dropdown .dropdown-toggle {
        color: #ffffff;
        background-color: transparent;
        border: none;
        font-weight: bold;
        text-decoration: none;
        cursor: pointer;
        transition: color 0.3s ease-in-out;
    }

    .dropdown .dropdown-toggle:hover {
        color: #0056b3;
        text-decoration: none;
    }

    .dropdown-menu {
        display: none;
        position: absolute;
        background-color: #ffffff; /* Background color changed to white */
        min-width: 160px;
        z-index: 1;
        padding: 0;
    }

    .dropdown-menu a {
        color: #29487d; /* Text color changed to the desired color */
        padding: 10px 20px;
        display: flex;
        justify-content: center;
        flex-direction: column; 
        text-decoration: none;
        transition: background-color 0.3s ease-in-out;
    }

    .dropdown-menu a:hover {
        background-color: #0056b3;
        color: #ffffff; /* Text color changed when hovering */
        text-decoration: none;
    }

    .add-item-btn {
        color: #eeffff;
        margin: 70px;
        text-decoration: none;
        font-weight: bold;
        font-size:40px;
        background-color: #29487d;
        padding-top: 8px;
        padding-left: 23px;
        transition: color 0.3s ease-in-out, background-color 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        border-radius: 50px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        height:70px;
        width:70px;
    }

    .container{
        margin-top:125px;
    }

    .add-item-btn:hover {
        color: #eeffff;
        background-color: #4267b2;
        text-decoration: none;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }
  </style>
</head>
<body>

  <!-- Navbar -->
    <nav>
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="notificationDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Notifications <span class="badge badge-pill badge-primary">{{ auth()->user()->unreadNotifications()->count() }}</span>
            </button>
            <div class="dropdown-menu" aria-labelledby="notificationDropdown">
                @foreach(auth()->user()->unreadNotifications as $notification)
                    <a class="dropdown-item" href="{{ $notification->data['url'] }}">{{ $notification->data['message'] }}</a>
                @endforeach
            </div>
        </div>
        <a href="{{route('tasks.index')}}">Task</a>
        <div ~class="dropdown">
        <button class="btn dropdown-toggle" type="button" id="formsDropdown" aria-haspopup="true" aria-expanded="false">
            Forms
        </button>
        <div class="dropdown-menu" aria-labelledby="formsDropdown">
            <a class="dropdown-item" href="#">Form 1</a>
            <a class="dropdown-item" href="#">Form 2</a>
            <a class="dropdown-item" href="#">Form 3</a>
            <!-- Add more dropdown items as needed -->
        </div>
        </div>
        <a href="#">Logout</a>
    </nav>

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>Welcome to the BFAR Document Management System, {{ $user->name }}</h2>
                <p>This system helps you organize and manage your documents efficiently.</p>
              </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-4 mt-4">
        <p>&copy; 2024 Document Management System. All rights reserved.</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>
    </html>
