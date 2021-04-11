<div class="fixed top-0 left-0 z-50 w-full">
  <nav x-data="{ open: false }" class="bg-white shadow">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex justify-between h-16">
        <!-- Logo -->
        <div class="flex-shrink-0 flex items-center">
          <a href="{{ route('/') }}">
            <x-jet-application-mark class="block h-10 w-auto" />
          </a>
        </div>

        <div class="flex">
          <!-- Navigation Links -->
          <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
            <x-jet-nav-link href="{{ route('g.lessons') }}" :active="request()->routeIs('g.lessons')">
              {{ __('Дисциплины') }}
            </x-jet-nav-link>
          </div>

          <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
            <x-jet-nav-link href="{{ route('login') }}" :active="request()->routeIs('login')">
              {{ __('Войти') }}
            </x-jet-nav-link>
          </div>

          <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
            <x-jet-nav-link href="{{ route('register') }}" :active="request()->routeIs('register')">
              {{ __('Регистация') }}
            </x-jet-nav-link>
          </div>
        </div>
        <!-- Hamburger -->
        <div class="-mr-2 flex items-center sm:hidden">
          <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
              <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
              <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
      </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
      <div class="pt-2 pb-3 space-y-1">
        <x-jet-responsive-nav-link href="{{ route('g.lessons') }}" :active="request()->routeIs('g.lessons')">
          {{ __('Дисциплины') }}
        </x-jet-responsive-nav-link>

        <x-jet-responsive-nav-link href="{{ route('login') }}" :active="request()->routeIs('login')">
          {{ __('Войти') }}
        </x-jet-responsive-nav-link>

        <x-jet-responsive-nav-link href="{{ route('register') }}" :active="request()->routeIs('register')">
          {{ __('Регистация') }}
        </x-jet-responsive-nav-link>
      </div>
    </div>
  </nav>
</div>

