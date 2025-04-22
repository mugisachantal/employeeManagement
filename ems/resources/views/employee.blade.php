<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Details</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
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

    <div class="container">
        <button class="btn btn-primary btn-lg show-form-btn" id="showFormBtn">
            <i class="bi bi-pencil-square me-2"></i>Update Profile
        </button>

        @if($flag==0)
        <div class="row justify-content-center registration-form" id="employeeUpdateForm">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit Employee Details') }}</div>

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
                                <label for="salary" class="col-md-4 col-form-label text-md-end">{{ __('Salary') }}</label>

                                <div class="col-md-6">
                                    <input id="salary" type="text" class="form-control @error('salary') is-invalid @enderror" name="salary" value="{{ old('salary') }}"  autocomplete="" autofocus>

                                    @error('salary')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="date_of_birth" class="col-md-4 col-form-label text-md-end">{{ __('Date of birth') }}</label>

                                <div class="col-md-6">
                                    <input id="date_of_birth" type="date" class="form-control @error('date_of_birth') is-invalid @enderror" name="date_of_birth" value="{{ old('date_of_birth') }}"  autocomplete="date_of_birth" autofocus>

                                    @error('date_of_birth')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="mb-3 row">
                                <label for="sex" class="col-md-4 col-form-label text-md-end">{{ __('Sex') }}</label>

                                <div class="col-md-6">
                                    <input id="sex" type="text" class="form-control @error('sex') is-invalid @enderror" name="sex" value="{{ old('sex') }}"  autocomplete="sex" autofocus>

                                    @error('sex')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>



                            <div class="mb-3 row">
                                <label for="department" class="col-md-4 col-form-label text-md-end">{{ __('Department') }}</label>

                                <div class="col-md-6">
                                    <input id="department" type="text" class="form-control @error('department') is-invalid @enderror" name="department" value="{{ old('department') }}"  autocomplete="department" autofocus>

                                    @error('department')
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
                                    <button type="button" class="btn btn-outline-danger cancel-form-btn">
                                        {{ __('Cancel') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endif

        @if($id != -1)
        <div class="row justify-content-center registration-form" id="userProfileUpdateForm">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Update Your Profile') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('update',['id'=>$user->id,'flag'=>1])}}" id="userRegisterForm" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-4">
                                <label for="profile_picture" class="form-label fw-bold mb-3">Your Profile Picture</label>
                                <div class="profile-picture-container">
                                    <div class="profile-picture-preview" id="userProfilePreview">
                                        @if ($user->profile_picture)
                                            <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="Profile Picture">
                                        @else
                                            <i class="bi bi-person"></i>
                                        @endif
                                    </div>
                                    <div class="text-center mb-3">
                                        <span class="text-muted small">Upload a new profile picture</span>
                                    </div>
                                    <div class="custom-file-button">
                                        <button type="button" class="btn btn-outline-primary">
                                            <i class="bi bi-upload me-2"></i>Choose File
                                        </button>
                                        <input id="user_profile_picture"class="form-control"  type="file" name="profile_picture" accept="image/*">
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email Address</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" autocomplete="email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">New Password</label>
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

                            <div class="mb-4">
                                <label for="password-confirm" class="form-label">Confirm New Password</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                                </div>
                            </div>

                            <div class="btn-container">
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-check2-circle me-2"></i>Save Changes
                                </button>
                                <button type="reset" class="btn btn-secondary clear-form-btn">
                                    <i class="bi bi-eraser me-2"></i>Clear Form
                                </button>
                                <button type="button" class="btn btn-outline-danger cancel-form-btn">
                                    <i class="bi bi-x-circle me-2"></i>Cancel
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endif

        @if($id == -1)
        <div class="row justify-content-center registration-form" id="adminProfileUpdateForm">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Update Admin Profile') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('Admin.profile.update')}}" id="adminRegisterForm" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-4">
                                <label for="profile_picture" class="form-label fw-bold mb-3">Admin Profile Picture</label>
                                <div class="profile-picture-container">
                                    <div class="profile-picture-preview" id="adminProfilePreview">
                                        @if ($user->profile_picture)
                                            <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="Profile Picture">
                                        @else
                                            <i class="bi bi-person"></i>
                                        @endif
                                    </div>
                                    <div class="text-center mb-3">
                                        <span class="text-muted small">Upload a new profile picture</span>
                                    </div>
                                    <div class="custom-file-button">
                                        <button type="button" class="btn btn-outline-primary">
                                            <i class="bi bi-upload me-2"></i>Choose File
                                        </button>
                                        <input id="admin_profile_picture" class="form-control" type="file" name="profile_picture" accept="image/*">
                                    </div>
                                </div>
                            </div>
        
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="" autocomplete="name">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
        
                            <div class="mb-3">
                                <label for="email" class="form-label">Email Address</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="" autocomplete="email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
        
                            <div class="mb-3">
                                <label for="date_of_birth" class="form-label">Date of Birth</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-calendar"></i></span>
                                    <input id="date_of_birth" type="date" class="form-control @error('date_of_birth') is-invalid @enderror" name="date_of_birth" value="">
                                    @error('date_of_birth')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
        
                            <div class="mb-3">
                                <label for="sex" class="form-label">Sex</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-gender-ambiguous"></i></span>
                                    <select id="sex" class="form-control @error('sex') is-invalid @enderror" name="sex">
                                        <option value="">Select</option>
                                        <option value="m" {{ old('sex', strtolower($user->sex)) == 'm' ? 'selected' : '' }}>Male</option>
                                        <option value="f" {{ old('sex', strtolower($user->sex)) == 'f' ? 'selected' : '' }}>Female</option>
                                        <option value="o" {{ old('sex', strtolower($user->sex)) == 'o' ? 'selected' : '' }}>Other</option>
                                    </select>
                                    @error('sex')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
        
                            <div class="mb-3">
                                <label for="salary" class="form-label">Salary</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-currency-dollar"></i></span>
                                    <input id="salary" type="number" step="0.01" class="form-control @error('salary') is-invalid @enderror" name="salary" value="{{ old('salary', $user->salary) }}">
                                    @error('salary')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
        
                            <div class="mb-3">
                                <label for="department_name" class="form-label">Department Name</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-building"></i></span>
                                    <input id="department_name" type="text" class="form-control @error('department_name') is-invalid @enderror" name="department_name" value="{{ old('department_name', $user->department_name) }}">
                                    @error('department_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
        
                            <div class="mb-3">
                                <label for="password" class="form-label">New Password</label>
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
        
                            <div class="mb-4">
                                <label for="password-confirm" class="form-label">Confirm New Password</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                                </div>
                            </div>
        
                            <div class="btn-container">
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-check2-circle me-2"></i>Save Changes
                                </button>
                                <button type="reset" class="btn btn-secondary clear-form-btn">
                                    <i class="bi bi-eraser me-2"></i>Clear Form
                                </button>
                                <button type="button" class="btn btn-outline-danger cancel-form-btn">
                                    <i class="bi bi-x-circle me-2"></i>Cancel
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @endif
        </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const showFormBtn = document.getElementById('showFormBtn');
            const employeeUpdateForm = document.getElementById('employeeUpdateForm');
            const userProfileUpdateForm = document.getElementById('userProfileUpdateForm');
            const adminProfileUpdateForm = document.getElementById('adminProfileUpdateForm');
            const cancelFormBtns = document.querySelectorAll('.cancel-form-btn');
            const clearFormBtns = document.querySelectorAll('.clear-form-btn');
            const userProfilePictureInput = document.getElementById('user_profile_picture');
            const adminProfilePictureInput = document.getElementById('admin_profile_picture');
            const userProfilePreview = document.getElementById('userProfilePreview');
            const adminProfilePreview = document.getElementById('adminProfilePreview');
            const currentId = "{{ $id }}";
            const flag = "{{ $flag }}";

            // Initially hide all forms
            if (employeeUpdateForm) employeeUpdateForm.style.display = 'none';
            if (userProfileUpdateForm) userProfileUpdateForm.style.display = 'none';
            if (adminProfileUpdateForm) adminProfileUpdateForm.style.display = 'none';

            showFormBtn.addEventListener('click', function() {
                showFormBtn.style.display = 'none';
                if (flag == 0 && employeeUpdateForm) {
                    employeeUpdateForm.style.display = 'flex';
                } else if (currentId != -1 && userProfileUpdateForm) {
                    userProfileUpdateForm.style.display = 'flex';
                } else if (currentId == -1 && adminProfileUpdateForm) {
                    adminProfileUpdateForm.style.display = 'flex';
                }
            });

            cancelFormBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    if (employeeUpdateForm && employeeUpdateForm.style.display === 'flex') employeeUpdateForm.style.display = 'none';
                    if (userProfileUpdateForm && userProfileUpdateForm.style.display === 'flex') userProfileUpdateForm.style.display = 'none';
                    if (adminProfileUpdateForm && adminProfileUpdateForm.style.display === 'flex') adminProfileUpdateForm.style.display = 'none';
                    showFormBtn.style.display = 'block';
                });
            });

            clearFormBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    const form = this.closest('form');
                    if (form) {
                        form.reset();
                        const preview = form.querySelector('.profile-picture-preview');
                        if (preview) {
                            preview.innerHTML = '<i class="bi bi-person"></i>';
                        }
                    }
                });
            });

            if (userProfilePictureInput && userProfilePreview) {
                userProfilePictureInput.addEventListener('change', function(e) {
                    if (e.target.files && e.target.files[0]) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            userProfilePreview.innerHTML = '';
                            const img = document.createElement('img');
                            img.src = e.target.result;
                            userProfilePreview.appendChild(img);
                        }
                        reader.readAsDataURL(e.target.files[0]);
                    } else if (userProfilePreview.querySelector('img')) {
                        userProfilePreview.innerHTML = '<i class="bi bi-person"></i>';
                    }
                });
            }

            if (adminProfilePictureInput && adminProfilePreview) {
                adminProfilePictureInput.addEventListener('change', function(e) {
                    if (e.target.files && e.target.files[0]) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            adminProfilePreview.innerHTML = '';
                            const img = document.createElement('img');
                            img.src = e.target.result;
                            adminProfilePreview.appendChild(img);
                        }
                        reader.readAsDataURL(e.target.files[0]);
                    } else if (adminProfilePreview.querySelector('img')) {
                        adminProfilePreview.innerHTML = '<i class="bi bi-person"></i>';
                    }
                });
            }
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>