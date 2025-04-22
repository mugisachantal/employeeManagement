<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    
</head>
<body>
    <!-- resources/views/leave_requests/create.blade.php -->

<div class="max-w-xl mx-auto mt-10 bg-white shadow p-6 rounded">
    <h2 class="text-2xl font-bold mb-4">Apply for Leave</h2>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('leave_requests.create') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label class="block font-semibold">Start Date</label>
            <input type="date" name="start_date" class="w-full border px-3 py-2 rounded" required>
        </div>

        <div class="mb-4">
            <label class="block font-semibold">End Date</label>
            <input type="date" name="end_date" class="w-full border px-3 py-2 rounded" required>
        </div>

        <div class="mb-4">
            <label class="block font-semibold">Reason</label>
            <textarea name="reason" class="w-full border px-3 py-2 rounded" rows="4" required></textarea>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Submit Request</button>
    </form>
</div>



</body>
</html>