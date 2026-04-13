<div class="p-4 sm:p-6 space-y-4 sm:space-y-6">
    <div class="flex justify-end">
        <a href="{{ route('owner.employees.create') }}" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 transition">
            <svg class="size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><line x1="19" x2="19" y1="8" y2="14"/><line x1="16" x2="22" y1="11" y2="11"/></svg>
            New Employee
        </a>
    </div>

    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
        <div class="flex flex-col bg-neutral-900 border border-neutral-800 shadow-sm rounded-xl p-4 md:p-5">
            <div class="flex items-center gap-x-4">
                <div class="size-[46px] bg-neutral-800 rounded-lg flex justify-center items-center text-white border border-neutral-700">
                    <svg class="size-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/></svg>
                </div>
                <div>
                    <p class="text-xs uppercase tracking-wide text-neutral-400">Total Employees</p>
                    <h3 class="text-2xl font-semibold text-white">{{ $stats['total_employees'] }}</h3>
                </div>
            </div>
        </div>

        <div class="flex flex-col bg-white border border-gray-200 shadow-sm rounded-xl p-4 md:p-5 dark:bg-neutral-900 dark:border-neutral-800">
            <div class="flex items-center gap-x-4">
                <div class="size-[46px] bg-gray-100 rounded-lg flex justify-center items-center text-gray-600 dark:bg-neutral-800 dark:text-neutral-400">
                    <svg class="size-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="14" x="2" y="5" rx="2"/><line x1="2" x2="22" y1="10" y2="10"/></svg>
                </div>
                <div>
                    <p class="text-xs uppercase tracking-wide text-gray-500">Shop Status</p>
                    <h3 class="text-2xl font-semibold text-gray-800 dark:text-neutral-200">Open</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="flex flex-col">
        <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden dark:bg-neutral-900 dark:border-neutral-800">
            <div class="px-6 py-4 border-b border-gray-200 dark:border-neutral-700 flex justify-between items-center">
                <h2 class="text-lg font-semibold text-gray-800 dark:text-neutral-200">Recently Hired</h2>
                <a href="{{ route('owner.employees.view') }}" class="text-sm font-medium text-blue-600 hover:text-blue-700 transition">Manage all</a>
            </div>

            <!-- Responsive table wrapper: allows horizontal scroll on small screens -->
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
                    <thead class="bg-gray-50 dark:bg-neutral-800">
                        <tr>
                            <th class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Employee Name</th>
                            <th class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Email</th>
                            <th class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Hired Date</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                        @forelse(\App\Models\User::role('employee')->latest()->take(3)->get() as $employee)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">{{ $employee->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-neutral-400">{{ $employee->email }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-neutral-400">{{ $employee->created_at->format('M d, Y') }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="px-6 py-4 text-center text-sm text-gray-500">No employees registered yet.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>