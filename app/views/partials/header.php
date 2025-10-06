<header class="bg-white shadow-sm border-b">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex justify-between h-16 items-center">
      <div class="flex items-center gap-4">
        <a href="<?= site_url() ?>" class="flex items-center gap-3 no-underline">
          <div class="bg-blue-600 text-white rounded-md p-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="currentColor"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
          </div>
          <div>
            <div class="text-lg font-bold text-gray-800">Student Manager</div>
            <div class="text-xs text-gray-500">Manage students & admin</div>
          </div>
        </a>
      </div>

      <nav class="hidden md:flex items-center gap-4">
        <a href="<?= site_url() ?>" class="text-sm text-gray-700 hover:text-blue-600">Students</a>
        <?php if (!empty($_SESSION['user']) && ($_SESSION['user']['role'] ?? '') === 'admin'): ?>
          <a href="<?= site_url('admin/users') ?>" class="text-sm text-gray-700 hover:text-blue-600">Admin</a>
        <?php endif; ?>
      </nav>

      <div class="flex items-center gap-3">
        <?php if (!empty($_SESSION['user'])): ?>
          <div class="hidden sm:flex items-center gap-3">
            <span class="text-sm text-gray-700">Hello, <?= html_escape($_SESSION['user']['username']) ?></span>
            <a href="<?= site_url('logout') ?>" class="text-sm bg-red-50 border border-red-200 text-red-700 px-3 py-1 rounded">Logout</a>
          </div>
          <div class="sm:hidden">
            <a href="<?= site_url('logout') ?>" class="text-sm bg-red-50 border border-red-200 text-red-700 px-3 py-1 rounded">Logout</a>
          </div>
        <?php else: ?>
          <a href="<?= site_url('login') ?>" class="text-sm bg-blue-600 text-white px-3 py-1 rounded">Login</a>
        <?php endif; ?>
      </div>
    </div>
  </div>
</header>
