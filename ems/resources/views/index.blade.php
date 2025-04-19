
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>MotorVitaGlobal - Homepage</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-dnmh/3c6ylZP7z+77mF5PpV8FEiMC3YHxHaZQzZbE+a+mCmaQGgM0iMy1jO8nPAtX8/9OM6KXTxj3b4+uCB8aQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <style>
    body, html {
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
      background-color: #000;
      color: white;
      height: 100%;
      width: 100%;
    }

    .navbar {
      background-color: rgba(86, 86, 243, 0.9);
    }

    .navbar-brand img {
      height: 40px;
    }

    .hero-section {
      height: 90vh;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: flex-start;
      padding: 0 10%;
      background-image: url('images/carss.png');
      background-size: cover;
      background-position: center center;
      background-repeat: no-repeat;
    }

    .hero-title {
      font-size: 3rem;
      font-weight: bold;
      color: blue;
    }

    footer {
      background-color: rgba(81, 81, 226, 0.9);
      color: white;
      text-align: center;
      padding: 15px 0;
    }

    .btn-apply {
      background-color: #ffffff;
      color: rgb(89, 89, 215);
      border: none;
      padding: 12px 24px;
      font-weight: bold;
      border-radius: 5px;
    }

    .advertisement-modal .modal-content {
      background-color: darkgray;
      color: white;
    }

    .apply-form {
      display: none;
      margin-top: 20px;
      padding: 20px;
      background-color: #1a1a1a;
      border-radius: 8px;
      max-width: 500px;
      margin-left: auto;
      margin-right: auto;
    }

    .apply-form input, .apply-form textarea {
      margin-bottom: 10px;
    }
  </style>
</head>
<body>

  <!-- NAVIGATION -->
  <nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <img src="/images/logo.png" class="me-2 rounded-circle" alt="Logo">
        MotorVitaGlobal
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
        <a class="nav-link" href="{{ route('login') }}">Login</a>
      </ul>
    </div>
  </nav>

  <!-- MAIN HERO SECTION -->
  <section class="hero-section">
    <h1 class="hero-title">MotorVitaGlobal Company</h1>
    <p>A car company that speaks Volumes, we ride on legacy!!!!</p>
    <p>Get behind the wheel of your dream ride! A collection of affordable cars that fit your budget and exceed your expectations!</p>
    <button class="btn btn-apply mt-3" data-bs-toggle="modal" data-bs-target="#advertisementModal">🔔 View Announcements</button>
  </section>

  <!-- ABOUT US CARDS SECTION -->
  <section class="container my-5" id="about">
    <div class="row text-center mb-4">
      <h2>About MotorVitaGlobal</h2>
    </div>
    <div class="row g-4">
      <div class="col-md-4 animate__animated animate__fadeInUp">
        <div class="card p-3">
          <h5 class="card-title">Speed Masters</h5>
          <p class="card-text">Our sports series delivers top speeds with unmatched style and precision handling.</p>
        </div>
      </div>
      <div class="col-md-4 animate__animated animate__fadeInUp animate__delay-1s">
        <div class="card p-3">
          <h5 class="card-title">Eco Riders</h5>
          <p class="card-text">Experience eco-friendly driving with our hybrid and electric vehicles engineered for the future.</p>
        </div>
      </div>
      <div class="col-md-4 animate__animated animate__fadeInUp animate__delay-2s">
        <div class="card p-3">
          <h5 class="card-title">Family Comfort</h5>
          <p class="card-text">Spacious and safe SUVs built for long family trips and unforgettable adventures.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- FOOTER -->
  <footer>
    <div class="container">
      <p>&copy; 2025 MotorVitaGlobal. All rights reserved.</p>
      <div class="mt-3">
        <a href="https://x.com" target="_blank" class="text-white me-3"><i class="fab fa-x-twitter fa-lg"></i></a>
        <a href="https://facebook.com" target="_blank" class="text-white me-3"><i class="fab fa-facebook fa-lg"></i></a>
        <a href="https://instagram.com" target="_blank" class="text-white me-3"><i class="fab fa-instagram fa-lg"></i></a>
        <a href="https://wa.me/2348000000000" target="_blank" class="text-white me-3"><i class="fab fa-whatsapp fa-lg"></i></a>
        <a href="https://linkedin.com" target="_blank" class="text-white"><i class="fab fa-linkedin fa-lg"></i></a>
      </div>
    </div>
  </footer>

  <!-- ADVERTISEMENT MODAL -->
  <div class="modal fade advertisement-modal" id="advertisementModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content p-4">
        <div class="modal-header">
          <h5 class="modal-title">🔔 Advertisement!!!</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="job-list">
          <!-- Jobs will be dynamically inserted here -->
        </div>
      </div>
    </div>
  </div>

  

  <!-- SCRIPTS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

  <script>
    let currentJobId = null;

    document.addEventListener("DOMContentLoaded", () => {
      const adModal = new bootstrap.Modal(document.getElementById('advertisementModal'));
      adModal.show();

      fetch('/api/jobs') // Adjust this to your actual API endpoint
    .then(response => response.json())
    .then(data => {
        let jobList = '';
        data.forEach(job => {
            jobList += `
              <div>
                <strong>${job.name}</strong><br>
                Experience: ${job.experience}<br>
                Education: ${job.education}<br><br>
                <a href="/apply/${job.id}" class="btn btn-apply mb-3">Apply</a>
                <hr/>
              </div>
            `;
        });
        document.getElementById('job-list').innerHTML = jobList;
    })
    .catch(error => {
        console.error('Error fetching job data:', error);
    });
    });

    function showApplyForm(jobId) {
      currentJobId = jobId;
      document.getElementById('applyForm').style.display = 'block';
      document.getElementById('job_id').value = jobId;
    }

    document.getElementById('applicationForm').addEventListener('submit', function (e) {
      e.preventDefault();

      const formData = new FormData(this);
      formData.append('job_id', currentJobId);

      fetch('{{ route('apply.store') }}', {
        method: 'POST',
        body: formData
      })
      .then(res => res.json())
      .then(data => {
        alert('Application Submitted Successfully');
        document.getElementById('applyForm').style.display = 'none';
        this.reset();
      })
      .catch(err => alert('There was an error submitting your application.'));
    });
  </script>

</body>
</html>
