<div class="max-w-2xl w-full px-4 py-10 sm:px-6 lg:px-8 mx-auto">
    <div class="bg-white border border-gray-200 rounded-xl shadow-sm dark:bg-neutral-900 dark:border-neutral-700">
        <div class="p-4 sm:p-7">
            <div class="text-center mb-8">
                <h2 class="block text-2xl font-bold text-gray-800 dark:text-white">
                    {{ isset($user) ? 'Edit Employee' : 'Add New Employee' }}
                </h2>
            </div>

            <form wire:submit="{{ isset($user) ? 'update' : 'save' }}">
                <div class="grid gap-y-4">
                    <div>
                        <label for="name" class="block text-sm mb-2 text-gray-800 dark:text-white font-medium">Full Name</label>
                        <input type="text" wire:model="name" id="name" 
                            class="py-3 px-4 block w-full bg-white text-gray-900 border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 border placeholder-gray-400" 
                            placeholder="John Doe">
                        @error('name') <p class="text-xs text-red-600 mt-2">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="email" class="block text-sm mb-2 text-gray-800 dark:text-white font-medium">Email address</label>
                        <input type="email" wire:model="email" id="email" 
                            class="py-3 px-4 block w-full bg-white text-gray-900 border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 border placeholder-gray-400" 
                            placeholder="example@company.com">
                        @error('email') <p class="text-xs text-red-600 mt-2">{{ $message }}</p> @enderror
                    </div>

                    @if(!isset($user))
                    <div>
                        <label for="password" class="block text-sm mb-2 text-gray-800 dark:text-white font-medium">Password</label>
                        <input type="password" wire:model="password" id="password" 
                            class="py-3 px-4 block w-full bg-white text-gray-900 border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 border placeholder-gray-400" 
                            placeholder="••••••••">
                        @error('password') <p class="text-xs text-red-600 mt-2">{{ $message }}</p> @enderror
                    </div>
                    @endif

                    <div class="mt-4 flex flex-col sm:flex-row items-center justify-end gap-2">
                        <a href="{{ route('owner.employees.view') }}" 
                            class="w-full sm:w-auto py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 transition-colors">
                            <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"/></svg>
                            Back
                        </a>
                        
                        <button type="submit" 
                            class="w-full sm:w-auto py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none transition-colors">
                            {{ isset($user) ? 'Update Employee' : 'Create Employee' }}
                            <div wire:loading class="animate-spin inline-block size-3 border-[3px] border-current border-t-transparent text-white rounded-full" role="status" aria-label="loading">
                                <span class="sr-only">Loading...</span>
                            </div>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>