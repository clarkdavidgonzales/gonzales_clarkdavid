<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign in</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gradient-to-br from-sky-50 to-white flex items-center justify-center">
  <div class="w-full max-w-lg mx-auto p-6">
    <div class="bg-white shadow-lg rounded-lg overflow-hidden grid grid-cols-1 md:grid-cols-2">

      <!-- Left: Branding / Illustration -->
      <div class="hidden md:flex items-center justify-center bg-blue-600 p-8">
        <div class="text-center text-white">
          <div class="mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-12 h-12 mx-auto opacity-95">
              <path fill="currentColor" d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
            </svg>
          </div>
          <h3 class="text-2xl font-bold">Student Manager</h3>
          <p class="text-sm mt-2 opacity-90">Secure admin area</p>
        </div>
      </div>

      <!-- Right: Form -->
      <div class="p-8">
        <h2 class="text-2xl font-semibold text-gray-800 mb-2">Welcome back</h2>
        <p class="text-sm text-gray-500 mb-6">Sign in to manage student records</p>

        <?php if (!empty($error ?? null)): ?>
          <div class="mb-4 rounded bg-red-50 border border-red-200 text-red-700 p-3"><?= html_escape($error) ?></div>
        <?php endif; ?>

        <form action="<?= site_url('login') ?>" method="POST" class="space-y-4">
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Username</label>
            <div class="relative">
              <input type="text" name="username" required class="w-full pl-10 pr-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="admin">
              <span class="absolute left-3 top-2.5 text-gray-400">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path d="M10 12a5 5 0 100-10 5 5 0 000 10zm-7 7a7 7 0 0114 0H3z"/></svg>
              </span>
            </div>
          </div>

          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
            <div class="relative">
              <input type="password" name="password" required class="w-full pl-10 pr-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="••••••••">
              <span class="absolute left-3 top-2.5 text-gray-400">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5 8a5 5 0 1110 0v1h1a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6a1 1 0 011-1h1V8zm2 1V8a3 3 0 116 0v1H7z" clip-rule="evenodd"/></svg>
              </span>
            </div>
          </div>

          <div class="flex items-center justify-between">
            <label class="inline-flex items-center text-sm">
              <input type="checkbox" name="remember" class="form-checkbox h-4 w-4 text-blue-600"> 
              <span class="ml-2 text-gray-600">Remember me</span>
            </label>
            <a href="#" class="text-sm text-blue-600 hover:underline">Need help?</a>
          </div>

          <div>
            <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-md font-semibold hover:bg-blue-700 transition">Sign in</button>
          </div>
        </form>

        <p class="text-center text-sm text-gray-500 mt-6">© <?= date('Y') ?> Student Manager</p>
      </div>
    </div>
  </div>
</body>
</html>
