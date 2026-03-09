<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-800 leading-tight">
            {{ __('لوحة التحكم') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            
            <!-- Welcome Banner -->
            <div class="bg-gradient-to-r from-indigo-600 to-purple-600 rounded-3xl overflow-hidden shadow-xl relative">
                <div class="absolute inset-0 bg-white/10 pattern-grid-lg"></div>
                <div class="relative p-8 sm:p-12 text-white">
                    <h3 class="text-3xl font-extrabold mb-4">أهلاً بك، {{ Auth::user()->name }}! 👋</h3>
                    <p class="text-indigo-100 text-lg max-w-2xl">
                        لقد قمت بتسجيل الدخول بنجاح إلى نظام إدارة المكتبة. من هنا يمكنك الوصول السريع إلى جميع أقسام المكتبة وإدارتها بكل سهولة.
                    </p>
                </div>
            </div>

            <!-- Quick Links Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                
                <!-- Books Card -->
                <a href="{{ route('books.index') }}" class="group block bg-white rounded-2xl p-6 shadow-sm hover:shadow-xl border border-gray-100 transition-all duration-300 transform hover:-translate-y-1">
                    <div class="w-14 h-14 bg-indigo-50 text-indigo-600 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-indigo-600 group-hover:text-white transition-colors duration-300 shadow-sm">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                    </div>
                    <h4 class="text-xl font-bold text-gray-800 mb-2">إدارة الكتب</h4>
                    <p class="text-gray-500 text-sm">تصفح الكتب، إضافة كتب جديدة، وتعديل بياناتها.</p>
                </a>

                @if(auth()->user()->role == 'admin')
                <!-- Authors Card (Admin Only) -->
                <a href="{{ route('authors.index') }}" class="group block bg-white rounded-2xl p-6 shadow-sm hover:shadow-xl border border-gray-100 transition-all duration-300 transform hover:-translate-y-1">
                    <div class="w-14 h-14 bg-purple-50 text-purple-600 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-purple-600 group-hover:text-white transition-colors duration-300 shadow-sm">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                    </div>
                    <h4 class="text-xl font-bold text-gray-800 mb-2">المؤلفون</h4>
                    <p class="text-gray-500 text-sm">إدارة قائمة المؤلفين وإضافة بياناتهم الشخصية.</p>
                </a>

                <!-- Categories Card (Admin Only) -->
                <a href="{{ route('categories.index') }}" class="group block bg-white rounded-2xl p-6 shadow-sm hover:shadow-xl border border-gray-100 transition-all duration-300 transform hover:-translate-y-1">
                    <div class="w-14 h-14 bg-pink-50 text-pink-600 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-pink-600 group-hover:text-white transition-colors duration-300 shadow-sm">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path></svg>
                    </div>
                    <h4 class="text-xl font-bold text-gray-800 mb-2">التصنيفات</h4>
                    <p class="text-gray-500 text-sm">تنظيم الكتب في تصنيفات مختلفة لتسهيل البحث.</p>
                </a>
                @endif

                <!-- Loans Card -->
                <a href="{{ route('loans.index') }}" class="group block bg-white rounded-2xl p-6 shadow-sm hover:shadow-xl border border-gray-100 transition-all duration-300 transform hover:-translate-y-1">
                    <div class="w-14 h-14 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-blue-600 group-hover:text-white transition-colors duration-300 shadow-sm">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    </div>
                    <h4 class="text-xl font-bold text-gray-800 mb-2">الاستعارات</h4>
                    <p class="text-gray-500 text-sm">متابعة الكتب المعارة ومعرفة مواعيد إرجاعها.</p>
                </a>

            </div>
        </div>
    </div>
</x-app-layout>
