<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row justify-between items-center gap-4">
            <h2 class="font-bold text-2xl text-gray-800 leading-tight flex items-center gap-2">
                <span class="text-3xl">🗂️</span>
                <span>إدارة التصنيفات</span>
            </h2>

            @auth
            @if(auth()->user()->role == 'admin')
                <a href="{{ route('categories.create') }}"
                   class="inline-flex items-center justify-center px-5 py-2.5 bg-gradient-to-r from-pink-500 to-rose-500 border border-transparent rounded-xl font-bold text-sm text-white hover:from-pink-600 hover:to-rose-600 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:ring-offset-2 hover:shadow-lg transform hover:-translate-y-0.5 transition-all duration-200">
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                    إضافة تصنيف جديد
                </a>
            @endif
            @endauth
        </div>
    </x-slot>

    <div class="py-12 relative">
        <!-- Background decorative elements -->
        <div class="absolute top-20 right-10 w-72 h-72 bg-pink-300 rounded-full mix-blend-multiply filter blur-3xl opacity-20 hidden md:block"></div>
        <div class="absolute bottom-20 left-10 w-72 h-72 bg-rose-300 rounded-full mix-blend-multiply filter blur-3xl opacity-20 hidden md:block"></div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 relative z-10">

            <!-- Header Section -->
            <div class="bg-white rounded-2xl p-6 mb-8 shadow-sm border border-gray-100 flex flex-col md:flex-row justify-between items-center gap-4">
                <div>
                    <h3 class="text-lg font-semibold text-gray-800">التصنيفات المتاحة</h3>
                    <p class="text-gray-500 text-sm">استعرض وأدر التصنيفات المستخدمة لتنظيم الكتب في المكتبة.</p>
                </div>
                <div class="bg-pink-50 text-pink-700 px-4 py-2 rounded-xl font-bold text-sm border border-pink-100">
                    إجمالي التصنيفات: {{ $categories->count() }}
                </div>
            </div>

            {{-- Alerts --}}
            @if(session('success'))
                <div class="mb-6 p-4 bg-green-50 border-r-4 border-green-500 rounded-l-xl text-green-700 shadow-sm flex items-center gap-3">
                    <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    {{ session('success') }}
                </div>
            @endif

            @if($categories->count() > 0)
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    @foreach($categories as $category)
                        <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 group flex flex-col items-center justify-center text-center relative overflow-hidden">
                            
                            <!-- Decorative bg pattern on hover -->
                            <div class="absolute -right-12 -top-12 w-32 h-32 bg-pink-50 rounded-full group-hover:scale-150 transition-transform duration-500 ease-out z-0"></div>

                            <div class="w-16 h-16 bg-pink-100 text-pink-500 rounded-2xl flex items-center justify-center mb-4 relative z-10 group-hover:bg-pink-500 group-hover:text-white transition-colors duration-300 shadow-sm transform group-hover:rotate-6">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path></svg>
                            </div>
                            
                            <h3 class="font-bold text-gray-800 text-xl relative z-10">{{ $category->name }}</h3>
                            
                            @auth
                            @if(auth()->user()->role == 'admin')
                            <div class="w-full mt-6 flex items-center justify-center gap-2 relative z-10 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <a href="{{ route('categories.edit', $category) }}" class="flex-1 py-2 text-sm font-bold text-indigo-600 bg-indigo-50 hover:bg-indigo-100 rounded-lg transition-colors text-center">
                                    تعديل
                                </a>

                                <form action="{{ route('categories.destroy', $category) }}" method="POST" class="flex-1 inline-flex" onsubmit="return confirm('هل أنت متأكد من حذف هذا التصنيف؟ أفعال الحذف لا يمكن التراجع عنها.');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="w-full py-2 text-sm font-bold text-red-600 bg-red-50 hover:bg-red-100 rounded-lg transition-colors text-center">
                                        حذف
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
                    <div class="w-24 h-24 bg-pink-50 text-pink-300 rounded-full flex items-center justify-center mb-6">
                        <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">لا توجد تصنيفات حالياً</h3>
                    <p class="text-gray-500 max-w-md mx-auto">لم يتم العثور على أي تصنيفات في النظام. يمكنك إضافة تصنيفات جديدة لتنظيم الكتب.</p>
                </div>
            @endif

        </div>
    </div>
</x-app-layout>