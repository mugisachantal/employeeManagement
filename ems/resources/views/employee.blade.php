<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Details</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        :root {
            --primary-blue: #0d6efd;
            --dark-blue: #0b5ed7;
            --light-blue: #e7f1ff;
        }
        
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .card {
            border: none;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
            border-radius: 0.5rem;
            margin-top: 2rem;
            margin-bottom: 2rem;
        }
        
        .card-header {
            background-color: var(--primary-blue);
            color: white;
            font-weight: 600;
            border-radius: 0.5rem 0.5rem 0 0 !important;
            padding: 1rem 1.5rem;
            font-size: 1.25rem;
        }
        
        .card-body {
            padding: 2rem;
        }
        
        .btn-primary {
            background-color: var(--primary-blue);
            border-color: var(--primary-blue);
            padding: 0.5rem 1.5rem;
            font-weight: 500;
        }
        
        .btn-primary:hover {
            background-color: var(--dark-blue);
            border-color: var(--dark-blue);
        }
        
        .btn-secondary {
            padding: 0.5rem 1.5rem;
            font-weight: 500;
        }
        
        .btn-outline-danger {
            padding: 0.5rem 1.5rem;
            font-weight: 500;
        }
        
        .form-control:focus {
            border-color: var(--primary-blue);
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
        }
        
        label {
            font-weight: 500;
        }
        
        .registration-form {
            display: none;
        }
        
        .show-form-btn {
            display: block;
            margin: 2rem auto;
            padding: 0.75rem 2rem;
            font-size: 1.1rem;
        }
        
        .btn-container {
            display: flex;
            justify-content: center;
            gap: 1rem;
            margin-top: 1.5rem;
        }
        
        .profile-picture-container {
            background-color: var(--light-blue);
            border-radius: 0.5rem;
            padding: 1.5rem;
            border: 2px dashed var(--primary-blue);
            position: relative;
        }
        
        .profile-picture-preview {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background-color: #e9ecef;
            margin: 0 auto 1rem auto;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }
        
        .profile-picture-preview i {
            font-size: 3rem;
            color: #adb5bd;
        }
        
        .profile-picture-preview img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .custom-file-button {
            position: relative;
            overflow: hidden;
            display: block;
            width: 100%;
            text-align: center;
        }
        
        .custom-file-button input[type=file] {
            position: absolute;
            left: 0;
            top: 0;
            opacity: 0;
            width: 100%;
            height: 100%;
            cursor: pointer;
        }
        .table th {
            background-color: #007bff; /* Bootstrap primary blue */
            color: white;
        }
        .table tbody tr:nth-child(even) {
            background-color: white;
            color: #007bff; /* Bootstrap primary blue */
        }
        .table tbody tr:nth-child(odd) {
            background-color: white;
            color: #000000; /* Bootstrap primary blue */
        }
        h2{
            text-align: center
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
    <div class="container mt-5">
        <h2 class="mb-4">@if($flag==0){{$user->name}}'s @else Your @endif current Details</h2>
          <!-- Profile Picture using Bootstrap classes -->
          <div class="text-center">
            <div class="profile-img-container">
                @if ($user->profile_picture)
                    <img src="{{ asset('storage/' . $user->profile_picture) }}" 
                         alt="Profile Picture" 
                         class="img-fluid rounded-circle border border-primary shadow">
                @else
                    <div class="no-profile-placeholder rounded-circle border border-primary shadow">
                        No Profile Picture
                    </div>
                @endif
            </div>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Date of Birth</th>
                    <th scope="col">Sex</th>
                    <th scope="col">Salary</th>
                    <th scope="col">Department Name</th>
                    <th scope="col">Registered on</th>
                    <th scope="col">Updated On</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $user['name'] }}</td>
                    <td>{{ $user['email'] }}</td>
                    <td>{{ $user['date_of_birth'] }}</td>
                    <td>{{ $user['sex'] }}</td>
                    <td>{{ $user['salary'] }}</td>
                    <td>{{ $user['department_name'] }}</td>
                    <td>{{ \Carbon\Carbon::parse($user['created_at'])->format('Y-m-d \a\t H:i:s') }}</td>
                    <td>{{ \Carbon\Carbon::parse($user['updated_at'])->format('Y-m-d \a\t H:i:s') }}</td>
                </tr>
            </tbody>
        </table>
    </div>
@if($flag==0)
    <div class="container">
        <h2 class="mb-4">EDIT {{$user->name}}'s  Details</h2>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Only fill in the fields you would like to make changes to') }}</div>
    
                    <div class="card-body">
                        <form method="POST" action="{{ route('update',['id'=>$user->id,'flag'=>0]) }}">
                            @csrf
    
                            <div class="mb-3 row">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
    
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  autocomplete="name" autofocus>
    
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="mb-3 row">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
    
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email">
    
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            

                            <div class="mb-3 row">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Salary') }}</label>
    
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="salary" value="{{ old('salary') }}"  autocomplete="" autofocus>
    
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Date of birth') }}</label>
    
                                <div class="col-md-6">
                                    <input id="name" type="date" class="form-control @error('name') is-invalid @enderror" name="date_of_birth" value="{{ old('date_of_birth') }}"  autocomplete="name" autofocus>
    
                                    @error('date_of_birth')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    

                            <div class="mb-3 row">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Sex') }}</label>
    
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('sex') is-invalid @enderror" name="sex" value="{{ old('sex') }}"  autocomplete="M" autofocus>
    
                                    @error('sex')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
    

                            <div class="mb-3 row">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Department') }}</label>
    
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="department" value="{{ old('department') }}"  autocomplete="name" autofocus>
    
                                    @error('date_of_birth')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-0 row">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Save changes') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @else
        <!-- Show form button -->
        <button class="btn btn-primary btn-lg show-form-btn" id="showFormBtn">
            <i class="bi bi-pencil-square me-2"></i>Update profle
        </button>
        @endif
 </div>


@if(!$id==-1)   
    <div class="container">
            <!--update Form -->
        <div class="row justify-content-center registration-form" id="registrationForm">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('update',['id'=>$user->id,'flag'=>1])}}" id="registerForm" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-4">
                                <label for="profile_picture" class="form-label fw-bold mb-3">Admin Profile Picture</label>
                                <div class="profile-picture-container">
                                    <div class="profile-picture-preview" id="profilePreview">
                                        <i class="bi bi-person"></i>
                                    </div>
                                    <div class="text-center mb-3">
                                        <span class="text-muted small">Upload your profile picture</span>
                                    </div>
                                    <div class="custom-file-button">
                                        <button type="button" class="btn btn-outline-primary">
                                            <i class="bi bi-upload me-2"></i>Choose File
                                        </button>
                                        <input id="profile_picture"class="form-control"  type="file" name="profile_picture" accept="image/*">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label for="email" class="form-label">Email Address</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                                    <input id="email" type="email" class="form-control" name="email"  autocomplete="email">
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-lock"></i></span>
                                    <input id="password" type="password" class="form-control" name="password"  autocomplete="new-password">
                                </div>
                            </div>
                            
                            <div class="mb-4">
                                <label for="password-confirm" class="form-label">Confirm Password</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password">
                                </div>
                            </div>
                            
                            <div class="btn-container">
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-check2-circle me-2"></i>Save Changes
                                </button>
                                <button type="reset" class="btn btn-secondary" id="clearFormBtn">
                                    <i class="bi bi-eraser me-2"></i>Clear Form
                                </button>
                                <button type="button" class="btn btn-outline-danger" id="cancelFormBtn">
                                    <i class="bi bi-x-circle me-2"></i>Cancel
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@else


<div class="container">
    <!--update Form -->
    <div class="row justify-content-center registration-form" id="registrationForm">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('Admin.profile.update')}}" id="registerForm" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label for="profile_picture" class="form-label fw-bold mb-3">employee Profile Picture</label>
                            <div class="profile-picture-container">
                                <div class="profile-picture-preview" id="profilePreview">
                                    <i class="bi bi-person"></i>
                                </div>
                                <div class="text-center mb-3">
                                    <span class="text-muted small">Upload your profile picture</span>
                                </div>
                                <div class="custom-file-button">
                                    <button type="button" class="btn btn-outline-primary">
                                        <i class="bi bi-upload me-2"></i>Choose File
                                    </button>
                                    <input id="profile_picture" class="form-control" type="file" name="profile_picture" accept="image/*">
                                </div>
                            </div>
                        </div>
                        
                        <!-- Name field -->
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Date of Birth field -->
                        <div class="mb-3">
                            <label for="date_of_birth" class="form-label">Date of Birth</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-calendar"></i></span>
                                <input id="date_of_birth" type="date" class="form-control @error('date_of_birth') is-invalid @enderror" name="date_of_birth" value="{{ old('date_of_birth') }}">
                                @error('date_of_birth')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Sex field -->
                        <div class="mb-3">
                            <label for="sex" class="form-label">Sex</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-gender-ambiguous"></i></span>
                                <select id="sex" class="form-control @error('sex') is-invalid @enderror" name="sex">
                                    <option value="">Select</option>
                                    <option value="M" {{ old('sex') == 'M' ? 'selected' : '' }}>Male</option>
                                    <option value="F" {{ old('sex') == 'F' ? 'selected' : '' }}>Female</option>
                                    <option value="O" {{ old('sex') == 'O' ? 'selected' : '' }}>Other</option>
                                </select>
                                @error('sex')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <!-- Email field (already exists) -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Department field -->
                        <div class="mb-3">
                            <label for="department" class="form-label">Department</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-building"></i></span>
                                <input id="department" type="text" class="form-control @error('department') is-invalid @enderror" name="department" value="{{ old('department') }}">
                                @error('department')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Salary field -->
                        <div class="mb-3">
                            <label for="salary" class="form-label">Salary</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-currency-dollar"></i></span>
                                <input id="salary" type="number" step="0.01" class="form-control @error('salary') is-invalid @enderror" name="salary" value="{{ old('salary') }}">
                                @error('salary')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <!-- Password field (already exists) -->
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-lock"></i></span>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <!-- Confirm Password field (already exists) -->
                        <div class="mb-4">
                            <label for="password-confirm" class="form-label">Confirm Password</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                            </div>
                        </div>
                        
                        <div class="btn-container">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-check2-circle me-2"></i>Save Changes
                            </button>
                            <button type="reset" class="btn btn-secondary" id="clearFormBtn">
                                <i class="bi bi-eraser me-2"></i>Clear Form
                            </button>
                            <button type="button" class="btn btn-outline-danger" id="cancelFormBtn">
                                <i class="bi bi-x-circle me-2"></i>Cancel
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endif




    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Get elements
            const showFormBtn = document.getElementById('showFormBtn');
            const registrationForm = document.getElementById('registrationForm');
            const cancelFormBtn = document.getElementById('cancelFormBtn');
            const clearFormBtn = document.getElementById('clearFormBtn');
            const profilePictureInput = document.getElementById('profile_picture');
            const profilePreview = document.getElementById('profilePreview');
            const registerForm = document.getElementById('registerForm');
            
            // Show the form when the button is clicked
            showFormBtn.addEventListener('click', function() {
                registrationForm.style.display = 'flex';
                showFormBtn.style.display = 'none';
            });
            
            // Hide the form when cancel button is clicked
            cancelFormBtn.addEventListener('click', function() {
                registrationForm.style.display = 'none';
                showFormBtn.style.display = 'block';
                registerForm.reset();
                profilePreview.innerHTML = '<i class="bi bi-person"></i>';
            });
            
            // Clear form functionality
            clearFormBtn.addEventListener('click', function() {
                profilePreview.innerHTML = '<i class="bi bi-person"></i>';
            });
            
            // Preview profile picture when selected
            profilePictureInput.addEventListener('change', function(e) {
                if (e.target.files && e.target.files[0]) {
                    const reader = new FileReader();
                    
                    reader.onload = function(e) {
                        profilePreview.innerHTML = '';
                        const img = document.createElement('img');
                        img.src = e.target.result;
                        profilePreview.appendChild(img);
                    }
                    
                    reader.readAsDataURL(e.target.files[0]);
                }
            });
        });
    </script>
    

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>