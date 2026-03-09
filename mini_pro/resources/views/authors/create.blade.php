<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-purple-100 text-purple-600 rounded-xl flex items-center justify-center">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path></svg>
            </div>
            <h2 class="font-bold text-2xl text-gray-800 leading-tight">إضافة مؤلف جديد</h2>
        </div>
    </x-slot>

    <div class="py-12 relative">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8 relative z-10">
            <div class="bg-white p-8 shadow-2xl sm:rounded-3xl border border-gray-100">
                
                <div class="mb-8 border-b border-gray-100 pb-4">
                    <h3 class="text-lg font-bold text-gray-800">بيانات المؤلف الأساسية</h3>
                    <p class="text-sm text-gray-500">أدخل اسم المؤلف ونبذة مختصرة عن سيرته الذاتية.</p>
                </div>

                <form action="{{ route('authors.store') }}" method="POST">
                    @csrf
                    
                    <div class="space-y-6">
                        <div>
                            <x-input-label for="name" value="اسم المؤلف *" />
                            <x-text-input id="name" name="name" type="text" class="block mt-1 w-full" required placeholder="مثال: عباس محمود العقاد" />
                        </div>

                        <div>
                            <x-input-label for="bio" value="السيرة الذاتية (اختياري)" />
                            <textarea id="bio" name="bio" class="block mt-1 w-full border-gray-200 focus:border-purple-500 focus:ring focus:ring-purple-200/50 rounded-xl shadow-sm transition-all duration-200" rows="5" placeholder="نبذة مختصرة عن نشأة المؤلف وأهم أعماله..."></textarea>
                        </div>
                    </div>

                    <div class="flex items-center justify-end mt-8 pt-6 border-t border-gray-100 gap-4">
                        <a href="{{ route('authors.index') }}" class="px-6 py-2.5 text-gray-600 font-bold hover:text-gray-900 transition-colors">
                            إلغاء
                        </a>
                        <button type="submit" class="inline-flex items-center justify-center px-6 py-2.5 bg-gradient-to-r from-purple-600 to-indigo-600 border border-transparent rounded-xl font-bold text-sm text-white hover:from-purple-700 hover:to-indigo-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 hover:shadow-lg transform hover:-translate-y-0.5 transition-all duration-200">
                            حفظ المؤلف
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>