
    @extends('components.layout')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header blue-gradient text-white py-3">
                <h4 class="mb-0">Leave Request</h4>
            </div>
            <div class="card-body p-4">
                <div class="d-flex align-items-center mb-4">
                    <div class="employee-avatar me-3">
                        {{$employee->name[0]}}
                    </div>
                    <div>
                        <h5 class="mb-0">{{$employee->name}}</h5>
                        <span class="text-muted">{{$employee->position ?? 'Employee'}}</span>
                    </div>
                    <span class="badge bg-warning text-dark ms-auto">Pending</span>
                </div>
                
                <div class="row mb-4">
                    <div class="col-md-4">
                        <div class="card h-100 border-0 bg-light">
                            <div class="card-body p-3">
                                <small class="text-muted d-block">FROM</small>
                                <strong>{{$leaverequest->start_date ?? 'Start Date'}}</strong>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card h-100 border-0 bg-light">
                            <div class="card-body p-3">
                                <small class="text-muted d-block">TO</small>
                                <strong>{{$leaverequest->end_date ?? 'End Date'}}</strong>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card h-100 border-0 bg-light">
                            <div class="card-body p-3">
                                <small class="text-muted d-block">DAYS</small>
                                <strong>{{$leaverequest->days ?? '3'}} day(s)</strong>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="leave-reason bg-light p-3 rounded mb-4">
                    <h6 class="text-muted mb-2">REASON FOR LEAVE</h6>
                    <p class="mb-0">{{$leaverequest->reason}}</p>
                </div>
                
                <form action="{{route('leave.request.handling',$leaverequest->id)}}" method="POST">
                    @csrf
                    <div class="row mb-4">
                        <div class="col-md-6 mb-3 mb-md-0">
                            <div class="decision-card approve-card card h-100 p-3 text-center" id="approveCard">
                                <input type="radio" name="confirmation_status" id="confirmRadio" value="approved" required>
                                <div class="py-2">
                                    <i class="fas fa-check-circle fa-2x blue-icon mb-2"></i>
                                    <h6 class="mb-1">Approve Request</h6>
                                    <small class="text-muted">Grant the leave request</small>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="decision-card reject-card card h-100 p-3 text-center" id="rejectCard">
                                <input type="radio" name="confirmation_status" id="rejectRadio" value="rejected" required>
                                <div class="py-2">
                                    <i class="fas fa-times-circle fa-2x red-icon mb-2"></i>
                                    <h6 class="mb-1">Reject Request</h6>
                                    <small class="text-muted">Deny the leave request</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <label for="feedback" class="form-label">Feedback (Optional)</label>
                        <textarea class="form-control" id="feedback" name="feedback" rows="3" placeholder="Add any comments or feedback about this decision..."></textarea>
                    </div>
                    
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary btn-lg">Submit Decision</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endsection
    
  