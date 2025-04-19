<!-- resources/views/upload_company_policy.blade.php -->


@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif


<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Company Policy</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Upload Company Policy</h2>
        <form action="{{ route('admin.company-policies.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="policy_title" class="form-label">Policy Title</label>
                <input type="text" name="policy_title" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="policy_file" class="form-label">Upload PDF</label>
                <input type="file" name="policy_file" class="form-control" accept="application/pdf" required>
            </div>
            <button type="submit" class="btn btn-primary">Upload Policy</button>
        </form>
    </div>
</body>
</html>