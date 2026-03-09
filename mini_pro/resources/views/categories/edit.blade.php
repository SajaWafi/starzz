<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-pink-100 text-pink-600 rounded-xl flex items-center justify-center">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
            </div>
            <h2 class="font-bold text-2xl text-gray-800 leading-tight">
                تعديل التصنيف: <span class="text-pink-600">{{ $category->name }}</span>
            </h2>
        </div>
    </x-slot>

    <div class="py-12 relative">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8 relative z-10">
            <div class="bg-white p-8 shadow-2xl sm:rounded-3xl border border-gray-100">
                
                <div class="mb-8 border-b border-gray-100 pb-4">
                    <h3 class="text-lg font-bold text-gray-800">تحديث بيانات التصنيف</h3>
                    <p class="text-sm text-gray-500">قم بتغيير اسم التصنيف ثم اضغط على تحديث.</p>
                </div>

                <form action="{{ route('categories.update', $category) }}" method="POST">
                    @csrf
                    @method('PUT') 
                    
                    <div>
                        <x-input-label for="name" value="اسم التصنيف *" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $category->name)" required autofocus />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-8 pt-6 border-t border-gray-100 gap-4">
                        <a href="{{ route('categories.index') }}" class="px-6 py-2.5 text-gray-600 font-bold hover:text-gray-900 transition-colors">
                            إلغاء
                        </a>
                        <button type="submit" class="inline-flex items-center justify-center px-6 py-2.5 bg-gradient-to-r from-pink-500 to-rose-500 border border-transparent rounded-xl font-bold text-sm text-white hover:from-pink-600 hover:to-rose-600 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:ring-offset-2 hover:shadow-lg transform hover:-translate-y-0.5 transition-all duration-200">
                            تحديث البيانات
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>