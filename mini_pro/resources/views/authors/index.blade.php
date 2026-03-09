<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row justify-between items-center gap-4">
            <h2 class="font-bold text-2xl text-gray-800 leading-tight flex items-center gap-2">
                <span class="text-3xl">👥</span>
                <span>قائمة المؤلفين</span>
            </h2>

            @auth
            @if(auth()->user()->role == 'admin')
                <a href="{{ route('authors.create') }}"
                   class="inline-flex items-center justify-center px-5 py-2.5 bg-gradient-to-r from-purple-600 to-indigo-600 border border-transparent rounded-xl font-bold text-sm text-white hover:from-purple-700 hover:to-indigo-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 hover:shadow-lg transform hover:-translate-y-0.5 transition-all duration-200">
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path></svg>
                    إضافة مؤلف جديد
                </a>
            @endif
            @endauth
        </div>
    </x-slot>

    <div class="py-12 relative">
        <!-- Background decorative elements -->
        <div class="absolute top-20 right-10 w-72 h-72 bg-purple-300 rounded-full mix-blend-multiply filter blur-3xl opacity-20 hidden md:block"></div>
        <div class="absolute top-40 left-10 w-72 h-72 bg-pink-300 rounded-full mix-blend-multiply filter blur-3xl opacity-20 hidden md:block"></div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 relative z-10">

            <!-- Header Section -->
            <div class="bg-white rounded-2xl p-6 mb-8 shadow-sm border border-gray-100 flex flex-col md:flex-row justify-between items-center gap-4">
                <div>
                    <h3 class="text-lg font-semibold text-gray-800">إدارة المؤلفين</h3>
                    <p class="text-gray-500 text-sm">عرض وإدارة قائمة المؤلفين المسجلين في النظام.</p>
                </div>
                <div class="bg-purple-50 text-purple-700 px-4 py-2 rounded-xl font-bold text-sm border border-purple-100">
                    إجمالي المؤلفين: {{ $authors->count() }}
                </div>
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

            @if($authors->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    @foreach($authors as $author)
                        @php
                            // Array of gradient classes for avatars
                            $gradients = [
                                'from-purple-400 to-indigo-500',
                                'from-pink-400 to-rose-500',
                                'from-amber-400 to-orange-500',
                                'from-emerald-400 to-teal-500',
                                'from-cyan-400 to-blue-500'
                            ];
                            // Pick a gradient based on author ID so it's consistent
                            $gradient = $gradients[$author->id % count($gradients)];
                            // Get first letter of name
                            $initial = mb_substr($author->name, 0, 1, 'UTF-8');
                        @endphp

                        <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 group relative overflow-hidden">
                            <!-- Decorative bg pattern on hover -->
                            <div class="absolute -right-8 -top-8 w-24 h-24 bg-gradient-to-br {{ $gradient }} opacity-10 rounded-full group-hover:scale-150 transition-transform duration-500 ease-out"></div>

                            <div class="flex items-start justify-between relative z-10">
                                <div class="flex items-center gap-4">
                                    <div class="w-14 h-14 rounded-2xl bg-gradient-to-br {{ $gradient }} flex items-center justify-center text-white font-bold text-2xl shadow-md transform group-hover:rotate-6 transition-transform duration-300">
                                        {{ $initial }}
                                    </div>
                                    <div>
                                        <h3 class="font-bold text-gray-800 text-lg leading-tight group-hover:text-purple-700 transition-colors">{{ $author->name }}</h3>
                                        <p class="text-sm text-gray-400 font-mono mt-1">ID: #{{ $author->id }}</p>
                                    </div>
                                </div>
                            </div>

                            @auth
                            @if(auth()->user()->role == 'admin')
                            <div class="mt-6 pt-4 border-t border-gray-50 flex items-center justify-end gap-2 relative z-10 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <a href="{{ route('authors.edit', $author) }}" class="p-2 text-indigo-500 hover:bg-indigo-50 rounded-lg transition-colors" title="تعديل">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                                </a>

                                <form action="{{ route('authors.destroy', $author) }}" method="POST" class="inline" onsubmit="return confirm('هل أنت متأكد من حذف هذا المؤلف؟ قد يؤدي هذا إلى حذف كتبه المستعارة.');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-2 text-red-500 hover:bg-red-50 rounded-lg transition-colors" title="حذف">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                    </button>
                                </form>
                            </div>
                            @endif
                            @endauth
                        </div>
                    @endforeach
                </div>
            @else
                <!-- Empty State -->
                <div class="bg-white rounded-3xl p-12 text-center shadow-sm border border-gray-100 flex flex-col items-center justify-center">
                    <div class="w-24 h-24 bg-purple-50 text-purple-300 rounded-full flex items-center justify-center mb-6">
                        <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">لا يوجد مؤلفون حالياً</h3>
                    <p class="text-gray-500 max-w-md mx-auto">لم يتم العثور على أي مؤلفين في النظام. يمكنك إضافة مؤلفين جدد من الزر أعلاه.</p>
                </div>
            @endif

        </div>
    </div>
</x-app-layout>