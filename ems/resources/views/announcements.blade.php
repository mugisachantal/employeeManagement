<!-- resources/views/announcements.blade.php -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Announcements</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Announcements</h2>

        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col" class="text-end">Download</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($announcements as $announcement)
                    <tr>
                        <td>{{ $announcement->title }}</td>
                        <td class="text-end">
                            <!--
                            <a href="{{ asset('storage/' . $announcement->file_path) }}"
                               class="btn btn-sm btn-primary"
                               target="_blank"
                               download>
                                Download
                            </a>
                            -->
                            <a href="{{ route('announcements.download', $announcement->id) }}" class="btn btn-sm btn-success">
                             Download PDF
                             </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2" class="text-center">No announcements available.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>
