<!-- resources/views/upload_announcement.blade.php -->




    @extends('components.layout')
@section('content')
    <div class="container mt-5">
        @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

        <h2>Upload Announcement</h2>
        <form action="{{ route('admin.announcements.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="announcement_title" class="form-label">Announcement Title</label>
                <input type="text" name="announcement_title" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="announcement_file" class="form-label">Upload PDF</label>
                <input type="file" name="announcement_file" class="form-control" accept="application/pdf" required>
            </div>
            <button type="submit" class="btn btn-primary">Upload Announcement</button>
        </form>
    </div>
@endsection