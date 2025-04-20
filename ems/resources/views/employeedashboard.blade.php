


<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Dashboard</title>

    <!-- Bootstrap & FontAwesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f8f9fa;
        }
        .sidebar {
            height: 100vh;
            position: fixed;
            width: 220px;
            background-color: #343a40;
            padding-top: 30px;
        }
        .sidebar .nav-link {
            color: #ffffff;
            padding: 10px 20px;
        }
        .sidebar .nav-link:hover {
            background-color: #495057;
        }
        .sidebar h4 {
            color: #ffffff;
            text-align: center;
            margin-bottom: 30px;
        }
        .content {
            margin-left: 220px;
            padding: 30px;
        }
        .navbar {
            margin-left: 220px;
        }
        .modal-header {
            background-color: #007bff;
            color: #fff;
        }
        @media (max-width: 768px) {
            .sidebar {
                position: relative;
                width: 100%;
                height: auto;
            }
            .navbar, .content {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar d-flex flex-column">
        <h4><i class="fas fa-user-circle me-2"></i>Employee</h4>
        <a class="nav-link" href="#"><i class="fas fa-home me-2"></i>Home</a>
        
        <a class="nav-link" href="#"><i class="fas fa-id-card me-2"></i>View Details</a>
        <a class="nav-link" href="{{ route('employee.announcements') }}"><i class="fas fa-bullhorn me-2"></i>Announcements</a>
        <a class="nav-link" href="{{ route('employee.company-policies') }}"><i class="fas fa-file-alt me-2"></i>Company Policies</a>
    </div>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Employee System</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarContent">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-user me-1"></i>Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-sign-out-alt me-1"></i>Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Content -->
    <div class="content">
        <h2>Welcome to Your Dashboard</h2>
        <p class="text-muted">Use the navigation menu on the left to access your tools and options.</p>
    </div>

   
    

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
</body>
</html>
