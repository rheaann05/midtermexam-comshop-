<div class="min-h-screen flex items-center justify-center p-4 bg-layer-background">
    <div class="w-full max-w-md bg-card border border-card-line rounded-2xl shadow-xl overflow-hidden">
        <div class="p-6 sm:p-8">
            <div class="text-center mb-8">
                <h1 class="text-2xl font-bold tracking-tight text-foreground sm:text-3xl">Welcome back</h1>
                <p class="mt-2 text-sm text-muted-foreground-2">
                    Don't have an account?
                    <a class="text-primary font-semibold hover:underline decoration-2 underline-offset-4 transition-all" href="#">
                        Create an account
                    </a>
                </p>
            </div>

            <div class="space-y-6">
                <button type="button" class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-3 text-sm font-semibold rounded-xl bg-layer border border-layer-line text-layer-foreground shadow-sm hover:bg-layer-hover transition-all focus:outline-none focus:ring-2 focus:ring-primary/20">
                    <svg class="w-5 h-auto" width="46" height="47" viewBox="0 0 46 47" fill="none">
                        <path d="M46 24.0287C46 22.09 45.8533 20.68 45.5013 19.2112H23.4694V27.9356H36.4069C36.1429 30.1094 34.7347 33.37 31.5957 35.5731L31.5663 35.8669L38.5191 41.2719L38.9885 41.3306C43.4477 37.2181 46 31.1669 46 24.0287Z" fill="#4285F4"/>
                        <path d="M23.4694 47C29.8061 47 35.1161 44.9144 39.0179 41.3012L31.625 35.5437C29.6301 36.9244 26.9898 37.8937 23.4987 37.8937C17.2793 37.8937 12.0281 33.7812 10.1505 28.1412L9.88649 28.1706L2.61097 33.7812L2.52296 34.0456C6.36608 41.7125 14.287 47 23.4694 47Z" fill="#34A853"/>
                        <path d="M10.1212 28.1413C9.62245 26.6725 9.32908 25.1156 9.32908 23.5C9.32908 21.8844 9.62245 20.3275 10.0918 18.8588V18.5356L2.75765 12.8369L2.52296 12.9544C0.909439 16.1269 0 19.7106 0 23.5C0 27.2894 0.909439 30.8731 2.49362 34.0456L10.1212 28.1413Z" fill="#FBBC05"/>
                        <path d="M23.4694 9.07688C27.8699 9.07688 30.8622 10.9863 32.5344 12.5725L39.1645 6.11C35.0867 2.32063 29.8061 0 23.4694 0C14.287 0 6.36607 5.2875 2.49362 12.9544L10.0918 18.8588C11.9987 13.1894 17.25 9.07688 23.4694 9.07688Z" fill="#EB4335"/>
                    </svg>
                    Continue with Google
                </button>

                <div class="relative">
                    <div class="absolute inset-0 flex items-center" aria-hidden="true">
                    </div>
                    <div class="relative flex justify-center text-xs uppercase">
                        <span class="bg-card px-3 text-muted-foreground font-medium">Or continue with email</span>
                    </div>
                </div>

                <form wire:submit="login" class="space-y-5">
                    <div>
                        <label for="email" class="block text-sm font-medium text-foreground mb-1.5">Email address</label>
                        <input 
                            wire:model="email" 
                            type="email" 
                            id="email" 
                            placeholder="name@company.com" 
                            class="py-3 px-4 block w-full bg-layer border @error('email') border-red-500 @else border-layer-line @enderror rounded-xl text-sm text-foreground placeholder:text-muted-foreground-1 focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all outline-none"
                        >
                        @error('email') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <div class="flex justify-between items-center mb-1.5">
                            <label for="password" class="block text-sm font-medium text-foreground">Password</label>
                            <a class="text-xs font-semibold text-primary hover:underline underline-offset-4" href="#">Forgot password?</a>
                        </div>
                        <input 
                            wire:model="password" 
                            type="password" 
                            id="password" 
                            placeholder="••••••••" 
                            class="py-3 px-4 block w-full bg-layer border @error('password') border-red-500 @else border-layer-line @enderror rounded-xl text-sm text-foreground placeholder:text-muted-foreground-1 focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all outline-none"
                        >
                        @error('password') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                    </div>

                    <div class="flex items-center">
                        <input 
                            wire:model="remember" 
                            id="remember-me" 
                            type="checkbox" 
                            class="h-4 w-4 shrink-0 cursor-pointer rounded border-line-3 text-primary focus:ring-primary transition-all"
                        >
                        <label for="remember-me" class="ms-3 block text-sm text-muted-foreground-2 cursor-pointer select-none">
                            Keep me signed in
                        </label>
                    </div>

                    <button 
                        type="submit" 
                        wire:loading.attr="disabled"
                        class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-bold rounded-xl bg-primary text-primary-foreground hover:opacity-90 active:scale-[0.98] transition-all focus:outline-none focus:ring-2 focus:ring-primary/40 shadow-md disabled:opacity-70"
                    >
                        <span wire:loading.remove wire:target="login">Sign in</span>
                        <span wire:loading wire:target="login">
                            <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
                        </span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>