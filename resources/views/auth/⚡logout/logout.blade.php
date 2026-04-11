
<div>
    <button
    wire:click="logout"
    class="flex items-center gap-x-2 py-2 px-4
           rounded-md text-sm font-medium
           text-white bg-gradient-to-r from-red-500 to-red-600
           hover:from-red-600 hover:to-red-700
           focus:outline-none focus:ring-2 focus:ring-red-400
           shadow-md transition ease-in-out duration-200"
>
    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
         fill="none" stroke="currentColor" stroke-width="2"
         stroke-linecap="round" stroke-linejoin="round">
        <path d="m16 17 5-5-5-5"/>
        <path d="M21 12H9"/>
        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/>
    </svg>
    <span>Log out</span>
</button>
</div>