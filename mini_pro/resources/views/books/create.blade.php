<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-indigo-100 text-indigo-600 rounded-xl flex items-center justify-center">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
            </div>
            <h2 class="font-bold text-2xl text-gray-800 leading-tight">إضافة كتاب جديد</h2>
        </div>
    </x-slot>

    <div class="py-12 relative">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 relative z-10">
            <div class="bg-white p-8 shadow-2xl sm:rounded-3xl border border-gray-100">
                
                <div class="mb-8 border-b border-gray-100 pb-4">
                    <h3 class="text-lg font-bold text-gray-800">بيانات الكتاب الأساسية</h3>
                    <p class="text-sm text-gray-500">يرجى ملء جميع الحقول المطلوبة لإضافة الكتاب بنجاح.</p>
                </div>

                <form action="{{ route('books.store') }}" method="POST">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">
                        <div>
                            <x-input-label for="title" value="عنوان الكتاب *" />
                            <x-text-input id="title" name="title" type="text" class="block mt-1 w-full" required placeholder="مثال: مقدمة في الخوارزميات" />
                        </div>

                        <div>
                            <x-input-label for="author" value="اسم المؤلف *" />
                            <x-text-input id="author" name="author" type="text" class="block mt-1 w-full" required placeholder="مثال: توماس كورمين" />
                        </div>

                        <div>
                            <x-input-label for="category_id" value="التصنيف *" />
                            <select name="category_id" id="category_id" class="block mt-1 w-full border-gray-200 focus:border-indigo-500 focus:ring focus:ring-indigo-200/50 rounded-xl shadow-sm transition-all duration-200">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <x-input-label for="isbn" value="رقم ISBN *" />
                            <x-text-input id="isbn" name="isbn" type="text" class="block mt-1 w-full font-mono text-left dir-ltr" required placeholder="978-3-16-148410-0" />
                        </div>

                        <div>
                            <x-input-label for="quantity" value="الكمية المتاحة" />
                            <x-text-input id="quantity" name="quantity" type="number" class="block mt-1 w-full" value="1" min="0" />
                        </div>

                        <div>
                            <x-input-label for="published_at" value="تاريخ النشر" />
                            <x-text-input id="published_at" name="published_at" type="date" class="block mt-1 w-full text-left" />
                        </div>
                    </div>

                    <div class="mt-6">
                        <x-input-label for="description" value="وصف الكتاب" />
                        <textarea id="description" name="description" class="block mt-1 w-full border-gray-200 focus:border-indigo-500 focus:ring focus:ring-indigo-200/50 rounded-xl shadow-sm transition-all duration-200" rows="4" placeholder="نبذة مختصرة عن محتوى الكتاب..."></textarea>
                    </div>

                    <div class="flex items-center justify-end mt-8 pt-6 border-t border-gray-100 gap-4">
                        <a href="{{ route('books.index') }}" class="px-6 py-2.5 text-gray-600 font-bold hover:text-gray-900 transition-colors">
                            إلغاء
                        </a>
                        <x-primary-button>حفظ الكتاب</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>