<!-- postjob.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Post Job</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Upload Job Advert (PDF)</h2>

    <!-- Display success message -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Job upload form -->
    <form method="POST" action="{{ route('job.upload') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Job Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="job_pdf" class="form-label">Select PDF File</label>
            <input type="file" name="job_pdf" accept="application/pdf" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Post Job</button>
    </form>
</div>
</body>
</html>
