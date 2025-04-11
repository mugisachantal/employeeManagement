<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Details</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
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
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">{{$employee->name}}'s current Details</h2>
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
                    <td>{{ $employee['name'] }}</td>
                    <td>{{ $employee['email'] }}</td>
                    <td>{{ $employee['date_of_birth'] }}</td>
                    <td>{{ $employee['sex'] }}</td>
                    <td>{{ $employee['salary'] }}</td>
                    <td>{{ $employee['department_name'] }}</td>
                    <td>{{ \Carbon\Carbon::parse($employee['created_at'])->format('Y-m-d \a\t H:i:s') }}</td>
                    <td>{{ \Carbon\Carbon::parse($employee['updated_at'])->format('Y-m-d \a\t H:i:s') }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="container">
        <h2 class="mb-4">EDIT {{$employee->name}}'s  Details</h2>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Only fill in the fields you would like to make changes to') }}</div>
    
                    <div class="card-body">
                        <form method="POST" action="{{ route('editing',$employee->id) }}">
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
    </div>
    

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>