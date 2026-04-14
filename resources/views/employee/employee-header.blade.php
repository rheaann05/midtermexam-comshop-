<header class="flex flex-wrap md:justify-start md:flex-nowrap z-50 w-full bg-white border-b border-gray-200">
  <nav class="relative max-w-[85rem] w-full mx-auto md:flex md:items-center md:justify-between md:gap-3 py-3 px-4 sm:px-6 lg:px-8">
    <div class="flex justify-between items-center gap-x-1">
      <a class="flex-none font-semibold text-xl text-gray-900 focus:outline-none focus:opacity-80"
         href="{{ Auth::check() ? route('owner.dashboard') : route('home') }}" aria-label="Brand">
        Employee Panel
      </a>

      <button type="button" class="hs-collapse-toggle md:hidden relative size-9 flex justify-center items-center font-medium text-sm rounded-lg bg-gray-50 border border-gray-200 text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100" id="hs-header-base-collapse" data-hs-collapse="#hs-header-base">
        <svg class="hs-collapse-open:hidden size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="3" x2="21" y1="6" y2="6"/><line x1="3" x2="21" y1="12" y2="12"/><line x1="3" x2="21" y1="18" y2="18"/></svg>
        <svg class="hs-collapse-open:block shrink-0 hidden size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
        <span class="sr-only">Toggle navigation</span>
      </button>
    </div>

    <div id="hs-header-base" class="hs-collapse hidden overflow-hidden transition-all duration-300 basis-full grow md:block">
      <div class="overflow-hidden overflow-y-auto max-h-[75vh]">
        <div class="py-2 md:py-0 flex flex-col md:flex-row md:items-center gap-0.5 md:gap-1">

          @auth
          <div class="grow">
            <div class="flex flex-col md:flex-row md:justify-end md:items-center gap-0.5 md:gap-1">
              <a class="p-2 flex items-center text-sm {{ request()->routeIs('owner.dashboard') ? 'bg-gray-100 text-gray-900 font-medium' : 'text-gray-600' }} hover:bg-gray-100 rounded-lg" href="{{ route('owner.dashboard') }}">
                Dashboard
              </a>
              <a class="p-2 flex items-center text-sm {{ request()->routeIs('owner.employees.*') ? 'bg-gray-100 text-gray-900 font-medium' : 'text-gray-600' }} hover:bg-gray-100 rounded-lg" href="{{ route('owner.employees.view') }}">
                Manage Employees
              </a>
            </div>
          </div>

          <div class="my-2 md:my-0 md:mx-2">
            <div class="w-full h-px md:h-4 md:border-s border-gray-300"></div>
          </div>

          <div class="flex flex-wrap items-center gap-x-3">
            <span class="text-sm font-medium text-gray-600 py-2">
              Welcome, {{ Auth::user()->name }}
            </span>

                <livewire:auth::logout />
          </div>
          @endauth

          @guest
          <div class="grow flex justify-end">
             <a class="py-2 px-3 inline-flex items-center font-medium text-sm rounded-lg bg-blue-600 text-white" href="{{ route('login') }}">Log In</a>
          </div>
          @endguest

        </div>
      </div>
    </div>
  </nav>
</header>
