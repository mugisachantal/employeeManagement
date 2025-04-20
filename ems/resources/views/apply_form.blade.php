
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Job Application</title>
 
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen flex items-center justify-center px-4">

  <div class="max-w-md w-full space-y-8 bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-center text-2xl font-bold text-gray-900">Submit Your Application</h2>

    <form action="{{ route('apply.submit', ['vacancy' => $vacancyId]) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
      @csrf

      <div>
        <label for="name" class="block text-sm font-medium text-gray-900">Name:</label>
        <div class="mt-2">
          <input type="text" name="name" id="name" placeholder="Enter your full name" required
                 class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm">
        </div>
      </div>

      <div>
        <label for="email" class="block text-sm font-medium text-gray-900">Email:</label>
        <div class="mt-2">
          <input type="email" name="email" id="email" placeholder="Enter your email address" required
                 class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm">
        </div>
      </div>

      <div>
        <label for="contact" class="block text-sm font-medium text-gray-900">Contact Number:</label>
        <div class="mt-2">
          <input type="text" name="contact" id="contact" placeholder="Enter your contact number" required
                 class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm">
        </div>
      </div>

      <div>
        <label for="cv" class="block text-sm font-medium text-gray-900">Upload CV (PDF):</label>
        <div class="mt-2">
          <input type="file" name="cv" id="cv" accept="application/pdf" required
                 class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm">
          <small class="text-gray-500">Please upload your CV in PDF(max 10MB).</small>
        </div>
      </div>

      <div>
        <button type="submit"
                class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
          Submit Application
        </button>
      </div>
    </form>

    @if(session('success'))
      <div class="mt-3 text-center text-green-700 bg-green-100 p-2 rounded">
        {{ session('success') }}
      </div>
    @endif

    @if($errors->any())
      <div class="mt-3 bg-red-100 p-3 rounded">
        <ul class="mb-0 list-disc pl-5 text-sm text-red-700">
          @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    
  </div>

</body>
</html>
