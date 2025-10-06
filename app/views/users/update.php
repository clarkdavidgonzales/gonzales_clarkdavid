<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Student</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>body{font-family:'Inter',sans-serif;background:#f3f4f6}</style>
</head>
<body class="min-h-screen">

  <?php $title = 'Update Student'; include __DIR__ . '/../partials/header.php'; ?>

  <main class="max-w-3xl mx-auto mt-10 px-4">
    <div class="bg-white rounded-lg shadow p-6 border">
      <div class="flex items-center gap-4 mb-6">
        <div class="bg-gradient-to-r from-blue-600 to-indigo-700 text-white rounded-full p-3">
          <i class="fa-solid fa-user-pen"></i>
        </div>
        <div>
          <h1 class="text-xl font-semibold">Update Student Info</h1>
          <p class="text-sm text-gray-500">Keep the student profile up to date</p>
        </div>
      </div>

      <form action="<?=site_url('users/update/'.$user['id'])?>" method="POST" class="space-y-4">
        <div>
          <label class="block text-sm font-medium text-gray-700">First Name</label>
          <input type="text" name="fname" value="<?= html_escape($user['fname'])?>" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
        </div>

        <div>
          <label class="block text-sm font-medium text-gray-700">Last Name</label>
          <input type="text" name="lname" value="<?= html_escape($user['lname'])?>" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
        </div>

        <div>
          <label class="block text-sm font-medium text-gray-700">Email</label>
          <input type="email" name="email" value="<?= html_escape($user['email'])?>" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
        </div>

        <div>
          <button type="submit" class="w-full bg-gradient-to-r from-blue-600 to-indigo-700 text-white py-2 rounded-md font-semibold hover:opacity-95 transition">
            <i class="fa-solid fa-save mr-2"></i> Save Changes
          </button>
        </div>
      </form>
    </div>
  </main>
</body>
</html>
