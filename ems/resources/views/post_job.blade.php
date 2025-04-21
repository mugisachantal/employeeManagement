
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Post a Job</title>
  
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center px-4">

  <div class="max-w-md w-full bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-center text-2xl font-bold text-gray-800 mb-6">Post a Job</h2>

    <form action="{{ route('job.store') }}" method="POST" class="space-y-5">
      @csrf

      <div>
        <label for="name" class="block text-sm font-medium text-gray-900">Name of Job</label>
        <div class="mt-2">
          <input type="text" name="name" id="name" required placeholder="e.g. Software Engineer"
                 class="block w-full rounded-md bg-white px-3 py-2 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:outline-indigo-600 sm:text-sm">
        </div>
      </div>

      <div>
        <label for="experience" class="block text-sm font-medium text-gray-900">Experience Needed</label>
        <div class="mt-2">
          <input type="text" name="experience" id="experience" required placeholder="e.g. 2+ years"
                 class="block w-full rounded-md bg-white px-3 py-2 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:outline-indigo-600 sm:text-sm">
        </div>
      </div>

      <div>
        <label for="education" class="block text-sm font-medium text-gray-900">Education</label>
        <div class="mt-2">
          <input type="text" name="education" id="education" required placeholder="e.g. BSc in Computer Science"
                 class="block w-full rounded-md bg-white px-3 py-2 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:outline-indigo-600 sm:text-sm">
        </div>
      </div>

      <div>
        <button type="submit"
                class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus:outline-none focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
          Submit
        </button>
      </div>

      @if(session('success'))
        <div class="mt-4 text-center text-green-700 bg-green-100 p-2 rounded">
          {{ session('success') }}
        </div>
      @endif
    </form>
  </div>

</body>
</html>

