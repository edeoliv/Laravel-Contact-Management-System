<button type="button"
    class="flex mx-3 text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
    id="user-menu-button" aria-expanded="false" data-dropdown-toggle="dropdown">
    <span class="sr-only">Open user menu</span>
    <img class="w-8 h-8 rounded-full"
        src="https://ui-avatars.com/api/?size=128&bold=true&name={{ Auth::user()->name }}&background=89CFF0"
        alt="user photo" />
</button>

<!-- Dropdown menu -->
<div class="hidden z-50 my-4 w-56 text-base list-none bg-white divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600 rounded-xl"
    id="dropdown">
    <div class="py-3 px-4">
        <span class="block text-sm font-semibold text-gray-900 dark:text-white">{{ Auth::user()->name }}</span>
        <span class="block text-sm text-gray-900 truncate dark:text-white">{{ Auth::user()->email }}</span>
    </div>
    <ul class="py-1 text-gray-700 dark:text-gray-300" aria-labelledby="dropdown">
        <li>
            <a href="#"
                class="block py-2 px-4 text-sm hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-400 dark:hover:text-white">My
                profile</a>
        </li>
        <li>
            <a href="#"
                class="block py-2 px-4 text-sm hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-400 dark:hover:text-white">Account
                settings</a>
        </li>
    </ul>
</div>
</div>
