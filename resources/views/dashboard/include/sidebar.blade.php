<!-- Sidebar -->
<aside
    class="fixed top-0 left-0 z-40 w-64 h-screen pt-14 transition-transform -translate-x-full bg-white border-r border-gray-200 md:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
    aria-label="Sidenav" id="drawer-navigation">
    <div class="overflow-y-auto py-5 px-3 h-full bg-white dark:bg-gray-800">
        @include('dashboard.include.partials.sidebar.search')
        <ul class="space-y-2">
            <li>
                @include('dashboard.include.partials.sidebar.overview')
            </li>
            <li>
                @include('dashboard.include.partials.sidebar.pages')
            </li>
            <li>
                @include('dashboard.include.partials.sidebar.sales')
            </li>
            <li>
                @include('dashboard.include.partials.sidebar.messages')
            </li>
            <li>
                @include('dashboard.include.partials.sidebar.authentication')
            </li>
        </ul>
    </div>
</aside>
