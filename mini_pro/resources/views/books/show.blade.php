<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-indigo-100 text-indigo-600 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                </div>
                <h2 class="font-bold text-2xl text-gray-800 leading-tight">
                    تفاصيل الكتاب
                </h2>
            </div>
            <a href="{{ route('books.index') }}" class="px-5 py-2.5 bg-white text-gray-700 font-bold border border-gray-200 rounded-xl hover:bg-gray-50 hover:text-indigo-600 transition-colors shadow-sm">
                العودة للقائمة
            </a>
        </div>
    </x-slot>

    <div class="py-12 relative">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-2xl rounded-3xl overflow-hidden border border-gray-100 flex flex-col md:flex-row">
                
                <!-- Book Cover Section -->
                <div class="md:w-1/3 bg-gradient-to-br from-indigo-500 to-purple-600 p-8 flex flex-col items-center justify-center relative">
                    <div class="absolute inset-0 bg-white/10 pattern-grid-lg"></div>
                    <div class="w-48 h-64 bg-white/90 backdrop-blur-sm shadow-2xl rounded-xl flex flex-col items-center justify-center p-4 transform -rotate-2 hover:rotate-0 transition-all duration-500 z-10 border-4 border-white/50">
                        <svg class="w-16 h-16 text-indigo-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                        <h3 class="font-black text-center text-gray-800 text-lg leading-snug">{{ $book->title }}</h3>
                        <p class="text-sm font-bold text-gray-500 mt-2">{{ $book->author }}</p>
                    </div>
                    
                    <div class="mt-8 z-10 flex gap-2">
                        <span class="px-4 py-1.5 bg-white/20 backdrop-blur-md border border-white/30 text-white rounded-full text-sm font-bold">
                            {{ $book->category->name ?? 'غير مصنف' }}
                        </span>
                    </div>
                </div>

                <!-- Book Details Section -->
                <div class="md:w-2/3 p-8 md:p-12 bg-white">
                    <div class="flex justify-between items-start mb-6">
                        <div>
                            <h1 class="text-3xl font-black text-gray-800 mb-2">{{ $book->title }}</h1>
                            <p class="text-lg text-gray-500 font-medium">بواسطة: {{ $book->author }}</p>
                        </div>
                        <div class="bg-{{ $book->quantity > 0 ? 'green' : 'red' }}-50 px-4 py-2 rounded-xl text-{{ $book->quantity > 0 ? 'green' : 'red' }}-700 font-bold border border-{{ $book->quantity > 0 ? 'green' : 'red' }}-100 whitespace-nowrap">
                            @if($book->quantity > 0)
                                متوفر ({{ $book->quantity }})
                            @else
                                نفدت الكمية
                            @endif
                        </div>
                    </div>

                    <div class="prose prose-indigo max-w-none text-gray-600 mb-8 leading-relaxed">
                        <h4 class="text-xl font-bold text-gray-800 mb-3 border-b border-gray-100 pb-2">نبذة عن الكتاب</h4>
                        <p>{{ $book->description ?: 'لا يوجد وصف متاح لهذا الكتاب حالياً.' }}</p>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 bg-gray-50 p-6 rounded-2xl border border-gray-100">
                        <div>
                            <p class="text-sm text-gray-400 font-medium mb-1">الرقم المعياري (ISBN)</p>
                            <p class="text-gray-800 font-bold dir-ltr text-right font-mono">{{ $book->isbn }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-400 font-medium mb-1">تاريخ النشر</p>
                            <p class="text-gray-800 font-bold">{{ $book->published_at ?: 'غير متوفر' }}</p>
                        </div>
                    </div>
                    
                    @auth
                    @if(auth()->user()->role == 'admin')
                    <div class="mt-8 pt-6 border-t border-gray-100 flex gap-3">
                        <a href="{{ route('books.edit', $book) }}" class="inline-flex items-center justify-center px-6 py-2.5 bg-indigo-50 border border-transparent rounded-xl font-bold text-sm text-indigo-700 hover:bg-indigo-100 transition-colors">
                            تعديل بيانات الكتاب
                        </a>
                        <form action="{{ route('books.destroy', $book) }}" method="POST" class="inline" onsubmit="return confirm('هل أنت متأكد من الحذف؟');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="inline-flex items-center justify-center px-6 py-2.5 bg-red-50 border border-transparent rounded-xl font-bold text-sm text-red-700 hover:bg-red-100 transition-colors">
                                حذف
                            </button>
                        </form>
                    </div>
                    @endif
                    @endauth
                </div>
            </div>
        </div>
    </div>
</x-app-layout>