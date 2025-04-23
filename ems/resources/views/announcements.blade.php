
@extends('components.elayout')
@section('content')
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
@endsection