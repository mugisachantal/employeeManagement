<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee List </title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .department-card {
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            margin-bottom: 24px;
            overflow: hidden;
            background-color: #fff;
            border-top: 4px solid #0d6efd;
        }
        .department-header {
            background-color: #f7f9fc;
            padding: 15px 20px;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }
        .department-header h3 {
            margin: 0;
            font-weight: 600;
            color: #0d6efd;
            font-size: 1.3rem;
            display: flex;
            align-items: center;
        }
        .department-header h3 i {
            margin-right: 10px;
        }
        .table {
            margin-bottom: 0;
        }
        .table th {
            background-color: #f8f9fa;
            font-weight: 600;
            border-top: none;
            text-transform: uppercase;
            font-size: 0.825rem;
            letter-spacing: 0.5px;
            color: #6c757d;
        }
        .table tbody tr:hover {
            background-color: rgba(13, 110, 253, 0.05);
        }
        .table td {
            vertical-align: middle;
            padding: 12px 16px;
        }
        .edit-btn {
            border-radius: 6px;
            padding: 6px 14px;
            transition: all 0.2s;
        }
        .page-header {
            background-color: #0d6efd;
            color: white;
            padding: 20px 0;
            margin-bottom: 30px;
            border-radius: 0 0 10px 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        .page-header h1 {
            font-weight: 700;
            margin: 0;
            font-size: 1.8rem;
        }
        .employee-count {
            background-color: rgba(255, 255, 255, 0.2);
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 0.85rem;
            margin-left: 10px;
            font-weight: normal;
        }
        .navbar-brand img {
      height: 40px;
    }
    
    </style>
</head>
<body>
    <header class="bg-primary text-white py-3">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                <div class="container-fluid">
                    <a class="navbar-brand d-flex align-items-center" href="/">
                        <img src="/images/logo.png" class="me-2 rounded-circle" alt="Logo">
                        <h1 class="m-0 fw-bold fs-3">MotorVitaGlobal</h1>
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="/"><i class="bi bi-house-fill me-1"></i> Home</a>
                            </li>
                            </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <div class="page-sub-header bg-gray">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h1><i class="bi bi-people-fill me-2"></i> Employee Directory</h1>
                <div>
                    <button class="btn btn-light btn-sm"><i class="bi bi-filter me-1"></i> Filter</button>
                    <button class="btn btn-light btn-sm ms-2"><i class="bi bi-download me-1"></i> Export</button>
                </div>
            </div>
        </div>
    </div>

    <div class="container mb-5">
        @foreach ($employeesByDepartment as $departmentName => $employees)
            <div class="department-card">
                <div class="department-header">
                    <h3>
                        <i class="bi bi-building"></i>
                        {{ $departmentName }} Department
                        <span class="employee-count">{{ count($employees) }} employees</span>
                    </h3>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead>
                            <tr>
                                @foreach (array_keys($employees->first()->toArray()) as $attribute)
                                    @if ($attribute !== 'id' && $attribute !== 'password'&&$attribute !== 'profile_picture')
                                        @if ($attribute !== 'created_at' && $attribute !== 'updated_at')
                                            <th>{{ ucfirst(str_replace('_', ' ', $attribute)) }}</th>
                                        @endif
                                        @if ($attribute == 'created_at')
                                            <th><i class="bi bi-calendar-check me-1"></i> Registered On</th>
                                        @endif
                                        @if ($attribute == 'updated_at')
                                            <th><i class="bi bi-clock-history me-1"></i> Updated On</th>
                                        @endif
                                    @endif
                                    @if($attribute=='id')
                                        @if($T==1||$T==3)
                                            <th class="text-center">Actions</th>
                                        @endif
                                      
                                    @endif
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($employees as $employee)
                                <tr>
                                    @foreach ($employee->toArray() as $key => $value)
                                        @if ($key !== 'id' && $key != 'password'&& $key!='profile_picture')
                                            @if ($key == 'email')
                                                <td><a href="mailto:{{ $value }}" class="text-decoration-none">{{ $value }}</a></td>
                                            @elseif ($key == 'name' || $key == 'first_name' || $key == 'last_name')
                                                <td class="fw-semibold">{{ $value }}</td>
                                            @else
                                                <td>{{ $value }}</td>
                                            @endif
                                        @endif
                                        @if($key=='id')
                                            @if($T==1)
                                                <td class="text-center">
                                                    <a href="{{ route('editing', $value)}}" class="btn btn-primary btn-sm edit-btn">
                                                        <i class="bi bi-pencil-square me-1"></i> edit
                                                    </a>
                                                </td>                       
                                            @endif
                                            @if($T==3)
                                            <td class="text-center">
                                                <a href="{{ route('delete', $value)}}" class="btn btn-danger btn-sm btn-delete">
                                                    <i class="bi bi-trash me-1"></i> Delete
                                                </a>
                                            </td>                       
                                        @endif
                                        @endif
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endforeach
    </div>
<script>
    
</script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>