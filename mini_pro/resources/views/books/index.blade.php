<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row justify-between items-center gap-4">
            <h2 class="font-bold text-2xl text-gray-800 leading-tight flex items-center gap-2">
                <span class="text-3xl">📚</span>
                <span>قائمة الكتب</span>
            </h2>

            @auth
            @if(auth()->user()->role == 'admin')
                <a href="{{ route('books.create') }}"
                   class="inline-flex items-center justify-center px-5 py-2.5 bg-gradient-to-r from-indigo-600 to-purple-600 border border-transparent rounded-xl font-bold text-sm text-white hover:from-indigo-700 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 hover:shadow-lg transform hover:-translate-y-0.5 transition-all duration-200">
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                    إضافة كتاب جديد
                </a>
            @endif
            @endauth
        </div>
    </x-slot>

    <div class="py-12 relative">
        <!-- Background decorative elements -->
        <div class="absolute top-20 left-10 w-96 h-96 bg-purple-300 rounded-full mix-blend-multiply filter blur-3xl opacity-20 hidden md:block"></div>
        <div class="absolute top-40 right-10 w-96 h-96 bg-indigo-300 rounded-full mix-blend-multiply filter blur-3xl opacity-20 hidden md:block"></div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 relative z-10">
            <!-- Search Header -->
            <div class="bg-white rounded-2xl p-6 mb-8 shadow-sm border border-gray-100 flex flex-col md:flex-row justify-between items-center gap-4">
                <div>
                    <h3 class="text-lg font-semibold text-gray-800">تصفح المكتبة</h3>
                    <p class="text-gray-500 text-sm">ابحث عن كتبك المفضلة بسرعة وسهولة.</p>
                </div>
                <!-- نموذج البحث عن الكتب -->
                <form method="GET" action="{{ route('books.index') }}" class="w-full md:w-auto relative">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="ابحث عن كتاب بالاسم..." class="w-full md:w-80 pl-10 pr-4 py-2.5 border-none bg-gray-50 rounded-xl focus:ring-2 focus:ring-indigo-500 shadow-inner text-gray-700 transition-all duration-300">
                    <button type="submit" class="absolute left-2.5 top-2.5 text-gray-400 hover:text-indigo-600 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </button>
                </form>
            </div>

            {{-- Alerts --}}
            @if(session('success'))
                <div class="mb-6 p-4 bg-green-50 border-r-4 border-green-500 rounded-l-xl text-green-700 shadow-sm flex items-center gap-3">
                    <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="mb-6 p-4 bg-red-50 border-r-4 border-red-500 rounded-l-xl text-red-700 shadow-sm flex items-center gap-3">
                    <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    {{ session('error') }}
                </div>
            @endif

            <!-- Books Grid -->
            @if($books->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                    @foreach($books as $book)
                        <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 group flex flex-col">
                            
                            <!-- Card Header (Cover Placeholder Placeholder) -->
                            <div class="h-48 bg-gradient-to-br from-indigo-100 to-purple-100 relative flex flex-col items-center justify-center p-6 text-center">
                                <div class="absolute top-4 right-4 z-10 flex flex-col gap-2">
                                    <span class="px-3 py-1 text-xs font-bold bg-white/90 backdrop-blur-sm text-indigo-700 rounded-full shadow-sm">
                                        {{ $book->category->name ?? 'غير مصنف' }}
                                    </span>
                                </div>
                                <svg class="w-16 h-16 text-indigo-300 mb-2 group-hover:scale-110 transition-transform duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                                <h3 class="font-bold text-gray-800 text-lg line-clamp-2 leading-tight">{{ $book->title }}</h3>
                            </div>

                            <!-- Card Body -->
                            <div class="p-6 flex-1 flex flex-col">
                                <p class="text-sm text-gray-500 mb-4 flex items-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                    {{ $book->author }}
                                </p>
                                
                                <div class="mt-auto pt-4 flex items-center justify-between border-t border-gray-50">
                                    <div class="flex items-center gap-1.5 font-bold text-sm">
                                        @if($book->quantity > 0)
                                            <span class="w-2.5 h-2.5 rounded-full bg-green-500 animate-pulse"></span>
                                            <span class="text-green-600">متوفر ({{ $book->quantity }})</span>
                                        @else
                                            <span class="w-2.5 h-2.5 rounded-full bg-red-500"></span>
                                            <span class="text-red-500">نفدت الكمية</span>
                                        @endif
                                    </div>
                                    
                                    {{-- Admin Operations --}}
                                    @auth
                                    @if(auth()->user()->role == 'admin')
                                    <div class="flex items-center gap-1">
                                        <a href="{{ route('books.edit', $book) }}" class="p-2 text-indigo-500 hover:bg-indigo-50 rounded-lg transition-colors" title="تعديل">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                                        </a>
                                        <form action="{{ route('books.destroy', $book) }}" method="POST" class="inline" onsubmit="return confirm('هل أنت متأكد من حذف هذا الكتاب نهائياً؟');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="p-2 text-red-500 hover:bg-red-50 rounded-lg transition-colors" title="حذف">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                            </button>
                                        </form>
                                    </div>
                                    @endif
                                    @endauth
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <!-- Empty State -->
                <div class="bg-white rounded-3xl p-12 text-center shadow-sm border border-gray-100 flex flex-col items-center justify-center">
                    <div class="w-24 h-24 bg-indigo-50 text-indigo-300 rounded-full flex items-center justify-center mb-6">
                        <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">لا توجد كتب حالياً</h3>
                    <p class="text-gray-500 max-w-md mx-auto">لم يتم العثور على أي كتب تطابق بحثك أو لم يتم إضافة كتب بعد.</p>
                </div>
            @endif

        </div>
    </div>
</x-app-layout>