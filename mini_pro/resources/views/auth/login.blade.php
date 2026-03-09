<x-guest-layout>
    <div class="text-center mb-8">
        <h2 class="text-3xl font-extrabold text-gray-900 tracking-tight">مرحباً بعودتك! 👋</h2>
        <p class="mt-2 text-sm text-gray-500">سجل الدخول للوصول إلى لوحة التحكم الخاصة بك.</p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-6">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" value="البريد الإلكتروني" class="text-gray-700 font-bold" />
            <div class="mt-1 relative rounded-md shadow-sm border border-gray-200 focus-within:ring-2 focus-within:ring-indigo-500 focus-within:border-indigo-500 transition-all overflow-hidden bg-white">
                <div class="absolute inset-y-0 right-0 pl-3 flex items-center pointer-events-none pr-3">
                    <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                    </svg>
                </div>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" class="focus:ring-0 focus:border-0 block w-full pr-10 sm:text-sm border-0 bg-transparent py-3" placeholder="أدخل بريدك الإلكتروني">
            </div>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            <x-input-label for="password" value="كلمة المرور" class="text-gray-700 font-bold" />
            <div class="mt-1 relative rounded-md shadow-sm border border-gray-200 focus-within:ring-2 focus-within:ring-indigo-500 focus-within:border-indigo-500 transition-all overflow-hidden bg-white">
                <div class="absolute inset-y-0 right-0 pl-3 flex items-center pointer-events-none pr-3">
                    <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                </div>
                <input id="password" type="password" name="password" required autocomplete="current-password" class="focus:ring-0 focus:border-0 block w-full pr-10 sm:text-sm border-0 bg-transparent py-3" placeholder="••••••••">
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me & Forgot Password -->
        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <input id="remember_me" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded transition-colors cursor-pointer" name="remember">
                <label for="remember_me" class="mr-2 block text-sm text-gray-800 cursor-pointer select-none">
                    تذكرني
                </label>
            </div>

            @if (Route::has('password.request'))
                <div class="text-sm">
                    <a href="{{ route('password.request') }}" class="font-bold text-indigo-600 hover:text-indigo-500 transition-colors">
                        هل نسيت كلمة المرور؟
                    </a>
                </div>
            @endif
        </div>

        <div>
            <button type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-xl shadow-lg text-sm font-bold text-white bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transform transition hover:-translate-y-0.5">
                تسجيل الدخول
            </button>
        </div>
        
        @if (Route::has('register'))
        <div class="mt-6 text-center text-sm text-gray-600">
            ليس لديك حساب؟ 
            <a href="{{ route('register') }}" class="font-bold text-purple-600 hover:text-purple-500 transition-colors">
                سجل الآن
            </a>
        </div>
        @endif
    </form>
</x-guest-layout>
