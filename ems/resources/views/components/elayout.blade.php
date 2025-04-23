<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Dashboard</title>

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
            color: #ffffff; /* Ensure text in sidebar is white */
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
        .profile-img-container {
            width: 150px;
            height: 150px;
            margin: 0 auto 30px auto;
        }

        .profile-img-container img {
            object-fit: cover;
            width: 100%;
            height: 100%;
        }

        .no-profile-placeholder {
            background-color: #e9ecef;
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #6c757d;
            font-size: 0.9rem;
            text-align: center;
        }

        /* Styles for the Confirmation Form within the content area */
        .confirmation-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        .confirmation-options label {
            margin-right: 20px;
            font-weight: bold;
            color: #333;
        }
        .confirm-button {
            color: #28a745; /* Green for confirm */
        }
        .reject-button {
            color: #dc3545; /* Red for reject */
        }
        .confirmation-title {
            color: #007bff; /* Blue for title */
            margin-bottom: 15px;
        }
        .confirmation-message {
            color: #555;
            margin-bottom: 15px;
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
        .navbar-brand img {
                            height: 40px;
                          }
    </style>
    
</head>
<body>
    <header class="bg-primary text-white py-3">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary justify-content-between">
                <div class="container-fluid">
                    <a class="navbar-brand d-flex align-items-center" href="/">
                       
                          <img src="/images/logo.png" class="me-2 rounded-circle" alt="Logo">
                        <h1 class="m-0 fw-bold fs-3">MotorVitaGlobal</h1>
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link active fs-5" aria-current="page" href="/"><i class="bi bi-house-fill me-2"></i> Home</a>
                            </li>
                            </ul>
                    </div>
                    @auth('employee')
                        <form action="{{ route('logout') }}" method="POST" class="d-flex align-items-center">
                            @csrf
                            <button type="submit" class="btn btn-outline-light btn-sm">
                                <i class="bi bi-box-arrow-right me-2"></i> Logout
                            </button>
                        </form>
                    @elseif(auth()->check() && auth()->getDefaultDriver() === 'admin')
                        <form action="{{ route('logout') }}" method="POST" class="d-flex align-items-center">
                            @csrf
                            <button type="submit" class="btn btn-outline-light btn-sm">
                                <i class="bi bi-box-arrow-right me-2"></i> Logout
                            </button>
                        </form>
                    @endauth
                </div>
            </nav>
        </div>
    </header>

<!-- Sidebar -->
<div class="sidebar d-flex flex-column">
    <h4><i class="fas fa-user-circle me-2"></i>Employee</h4>
    <a class="nav-link" href="#"><i class="fas fa-home me-2"></i>Home</a>
    <a class="nav-link" href="{{route('leave_requests.create')}}"><i class="fas fa-id-card me-2"></i>Request Leave</a>
    <a class="nav-link" href="{{ route('employee.announcements') }}"><i class="fas fa-bullhorn me-2"></i>Announcements</a>
    <a class="nav-link" href="{{ route('employee.company-policies') }}"><i class="fas fa-file-alt me-2"></i>Company Policies</a>
    <a class="nav-link" href="{{ route('update.profile', $employee->id) }}"><i class="fas fa-user-edit me-2"></i>Update Profile</a>
</div>

<!-- Navbar -->


<!-- Content -->
<div class="content">
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

      
            @yield('content')

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const profilePictureWrapper = document.getElementById('profilePictureWrapper');
                    const headerHeight = document.querySelector('nav.navbar').offsetHeight; // Target the navbar
                    const availableHeight = window.innerHeight - headerHeight - 40; // Adjust 40 for margins
        
                    let size = Math.min(availableHeight * 0.3, 150); // Adjusted max size for content area
        
                    if (profilePictureWrapper) {
                        profilePictureWrapper.style.width = size + 'px';
                        profilePictureWrapper.style.height = size + 'px';
                    }
                });
        
                window.addEventListener('resize', function() {
                    const profilePictureWrapper = document.getElementById('profilePictureWrapper');
                    const headerHeight = document.querySelector('nav.navbar').offsetHeight;
                    const availableHeight = window.innerHeight - headerHeight - 40;
        
                    let size = Math.min(availableHeight * 0.3, 150);
        
                    if (profilePictureWrapper) {
                        profilePictureWrapper.style.width = size + 'px';
                        profilePictureWrapper.style.height = size + 'px';
                    }
                });
            </script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
        </body>
        </html>