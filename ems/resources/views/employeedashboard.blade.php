<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Employee Dashboard</title>

  <!-- Optimized loading for Bootstrap CSS -->
  <link rel="preload" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
  <noscript><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"></noscript>

  <!-- Optimized loading for Font Awesome -->
  <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
  <noscript><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"></noscript>

  <style>
    body {
      background-color: #f4f4f4;
      padding-top: 1px;
    }

    .top-nav {
      background-color: #343a40;
      padding: 10px 20px;
      color: white;
    }

    .top-nav .nav-link {
      color: white;
    }

    .sidebar {
      height: 100vh;
      background-color: #007bff;
      color: white;
      padding-top: 20px;
    }

    .sidebar a {
      display: block;
      color: white;
      padding: 10px 15px;
      text-decoration: none;
      cursor: pointer;
    }

    .sidebar a:hover {
      background-color: #0056b3;
    }

    .profile-pic {
      width: 120px;
      height: 120px;
      object-fit: cover;
      border-radius: 50%;
    }

    .announcement-box {
      background: #fff;
      border: 1px solid #ddd;
      padding: 20px;
      border-radius: 8px;
      margin-bottom: 20px;
    }

    .dashboard-card {
      background: white;
      border-left: 5px solid #007bff;
      padding: 20px;
      border-radius: 8px;
      margin-bottom: 20px;
      box-shadow: 0 2px 4px rgba(0,0,0,0.05);
    }

    .section {
      display: none;
    }
  </style>

  <script defer>
    document.addEventListener('DOMContentLoaded', function () {
      showSection('announcements');
    });

    function showSection(id) {
      document.querySelectorAll('.section').forEach(section => {
        section.style.display = 'none';
      });
      const target = document.getElementById(id);
      if (target) {
        target.style.display = 'block';
      }
    }
  </script>
</head>

<<<<<<< HEAD
<body>

  <!-- Top Navbar -->
  <div class="top-nav d-flex justify-content-between align-items-center">
    <span class="fs-5"><i class="fas fa-user-circle me-2"></i>Employee</span>
    <div>
      <a class="nav-link d-inline me-3" href="#"><i class="fas fa-user me-1"></i>Profile</a>
      <a class="nav-link d-inline" href="#"><i class="fas fa-sign-out-alt me-1"></i>Logout</a>
=======
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
>>>>>>> 8b3c5b94fa8287772b7cab950c39b9ef5a9e9ad6
    </div>
  </div>

  <div class="container-fluid">
    <div class="row">

      <!-- Sidebar -->
      <nav class="col-md-2 sidebar">
        <a onclick="showSection('home')"><i class="fas fa-home me-2"></i>Home</a>
        <a onclick="showSection('details')"><i class="fas fa-id-card me-2"></i>View Details</a>
        <a href="{{ route('employee.announcements') }}"><i class="fas fa-bullhorn me-2"></i>Announcements</a>
        <a href="{{ route('employee.company-policies') }}"><i class="fas fa-file-alt me-2"></i>Company Policies</a>
      </nav>

      <!-- Main Content -->
      <main class="col-md-10 py-4">
        <div class="container">

          <!-- Home -->
          <div id="home" class="section">
            <div class="text-center mb-4">
              <img src="https://via.placeholder.com/120" alt="Profile Picture" class="profile-pic">
              <h4 class="mt-2">Welcome to Your Dashboard</h4>
              <p class="text-muted">Use the navigation menu on the left to access your tools and options.</p>
            </div>
          </div>

<<<<<<< HEAD
          <!-- Profile Section -->
          <div id="details" class="section">
            <div class="card">
              <div class="card-header">Profile</div>
              <div class="card-body text-center">
                <img src="https://via.placeholder.com/100" class="profile-pic mb-3">
                <form method="POST" action="update_email.php">
                  <div class="mb-3 text-start">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                  </div>
                  <button type="submit" class="btn btn-primary">Edit your Email</button>
                </form>
              </div>
=======
    <!-- Content -->
    <div class="content">
        @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<h2>Welcome {{$employee->name }}</h2>
<div class="text-center">
    <div class="profile-img-container">
        @if ($employee->profile_picture)
            <img src="{{ asset('storage/' . $employee->profile_picture) }}" 
                 alt="Profile Picture" 
                 class="img-fluid rounded-circle border border-primary shadow">
        @else
            <div class="no-profile-placeholder rounded-circle border border-primary shadow">
                No Profile Picture
            </div>
        @endif
    </div>
</div>
        <p class="text-muted">Use the navigation menu on the left to access your tools and options.</p>
        
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
>>>>>>> 8b3c5b94fa8287772b7cab950c39b9ef5a9e9ad6
            </div>
          </div>

<<<<<<< HEAD
          <!-- Announcements Section -->
          <div id="announcements" class="section">
            <div class="announcement-box">
              <h5>Announcements</h5>
              <ul>
                <li>Team meeting scheduled for Friday at 10 AM.</li>
                <li>Annual leave application deadline is end of this month.</li>
              </ul>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="dashboard-card">
                  <h6>Leave Request</h6>
                  <p><a onclick="showSection('leave')" class="btn btn-sm btn-primary">View Requests</a></p>
                </div>
              </div>
            </div>
          </div>

          <!-- Leave Request Section -->
          <div id="leave" class="section">
            <div class="card">
              <div class="card-header">Leave Request</div>
              <div class="card-body">
                <form method="POST" action="submit_leave_request.php">
                  <div class="mb-3">
                    <label for="leave_request" class="form-label">Leave Request Letter</label>
                    <textarea class="form-control" id="leave_request" name="leave_request" rows="4"></textarea>
                  </div>
                  <button type="submit" class="btn btn-primary">Submit Request</button>
                </form>
              </div>
            </div>
          </div>

        </div>
      </main>
    </div>
  </div>
=======
    <!-- Scripts -->
    <script>
         document.addEventListener('DOMContentLoaded', function() {
            const profilePictureWrapper = document.getElementById('profilePictureWrapper');
            const headerHeight = document.querySelector('header').offsetHeight;
            const availableHeight = window.innerHeight - headerHeight - 40; // Adjust 40 for margins

            // Calculate a relative size (e.g., 30% of available height, with a maximum)
            let size = Math.min(availableHeight * 0.3, 200); // Adjust 0.3 and 200 as needed

            profilePictureWrapper.style.width = size + 'px';
            profilePictureWrapper.style.height = size + 'px';
        });

        window.addEventListener('resize', function() {
            const profilePictureWrapper = document.getElementById('profilePictureWrapper');
            const headerHeight = document.querySelector('header').offsetHeight;
            const availableHeight = window.innerHeight - headerHeight - 40;

            let size = Math.min(availableHeight * 0.3, 200);

            profilePictureWrapper.style.width = size + 'px';
            profilePictureWrapper.style.height = size + 'px';
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
>>>>>>> 8b3c5b94fa8287772b7cab950c39b9ef5a9e9ad6
</body>
</html>
