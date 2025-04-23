@extends('components.layout')
@section('content')
<div class="admin-content">
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
   
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-3">
        <div class="col">
            <div class="dashboard-card border-primary">
                <h5><i class="bi bi-envelope-fill me-2"></i> Leave Requests</h5>
                <div class="dropdown-container">
                    <div class="card-dropdown-toggle" onclick="toggleDropdown(this)">
                        View Requests <span class="badge bg-primary rounded-pill ms-2">{{ count($leaverequests ?? []) }}</span>
                    </div>
                    <ul class="dropdown-menu" data-parent=".dashboard-card">
                        @forelse ($employees as $employee)
                        @foreach ($leaverequests as $leaverequest)
                        @if($employee->id==$leaverequest->employee_id )
                            <li><a class="dropdown-item" href="{{route('leave.request.handling',['leaverequest'=>$leaverequest])}}">Request By:{{ $employee->name }}</a></li>
                            @break
                            @endif
                            @endforeach
                        @empty
                            <li><span class="dropdown-item">No pending requests</span></li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="dashboard-card border-success">
                <h5><i class="bi bi-person-check-fill me-2"></i> Total Employees</h5>
                <p class="fs-3 fw-bold">{{ count($employees ?? []) }}</p>
            </div>
        </div>
        <div class="col">
<div class="dashboard-card border-danger">
<h5><i class="bi bi-file-earmark-text-fill me-2"></i> Total Applications</h5>
<p class="fs-3 fw-bold">{{ \App\Models\Application::count() }}</p>
</div>
</div>

        <div class="col">
            <div class="dashboard-card border-warning">
                <h5><i class="bi bi-currency-dollar me-2"></i> Pending Salary</h5>
                <div class="dropdown-container">
                    <div class="card-dropdown-toggle" onclick="toggleDropdown(this)">
                        View Pending <span class="badge bg-warning text-dark rounded-pill ms-2">{{ count($UnPaidEmployees ?? []) }}</span>
                    </div>
                    <ul class="dropdown-menu salary-dropdown-menu" data-parent=".dashboard-card">
                        <div class="table-responsive">
                            <table class="table table-hover table-striped mb-0">
                                <thead class="bg-warning text-dark">
                                    <tr>
                                        <th>Employee Name</th>
                                        <th>Salary Amount</th>
                                        <th class="text-center">Payment Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @forelse ($UnPaidEmployees as $employee)
                                    <tr id="employee-row-{{ $employee->id }}">
                                        <td>{{ $employee->name }}</td>
                                        <td>${{ number_format($employee->salary, 2) }}</td>
                                        <td class="text-center">
                                            <form action="{{ route('payment.confirmation',$employee->email) }}" method="POST" class="salary-form">
                                                @csrf
                                                <input type="hidden" name="employee_id" value="{{ $employee->id }}">
                                                <div class="form-check d-flex justify-content-center">
                                                    <input type="checkbox" class="form-check-input salary-checkbox" 
                                                        id="checkbox-{{ $employee->id }}" 
                                                        data-employee-id="{{ $employee->id }}"
                                                        name="submit_on_check">
                                                </div>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center py-3 text-muted">No pending salaries</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="dashboard-card border-info">
                <h5><i class="bi bi-check-circle-fill me-2"></i> Paid Employees</h5>
                <div class="dropdown-container">
                    <div class="card-dropdown-toggle" onclick="toggleDropdown(this)">
                        Paid Employees<span class="badge bg-info text-white rounded-pill ms-2">{{ count($paidemployees ?? []) }}</span>
                    </div>
                    <ul class="dropdown-menu" data-parent=".dashboard-card">
                        @forelse ($paidemployees as $paidemployee)
                            <li><a class="dropdown-item" href="#">{{ $paidemployee->name }}</a></li>
                        @empty
                            <li><span class="dropdown-item">No paid employees listed</span></li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection
        

    