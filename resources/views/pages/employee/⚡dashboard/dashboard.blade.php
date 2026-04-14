<div class="p-6">
    <div class="max-w-4xl mx-auto bg-white border border-gray-200 rounded-xl shadow-sm p-8 dark:bg-neutral-800 dark:border-neutral-700">
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-800 dark:text-white">
                Employee Dashboard
            </h1>
            <p class="text-gray-600 dark:text-neutral-400 mt-2">
                Logged in as: <span class="font-semibold text-blue-600">{{ auth()->user()->name }}</span>
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="p-5 bg-gray-50 rounded-lg border border-gray-200 dark:bg-neutral-900 dark:border-neutral-700">
                <h3 class="text-sm font-semibold text-gray-500 uppercase mb-3">Account Information</h3>
                <ul class="space-y-2 text-sm">
                    <li class="text-gray-800 dark:text-neutral-200"><strong>Email:</strong> {{ auth()->user()->email }}</li>
                    <li class="text-gray-800 dark:text-neutral-200"><strong>Role:</strong> Employee</li>
                </ul>
            </div>

            <div class="p-5 bg-blue-50 rounded-lg border border-blue-100 dark:bg-blue-900/20 dark:border-blue-900/50">
                <h3 class="text-sm font-semibold text-blue-800 dark:text-blue-400 uppercase mb-3">Permissions</h3>
                <p class="text-xs text-blue-700 dark:text-blue-500 leading-relaxed">
                    You have "View Only" access to this dashboard. User management and shop settings are restricted to Owners and Admins.
                </p>
            </div>
        </div>
    </div>
</div>