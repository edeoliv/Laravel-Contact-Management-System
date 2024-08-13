<!-- Navbar -->
<nav class="bg-white border-b border-gray-200 px-4 py-2.5 dark:bg-gray-800 dark:border-gray-700 fixed left-0 right-0 top-0 z-50">
    <div class="flex flex-wrap justify-between items-center">
        <div class="flex justify-start items-center">
            @include('dashboard.include.partials.navbar.sidebar-toggle')
            @include('dashboard.include.partials.navbar.logo')
            @include('dashboard.include.partials.navbar.search')
        </div>
        <div class="flex items-center lg:order-2">
            @include('dashboard.include.partials.navbar.search-toggle')
            @include('dashboard.include.partials.navbar.apps')
            @include('dashboard.include.partials.navbar.menu')
    </div>
</nav>