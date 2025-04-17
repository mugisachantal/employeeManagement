 <!--
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Employee Dashboard</h2>
        <div class="list-group">
            <a href="{{ route('employee.jobs') }}" class="list-group-item list-group-item-action">View Jobs</a>
            <a href="#" class="list-group-item list-group-item-action" data-bs-toggle="modal" data-bs-target="#uploadCvModal">Upload CV</a>
        </div>
    </div>

    // Modal for Upload CV
    <div class="modal fade" id="uploadCvModal" tabindex="-1" aria-labelledby="uploadCvModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="uploadCvModalLabel">Upload CV</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('employee.upload.cv') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="cv" class="form-label">Select CV (PDF)</label>
                            <input type="file" name="cv" accept="application/pdf" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Upload CV</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

     
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
</body>
</html>
<!-- resources/views/employeedashboard.blade.php -->
<!-- resources/views/employeedashboard.blade.php -->
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
        <a class="nav-link" href="{{route('update.profile',$employee->id)}}"><i class="fas fa-home me-2"></i>update profile</a>
        <div class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="jobsDropdown" data-bs-toggle="dropdown">
                <i class="fas fa-briefcase me-2"></i>Jobs
            </a>
            <ul class="dropdown-menu bg-dark">
                <li><a class="dropdown-item text-white bg-dark" href="{{ route('employee.jobs') }}">View Jobs</a></li>
                <li><a class="dropdown-item text-white bg-dark" href="#" data-bs-toggle="modal" data-bs-target="#uploadCvModal">Upload CV</a></li>
            </ul>
        </div>
        <a class="nav-link" href="#"><i class="fas fa-id-card me-2"></i>View Details</a>
        <a class="nav-link" href="#"><i class="fas fa-bullhorn me-2"></i>Announcements</a>
        <a class="nav-link" href="#"><i class="fas fa-file-alt me-2"></i>Company Policies</a>
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
        <h2>Welcome {{$employee->name}}</h2>
        <p class="text-muted">Use the navigation menu on the left to access your tools and options.</p>
    </div>

    <!-- Upload CV Modal -->
    <div class="modal fade" id="uploadCvModal" tabindex="-1" aria-labelledby="uploadCvModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fas fa-upload me-2"></i>Upload Your CV</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('employee.upload.cv') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="cv" class="form-label">Choose PDF File</label>
                            <input type="file" name="cv" id="cv" class="form-control" accept="application/pdf" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description (Optional)</label>
                            <textarea class="form-control" name="description" id="description" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Upload CV</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
</body>
</html>
