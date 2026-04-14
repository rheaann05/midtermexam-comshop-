<div>
    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        
        @if (session()->has('error'))
            <div class="mb-4 bg-red-100 border border-red-200 text-sm text-red-800 rounded-lg p-4 dark:bg-red-800/10 dark:border-red-900 dark:text-red-500">
                {{ session('error') }}
            </div>
        @endif

        @if (session()->has('success'))
            <div class="mb-4 bg-green-100 border border-green-200 text-sm text-green-800 rounded-lg p-4 dark:bg-green-800/10 dark:border-green-900 dark:text-green-500">
                {{ session('success') }}
            </div>
        @endif

        <div class="flex flex-col">
            <div class="-m-1.5 overflow-x-auto">
                <div class="p-1.5 min-w-full inline-block align-middle">
                    <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden dark:bg-neutral-800 dark:border-neutral-700">
                        
                        <div class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200 dark:border-neutral-700">
                            <div>
                                <h2 class="text-xl font-semibold text-gray-800 dark:text-neutral-200">
                                    Users
                                </h2>
                                <p class="text-sm text-gray-600 dark:text-neutral-400">
                                    Manage and view all users
                                </p>
                            </div>

                            <div>
                                <div class="inline-flex gap-x-2">
                                    <a class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none disabled:opacity-50 disabled:pointer-events-none"
                                        href="{{ route('admin.users.create') }}">
                                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M5 12h14" />
                                            <path d="M12 5v14" />
                                        </svg>
                                        Add User
                                    </a>
                                </div>
                            </div>
                        </div>

                        <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
                            <thead class="bg-gray-50 dark:bg-neutral-800">
                                <tr>
                                    <th scope="col" class="ps-6 py-3 text-left text-sm font-semibold text-gray-800 dark:text-neutral-200">Name</th>
                                    <th scope="col" class="px-6 py-3 text-left text-sm font-semibold text-gray-800 dark:text-neutral-200">Email</th>
                                    <th scope="col" class="px-6 py-3 text-left text-sm font-semibold text-gray-800 dark:text-neutral-200">Roles</th>
                                    <th scope="col" class="px-6 py-3 text-left text-sm font-semibold text-gray-800 dark:text-neutral-200">Created</th>
                                    <th scope="col" class="px-6 py-3 text-end text-sm font-semibold text-gray-800 dark:text-neutral-200">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                                @forelse($this->users as $user)
                                    <tr wire:key="user-row-{{ $user->id }}">
                                        <td class="ps-6 py-3 whitespace-nowrap">
                                            <span class="text-sm font-semibold text-gray-800 dark:text-neutral-200">
                                                {{ $user->name }}
                                                @if(auth()->id() === $user->id)
                                                    <span class="ml-2 text-xs font-normal text-blue-500">(You)</span>
                                                @endif
                                            </span>
                                        </td>
                                        <td class="px-6 py-3 whitespace-nowrap">
                                            <span class="text-sm text-gray-500 dark:text-neutral-400">
                                                {{ $user->email }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-3 whitespace-nowrap">
                                            <span class="text-sm text-gray-500 dark:text-neutral-400">
                                                {{ Str::title(str_replace('_', ' ', $user->roles->pluck('name')->join(', '))) ?: 'No role assigned' }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-3 whitespace-nowrap">
                                            <span class="text-sm text-gray-500 dark:text-neutral-400">
                                                {{ $user->created_at->diffForHumans() }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-3 whitespace-nowrap text-end text-sm font-medium">
                                            <div class="inline-flex items-center gap-x-1">
                                                
                                                @can('manage', $user)
                                                    <a href="{{ route('admin.users.edit', $user->id) }}"
                                                       class="py-1.5 px-2 inline-flex items-center gap-x-1 text-xs font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-700">
                                                        <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                            <path d="M17 3a2.85 2.83 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z"/>
                                                            <path d="m15 5 4 4"/>
                                                        </svg>
                                                        Edit
                                                    </a>

                                                    @if(auth()->id() !== $user->id)
                                                        <button type="button" 
                                                            wire:click="delete({{ $user->id }})"
                                                            wire:confirm="Are you sure you want to delete this user?"
                                                            class="py-1.5 px-2 inline-flex items-center gap-x-1 text-xs font-medium rounded-lg border border-transparent bg-red-100 text-red-800 hover:bg-red-200 focus:outline-none dark:bg-red-500/10 dark:text-red-500 dark:hover:bg-red-500/20">
                                                            <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                                <path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/><line x1="10" x2="10" y1="11" y2="17"/><line x1="14" x2="14" y1="11" y2="17"/>
                                                            </svg>
                                                            Delete
                                                        </button>
                                                    @endif
                                                @else
                                                    <span class="text-xs text-gray-400 dark:text-neutral-500 italic">No access</span>
                                                @endcan

                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center py-10 text-gray-500 dark:text-neutral-500">
                                            No users found.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        
                        <div class="px-6 py-4 flex justify-between items-center border-t border-gray-200 dark:border-neutral-700">
                            <p class="text-sm text-gray-600 dark:text-neutral-400">
                                <span class="font-semibold text-gray-800 dark:text-neutral-200">{{ $this->users->count() }}</span> results
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>