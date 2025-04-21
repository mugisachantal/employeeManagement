<!DOCTYPE html>
<html>
<head>
    <title>Applications</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4">Submitted Applications</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Contact</th>
                <th>Vacancy</th>
                <th>CV</th>
            </tr>
        </thead>
        <tbody>
            @forelse($applications as $app)
                <tr>
                    <td>{{ $app->name }}</td>
                    <td>{{ $app->email }}</td>
                    <td>{{ $app->contact }}</td>
                    <td>{{ $app->vacancy->job_name ?? 'N/A' }}</td>
                    <td>
                        @if($app->cv)
                            <!--<a href="{{ asset('storage/' . $app->cv) }}" download class="btn btn-sm btn-primary">Download CV</a> -->
                            <a href="{{ route('cv.download', basename($app->cv)) }}" class="btn btn-sm btn-primary">Download CV</a>
                            <form action="{{ route('application.delete', $app->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                             <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Delete this CV?')">Delete</button>
                             </form>
                        @else
                            <span class="text-muted">No file</span>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">No applications found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
</body>
</html>
