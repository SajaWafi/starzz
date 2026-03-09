<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-emerald-100 text-emerald-600 rounded-xl flex items-center justify-center">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
            </div>
            <h2 class="font-bold text-2xl text-gray-800 leading-tight">تسجيل استعارة جديدة</h2>
        </div>
    </x-slot>

    <div class="py-12 relative">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 relative z-10">
            <div class="bg-white p-8 shadow-2xl sm:rounded-3xl border border-gray-100">
                
                <div class="mb-8 border-b border-gray-100 pb-4">
                    <h3 class="text-lg font-bold text-gray-800">تفاصيل الاستعارة</h3>
                    <p class="text-sm text-gray-500">حدد المستخدم، الكتاب، والتواريخ الخاصة بالاستعارة.</p>
                </div>

                <form action="{{ route('loans.store') }}" method="POST">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                        <!-- المستخدم -->
                        <div class="space-y-2">
                            <x-input-label for="user_id" value="المستخدم *" />
                            <select name="user_id" id="user_id" class="block w-full border-gray-300 focus:border-emerald-500 focus:ring focus:ring-emerald-200/50 rounded-xl shadow-sm transition-all duration-200" required>
                                <option value="" disabled selected>-- اختر المستعير --</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }} (#{{ $user->id }})</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- الكتاب -->
                        <div class="space-y-2">
                            <x-input-label for="book_id" value="الكتاب *" />
                            <select name="book_id" id="book_id" class="block w-full border-gray-300 focus:border-emerald-500 focus:ring focus:ring-emerald-200/50 rounded-xl shadow-sm transition-all duration-200" required>
                                <option value="" disabled selected>-- اختر الكتاب --</option>
                                @foreach($books as $book)
                                    <option value="{{ $book->id }}">{{ $book->title }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- تاريخ الاستعارة -->
                        <div class="space-y-2">
                            <x-input-label for="borrowed_at" value="تاريخ الاستعارة *" />
                            <div class="relative">
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-gray-400">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                </div>
                                <input type="date" id="borrowed_at" name="borrowed_at" class="block w-full pr-10 border-gray-300 focus:border-emerald-500 focus:ring focus:ring-emerald-200/50 rounded-xl shadow-sm transition-all duration-200 pl-3" value="{{ date('Y-m-d') }}" required />
                            </div>
                        </div>

                        <!-- تاريخ الإرجاع -->
                        <div class="space-y-2">
                            <x-input-label for="due_date" value="تاريخ الإرجاع المحدد *" />
                            <div class="relative">
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-gray-400">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                </div>
                                <input type="date" id="due_date" name="due_date" class="block w-full pr-10 border-gray-300 focus:border-red-500 focus:ring focus:ring-red-200/50 rounded-xl shadow-sm transition-all duration-200 pl-3 focus:text-red-900" value="{{ date('Y-m-d', strtotime('+7 days')) }}" required />
                            </div>
                        </div>

                    </div>

                    <div class="flex items-center justify-end mt-10 pt-6 border-t border-gray-100 gap-4">
                        <a href="{{ route('loans.index') }}" class="px-6 py-2.5 text-gray-600 font-bold hover:text-gray-900 transition-colors">
                            إلغاء
                        </a>
                        <button type="submit" class="inline-flex items-center justify-center px-6 py-2.5 bg-gradient-to-r from-emerald-500 to-teal-600 border border-transparent rounded-xl font-bold text-sm text-white hover:from-emerald-600 hover:to-teal-700 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2 hover:shadow-lg transform hover:-translate-y-0.5 transition-all duration-200">
                            حفظ الاستعارة
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</x-app-layout>