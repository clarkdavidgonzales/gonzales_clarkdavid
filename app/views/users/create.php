<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Enroll Student</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    body { font-family: 'Inter', sans-serif; background: #f3f4f6; }
  </style>
</head>
<body class="min-h-screen">

  <?php $title = 'Add Student'; include __DIR__ . '/../partials/header.php'; ?>

  <main class="max-w-3xl mx-auto mt-10 px-4">
    <div class="bg-white rounded-lg shadow p-6 border">
      <div class="flex items-center gap-4 mb-6">
  <div class="bg-red-600 text-white rounded-full p-3">
          <i class="fa-solid fa-user-graduate"></i>
        </div>
        <div>
          <h1 class="text-xl font-semibold">Add New Student Record</h1>
          <p class="text-sm text-red-500">Create a new student entry</p>
        </div>
      </div>

      <form action="<?=site_url('users/create')?>" method="POST" class="space-y-4">
        <div>
          <label class="block text-sm font-medium text-red-700">First Name</label>
          <input type="text" name="fname" required placeholder="Enter first name" class="mt-1 block w-full rounded-md border-red-300 shadow-sm focus:ring-red-500 focus:border-red-500">
        </div>

        <div>
          <label class="block text-sm font-medium text-red-700">Last Name</label>
          <input type="text" name="lname" required placeholder="Enter last name" class="mt-1 block w-full rounded-md border-red-300 shadow-sm focus:ring-red-500 focus:border-red-500">
        </div>

        <div>
          <label class="block text-sm font-medium text-red-700">Email</label>
          <input type="email" name="email" required placeholder="Enter email address" class="mt-1 block w-full rounded-md border-red-300 shadow-sm focus:ring-red-500 focus:border-red-500">
        </div>

        <div>
          <button type="submit" class="w-full bg-red-600 text-white py-2 rounded-md font-semibold hover:bg-red-700 transition">
            <i class="fa-solid fa-user-plus mr-2"></i> Add Student Record
          </button>
        </div>
      </form>
    </div>
  </main>
</body>
</html>
