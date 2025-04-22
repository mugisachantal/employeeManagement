<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>leave request handling</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <style>
         .confirmation-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        .confirmation-options label {
            margin-right: 20px;
            font-weight: bold;
            color: #333;
        }
        .confirm-button {
            color: #28a745; /* Green for confirm */
        }
        .reject-button {
            color: #dc3545; /* Red for reject */
        }
        .confirmation-title {
            color: #007bff; /* Blue for title */
            margin-bottom: 15px;
        }
        .confirmation-message {
            color: #555;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <h3 class="confirmation-title"> Handle {{$employee->name}} Leave Request </h3>
    <p class="confirmation-message">{{$leaverequest->reason}}</p>
    <form action="{{route('leave.request.handling',$leaverequest->id)}}" method="POST">
        @csrf
        <div class="form-group">
            <label class="d-block font-weight-bold mb-2">Decide:</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="confirmation_status" id="confirmRadioInline" value="approved" required>
                <label class="form-check-label confirm-button" for="confirmRadioInline">Grant Leave</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="confirmation_status" id="rejectRadioInline" value="rejected" required>
                <label class="form-check-label reject-button" for="rejectRadioInline">Deny Leave</label>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit FeedBack</button>
    </form>
</div>
</body>
</html>