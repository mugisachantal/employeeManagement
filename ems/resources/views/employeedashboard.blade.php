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

<body>

  <!-- Top Navbar -->
  <div class="top-nav d-flex justify-content-between align-items-center">
    <span class="fs-5"><i class="fas fa-user-circle me-2"></i>Employee</span>
    <div>
      <a class="nav-link d-inline me-3" href="#"><i class="fas fa-user me-1"></i>Profile</a>
      <a class="nav-link d-inline" href="#"><i class="fas fa-sign-out-alt me-1"></i>Logout</a>
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
            </div>
          </div>

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
</body>
</html>
