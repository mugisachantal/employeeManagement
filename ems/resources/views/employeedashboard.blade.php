@extends('components.elayout')
@section('content')
<h2>Welcome {{$employee->name }}</h2>
<div class="text-center">
    <div class="profile-img-container">
        @if ($employee->profile_picture)
            <img src="{{ asset('storage/' . $employee->profile_picture) }}"
                 alt="Profile Picture"
                 class="img-fluid rounded-circle border border-primary shadow">
        @else
            <div class="no-profile-placeholder rounded-circle border border-primary shadow">
                No Profile Picture
            </div>
        @endif
    </div>
{{-- form for acknowlegemente --}}
@if ($request_available==1)


            <div class="card-container">
                <div id="acknowledgementCard" class="card shadow p-3 mb-5 bg-white rounded" style="width: 300px;">
                    <div class="card-body d-flex flex-column align-items-center">
                        <p class="leave-status-text">
                            Leave Request status: <span id="leaveStatus">{{ $request_status }}</span>
                        </p>
                        @if($AKrequired==1)
                        <form action="{{route('acknowledge')}}" method="POST">
                            @csrf
                        <input type="hidden" name="acknowledged" value="yes">
                        <button type="submit" id="acknowledgeButton" class="btn btn-primary">Acknowledge</button>
                        </form>
                      @endif
                    </div>
                </div>
            </div>
@endif
        </div>
        
  @if($confirm==1)
        <div class="confirmation-container">
            <h3 class="confirmation-title">Confirm Payement </h3>
            <p class="confirmation-message">Please confirm only if you indeed received the payement or reject if ypu didnt receive payement. Actions will be taken accordingly </p>
            <form action="{{route('payment.confirmed',$employee->id)}}" method="POST">
                @csrf
                <div class="form-group">
                    <label class="d-block font-weight-bold mb-2">Your Decision:</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="confirmation_status" id="confirmRadioInline" value="true" required>
                        <label class="form-check-label confirm-button" for="confirmRadioInline">Confirm</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="confirmation_status" id="rejectRadioInline" value="false" required>
                        <label class="form-check-label reject-button" for="rejectRadioInline">Reject</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit Decision</button>
            </form>
        </div>
    @endif
        @endsection
   