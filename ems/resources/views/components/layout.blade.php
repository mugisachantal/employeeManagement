<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Human Resource Manager - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }                  
        .admin-sidebar {
            width: 260px;
            background-color: #e9ecef;
            height: 100vh;
            overflow-y: auto;
            border-right: 1px solid #dee2e6;
            display: flex; /* Enable flexbox for sidebar content */
            flex-direction: column; /* Stack sidebar items vertically */
        }
        .admin-sidebar .nav-link {
            padding: 12px 16px;
            color: #343a40;
        }
        .admin-sidebar .nav-link:hover {
            background-color: #f0f0f0;
        }
        .admin-sidebar .nav-link.active {
            background-color: #0d6efd;
            color: white;
            border-radius: 6px;
        }
        .admin-content {
            flex-grow: 1;
            padding: 20px;
        }
        .dashboard-card {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            padding: 20px;
            margin-bottom: 20px;
            border-left: 5px solid; /* Theme accent */
            height: 100%;
        }
        .dashboard-card h5 {
            font-weight: bold;
            color: #495057;
            margin-bottom: 15px;
        }
        .dropdown-menu {
            position: absolute !important;
            z-index: 1000;
            display: none; /* Initially hidden */
            min-width: 10rem;
            padding: 0.5rem 0;
            margin: 0.125rem 0 0;
            font-size: 0.875rem;
            color: #212529;
            text-align: left;
            list-style: none;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid rgba(0, 0, 0, 0.15);
            border-radius: 0.25rem;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        }
        /* Make salary dropdown menu wider */
        .salary-dropdown-menu {
            width: 500px !important;
            max-width: 100vw;
        }
        .dropdown-item {
            display: block;
            width: 100%;
            padding: 0.25rem 1.5rem;
            clear: both;
            font-weight: 400;
            color: #212529;
            text-align: inherit;
            white-space: nowrap;
            background-color: transparent;
            border: 0;
        }
        .dropdown-item:hover, .dropdown-item:focus {
            color: #1e2125;
            background-color: #e9ecef;
            text-decoration: none;
        }
        .card-dropdown-toggle {
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
            padding: 15px;
            border: 1px solid #ced4da;
            border-radius: 6px;
            background-color: #f8f9fa;
            color: #495057;
            font-weight: 500;
        }
        .card-dropdown-toggle::after {
            content: "";
            display: inline-block;
            margin-left: 0.255em;
            vertical-align: 0.255em;
            border-top: 0.3em solid;
            border-right: 0.3em solid transparent;
            border-bottom: 0;
            border-left: 0.3em solid transparent;
        }
        .card-dropdown-toggle.show::after {
            transform: rotate(-180deg);
        }
        .dropdown-container {
            position: relative;
        }
        .sidebar-user-dropdown {
            padding: 15px;
            border-bottom: 1px solid #dee2e6;
        }
        /* Fix for salary card */
        .salary-card {
            height: 100%;
        }
        .navbar-brand img {
                            height: 40px;
                          }
                          .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
            max-width: 600px;
            margin: 0 auto;
        }
        .blue-gradient {
            background: linear-gradient(135deg, #0d6efd 0%, #0dcaf0 100%);
        }
        .leave-reason {
            border-left: 4px solid #0d6efd;
        }
        .approve-card.active {
            border-color: #0d6efd;
            background-color: #f0f7ff;
        }
        .reject-card.active {
            border-color: #dc3545;
            background-color: #fff5f5;
        }
        .decision-card {
            cursor: pointer;
            transition: all 0.2s ease;
            border: 2px solid transparent;
        }
        .decision-card.active {
            transform: translateY(-3px);
        }
        .decision-card input {
            position: absolute;
            opacity: 0;
        }
        .blue-icon {
            color: #0d6efd;
        }
        .red-icon {
            color: #dc3545;
        }
        .employee-avatar {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            background-color: #e7f1ff;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #0d6efd;
            font-weight: bold;
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
                    @auth('admin')
                        <form action="{{ route('logout') }}" method="POST" class="d-flex align-items-center">
                            @csrf
                            <button type="submit" class="btn btn-outline-light btn-sm">
                                <i class="bi bi-box-arrow-right me-2"></i> Logout
                            </button>
                        </form>
                    @elseif(auth()->check() && auth()->getDefaultDriver() === 'employee')
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

    <div class="container-fluid d-flex">
        <div class="admin-sidebar p-3 d-flex flex-column">
            <div class="sidebar-user-dropdown mb-3">
                <div class="dropdown">
                    WELCOME ADMIN  
                    <a href="{{ route('editing',-1)}}" class="d-flex align-items-center link-dark text-decoration-none " >
                      <img src="{{ asset('storage/' . $Hr->profile_picture) }}" alt="HR profile picture" width="50" height="50" class="rounded-circle me-1">
                        <strong> {{$Hr->name}}</strong>
                    </a>
                    <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
                        <li><a class="dropdown-item" href="#">New project...</a></li>
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Sign out</a></li>
                    </ul>
                </div>
            </div>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="#" class="nav-link link-dark active" aria-current="page">
                        <i class="bi bi-graph-up me-2"></i>
                        Dashboard  
                    </a>
                </li>
                <li>
                    <a href="{{ route('register') }}" class="nav-link link-dark">
                        <i class="bi bi-person-plus-fill me-2"></i>
                        Register Employee
                    </a>
                </li>
                <li>
                    <a href="{{route("employeelist",2)}}" class="nav-link link-dark">
                        <i class="bi bi-pencil-square me-2"></i>
                        View List of Employees
                    </a>
                </li>
                <li>
                    <a href="{{route("employeelist",1)}}" class="nav-link link-dark">
                        <i class="bi bi-trash-fill me-2"></i>
                        Update Employee Profile
                    </a>
                </li>
                <li>
                    <a href="{{route("employeelist",3)}}" class="nav-link link-dark">
                        <i class="bi bi-list-ul me-2"></i>
                        Delete Employee Record
                    </a>
                </li>
                
                <li>
                    <a href="{{route('job.form')}}" class="nav-link link-dark">
                        <i class="bi bi-briefcase-fill me-2"></i>
                        Post Jobs
                    </a>
                </li>

                <li>
               <a href="{{ route('admin.applications') }}" class="nav-link link-dark">
                <i class="bi bi-briefcase-fill me-2"></i>
                 View Applications
               </a>
               </li>
               <li>
                    <a href="{{ route('admin.company-policies.create') }}" class="nav-link link-dark">
                        <i class="bi bi-upload me-2"></i>
                        Upload Company Policies
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.announcements.create') }}" class="nav-link link-dark">
                        <i class="bi bi-upload me-2"></i>
                        Upload Announcements
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.company-policies.list') }}" class="nav-link link-dark">
                        <i class="bi bi-file-earmark-text me-2"></i>
                        Uploaded Company Policies
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.announcements.list') }}" class="nav-link link-dark">
                        <i class="bi bi-file-earmark-text me-2"></i>
                        Uploaded Announcements
                    </a>
                </li>
                
            </ul>
            <hr>
            {{-- The dropdown is now at the top --}}
        </div>

        @yield('content')

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
    <script>
        function toggleDropdown(element) {
            const dropdownMenu = element.nextElementSibling;
            const parentCard = element.closest('.dashboard-card');
            const allDropdowns = document.querySelectorAll('.dropdown-menu');
            const allToggles = document.querySelectorAll('.card-dropdown-toggle');

            // Close all other dropdowns first
            allDropdowns.forEach(dd => {
                if (dd !== dropdownMenu) {
                    dd.style.display = 'none';
                }
            });
            
            allToggles.forEach(toggle => {
                if (toggle !== element) {
                    toggle.classList.remove('show');
                }
            });

            // Toggle the current dropdown
            dropdownMenu.style.display = dropdownMenu.style.display === 'block' ? 'none' : 'block';
            element.classList.toggle('show');
        }

        // Close dropdown when clicking outside
        document.addEventListener('click', function(event) {
            if (!event.target.closest('.dropdown-container')) {
                const allDropdowns = document.querySelectorAll('.dropdown-menu');
                const allToggles = document.querySelectorAll('.card-dropdown-toggle');
                allDropdowns.forEach(dd => dd.style.display = 'none');
                allToggles.forEach(toggle => toggle.classList.remove('show'));
            }
        });

        // Functionality for the sidebar user dropdown
        const sidebarDropdownToggle = document.querySelector('#dropdownUser2');
        const sidebarDropdownMenu = document.querySelector('.sidebar-user-dropdown .dropdown-menu');

        if (sidebarDropdownToggle && sidebarDropdownMenu) {
            sidebarDropdownToggle.addEventListener('click', function(event) {
                event.preventDefault();
                sidebarDropdownMenu.classList.toggle('show');
                sidebarDropdownToggle.setAttribute('aria-expanded', sidebarDropdownMenu.classList.contains('show'));
            });

            document.addEventListener('click', function(event) {
                if (!event.target.closest('.sidebar-user-dropdown')) {
                    sidebarDropdownMenu.classList.remove('show');
                    sidebarDropdownToggle.setAttribute('aria-expanded', false);
                }
            });
        }

        // Functionality for salary checkboxes
        document.addEventListener('DOMContentLoaded', function() {
            // Handle checkbox change events for salary payments
            const salaryCheckboxes = document.querySelectorAll('.salary-checkbox');
            salaryCheckboxes.forEach(checkbox => {
                checkbox.addEventListener('change', function() {
                    if (this.checked) {
                        const employeeId = this.getAttribute('data-employee-id');
                        const row = document.getElementById('employee-row-' + employeeId);
                        const form = this.closest('form');
                        
                        if (confirm('Are you sure you want to mark this salary as paid?')) {
                            // Add visual feedback to show processing
                            row.classList.add('table-warning', 'opacity-50');
                            
                            // Submit the form
                            form.submit();
                            
                            // Remove the row after 3 seconds
                            setTimeout(() => {
                                row.style.display = 'none';
                            }, 3000);
                        } else {
                            // Uncheck if cancelled
                            this.checked = false;
                        }
                    }
                });
            });
        });
        document.addEventListener('DOMContentLoaded', function() {
            const approveCard = document.getElementById('approveCard');
            const rejectCard = document.getElementById('rejectCard');
            const approveRadio = document.getElementById('confirmRadio');
            const rejectRadio = document.getElementById('rejectRadio');
            
            approveCard.addEventListener('click', function() {
                approveRadio.checked = true;
                approveCard.classList.add('active');
                rejectCard.classList.remove('active');
            });
            
            rejectCard.addEventListener('click', function() {
                rejectRadio.checked = true;
                rejectCard.classList.add('active');
                approveCard.classList.remove('active');
            });
        });
        //announcement
        const modal = document.getElementById('confirmDeleteModal');
    modal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;
        const id = button.getAttribute('data-id');
        const action = `/admin/announcements/delete/${id}`;
        const form = document.getElementById('deleteForm');
        form.setAttribute('action', action);
    });
    </script>
</body>
</html>