@extends('components.layout')
@section('content')
<div class="container mt-5">
    @if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
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
@endsection