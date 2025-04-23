
@extends('components.elayout')
@section('content')

    <div class="container form-container">
           
       
        
        <div class="card">
            <div class="card-header py-3">
                <h4 class="mb-0"><i class="fas fa-calendar-alt me-2"></i> Apply for Leave</h4>
            </div>
            <div class="card-body p-4">
             
                <form action="{{ route('leave_requests.store') }}" method="POST">
                    @csrf
                    
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="mb-3 mb-md-0">
                                <label class="form-label" for="start_date">
                                    <i class="fas fa-calendar me-1 text-primary"></i> Start Date
                                </label>
                                <input type="date" id="start_date" name="start_date" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div>
                                <label class="form-label" for="end_date">
                                    <i class="fas fa-calendar-check me-1 text-primary"></i> End Date
                                </label>
                                <input type="date" id="end_date" name="end_date" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <label class="form-label" for="reason">
                            <i class="fas fa-comment-alt me-1 text-primary"></i> Reason for Leave
                        </label>
                        <textarea id="reason" name="reason" class="form-control" rows="4" required 
                            placeholder="Please provide details about your leave request..."></textarea>
                    </div>
                    
                    <div class="mb-4">
                        <label class="form-label" for="leave_type">
                            <i class="fas fa-tag me-1 text-primary"></i> Leave Type
                        </label>
                        <select id="leave_type" name="leave_type" class="form-select">
                            <option value="annual">Annual Leave</option>
                            <option value="sick">Sick Leave</option>
                            <option value="personal">Personal Leave</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="form-text text-muted">
                            <i class="fas fa-info-circle me-1"></i> Your request will be sent to your manager
                        </div>
                        <button type="submit" class="btn btn-primary px-4 py-2">
                            <i class="fas fa-paper-plane me-2"></i> Submit Request
                        </button>
                    </div>
                </form>
            </div>
            <div class="card-footer bg-white text-center py-3 border-top-0">
                <small class="text-muted">Need help? Contact HR at <a href="mailto:hr@company.com" class="text-decoration-none">hr@company.com</a></small>
            </div>
        </div>
    </div>

@endsection



