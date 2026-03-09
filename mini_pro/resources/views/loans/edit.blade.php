<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-emerald-100 text-emerald-600 rounded-xl flex items-center justify-center">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
            <h2 class="font-bold text-2xl text-gray-800 leading-tight">
                تعديل حالة الاستعارة <span class="text-emerald-600">#{{ $loan->id }}</span>
            </h2>
        </div>
    </x-slot>

    <div class="py-12 relative">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8 relative z-10">
            <div class="bg-white p-8 shadow-2xl sm:rounded-3xl border border-gray-100">
                
                <div class="mb-8 border-b border-gray-100 pb-4">
                    <h3 class="text-lg font-bold text-gray-800">إرجاع الكتاب</h3>
                    <p class="text-sm text-gray-500">سجل تاريخ إرجاع الكتاب من المستعير.</p>
                </div>

                <div class="bg-gray-50 rounded-xl p-4 mb-6 border border-gray-100">
                    <div class="grid grid-cols-2 gap-4 text-sm">
                        <div>
                            <span class="text-gray-500 block mb-1">المستعير:</span>
                            <span class="font-bold text-gray-800">{{ $loan->user->name }}</span>
                        </div>
                        <div>
                            <span class="text-gray-500 block mb-1">الكتاب:</span>
                            <span class="font-bold text-gray-800">{{ $loan->book->title }}</span>
                        </div>
                    </div>
                </div>

                <form action="{{ route('loans.update', $loan->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="space-y-4">
                        <x-input-label for="returned_at" value="تاريخ الإرجاع" />
                        <div class="relative">
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-gray-400">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            </div>
                            <input type="date" id="returned_at" name="returned_at" class="block w-full pr-10 border-gray-300 focus:border-emerald-500 focus:ring focus:ring-emerald-200/50 rounded-xl shadow-sm transition-all duration-200 pl-3" value="{{ $loan->returned_at ? \Carbon\Carbon::parse($loan->returned_at)->format('Y-m-d') : date('Y-m-d') }}" />
                        </div>
                        <p class="text-xs text-gray-500 mt-2">اترك الحقل فارغاً إذا لم يتم إرجاع الكتاب بعد.</p>
                    </div>

                    <div class="flex items-center justify-end mt-8 pt-6 border-t border-gray-100 gap-4">
                        <a href="{{ route('loans.index') }}" class="px-6 py-2.5 text-gray-600 font-bold hover:text-gray-900 transition-colors">
                            إلغاء
                        </a>
                        <button type="submit" class="inline-flex items-center justify-center px-6 py-2.5 bg-gradient-to-r from-emerald-500 to-teal-600 border border-transparent rounded-xl font-bold text-sm text-white hover:from-emerald-600 hover:to-teal-700 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2 hover:shadow-lg transform hover:-translate-y-0.5 transition-all duration-200">
                            تحديث السجل
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>