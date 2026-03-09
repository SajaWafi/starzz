<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row justify-between items-center gap-4">
            <h2 class="font-bold text-2xl text-gray-800 leading-tight flex items-center gap-2">
                <span class="text-3xl">🔄</span>
                <span>إدارة الاستعارات</span>
            </h2>

            <a href="{{ route('loans.create') }}"
               class="inline-flex items-center justify-center px-5 py-2.5 bg-gradient-to-r from-emerald-500 to-teal-600 border border-transparent rounded-xl font-bold text-sm text-white hover:from-emerald-600 hover:to-teal-700 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2 hover:shadow-lg transform hover:-translate-y-0.5 transition-all duration-200">
                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                تسجيل استعارة جديدة
            </a>
        </div>
    </x-slot>

    <div class="py-12 relative">
        <!-- Background decorative elements -->
        <div class="absolute top-20 right-10 w-72 h-72 bg-emerald-200 rounded-full mix-blend-multiply filter blur-3xl opacity-20 hidden md:block"></div>
        <div class="absolute bottom-20 left-10 w-72 h-72 bg-teal-200 rounded-full mix-blend-multiply filter blur-3xl opacity-20 hidden md:block"></div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 relative z-10">

            <!-- Header Section -->
            <div class="bg-white rounded-2xl p-6 mb-8 shadow-sm border border-gray-100 flex flex-col md:flex-row justify-between items-center gap-4">
                <div>
                    <h3 class="text-lg font-semibold text-gray-800">سجل الاستعارات</h3>
                    <p class="text-gray-500 text-sm">متابعة الكتب المستعارة وتواريخ إرجاعها وحالتها الحالية.</p>
                </div>
                <div class="bg-emerald-50 text-emerald-700 px-4 py-2 rounded-xl font-bold text-sm border border-emerald-100">
                    إجمالي الاستعارات: {{ $loans->count() }}
                </div>
            </div>

            {{-- Alerts --}}
            @if(session('success'))
                <div class="mb-6 p-4 bg-green-50 border-r-4 border-green-500 rounded-l-xl text-green-700 shadow-sm flex items-center gap-3">
                    <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    {{ session('success') }}
                </div>
            @endif

            @if($loans->count() > 0)
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-2xl border border-gray-100">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-100">
                            <thead class="bg-gray-50/50">
                                <tr>
                                    <th class="px-6 py-4 text-right text-xs font-bold text-gray-500 uppercase tracking-wider">
                                        المستعير
                                    </th>
                                    <th class="px-6 py-4 text-right text-xs font-bold text-gray-500 uppercase tracking-wider">
                                        الكتاب
                                    </th>
                                    <th class="px-6 py-4 text-right text-xs font-bold text-gray-500 uppercase tracking-wider">
                                        تاريخ الاستعارة
                                    </th>
                                    <th class="px-6 py-4 text-right text-xs font-bold text-gray-500 uppercase tracking-wider">
                                        تاريخ الإرجاع المحدد
                                    </th>
                                    <th class="px-6 py-4 text-center text-xs font-bold text-gray-500 uppercase tracking-wider">
                                        الحالة
                                    </th>
                                    <th class="px-6 py-4 text-center text-xs font-bold text-gray-500 uppercase tracking-wider">
                                        إجراءات
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-100">
                                @foreach($loans as $loan)
                                    <tr class="hover:bg-gray-50/50 transition-colors duration-200">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center gap-3">
                                                <div class="w-8 h-8 rounded-full bg-gradient-to-br from-gray-200 to-gray-300 flex items-center justify-center text-gray-600 font-bold text-xs">
                                                    {{ mb_substr($loan->user->name, 0, 1) }}
                                                </div>
                                                <div class="text-sm font-bold text-gray-900">{{ $loan->user->name }}</div>
                                            </div>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center gap-3">
                                                <div class="w-8 h-10 bg-indigo-100 rounded flex items-center justify-center text-indigo-500">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                                                </div>
                                                <div class="text-sm font-semibold text-gray-700">{{ $loan->book->title }}</div>
                                            </div>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600 font-mono">
                                            {{ \Carbon\Carbon::parse($loan->borrowed_at)->format('Y-m-d') }}
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600 font-mono">
                                            {{ \Carbon\Carbon::parse($loan->due_date)->format('Y-m-d') }}
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-center">
                                            @if($loan->returned_at)
                                                <span class="inline-flex px-3 py-1 text-xs font-bold bg-green-100 text-green-700 rounded-full items-center gap-1 border border-green-200">
                                                    <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span>
                                                    تم الإرجاع
                                                </span>
                                            @else
                                                @if(\Carbon\Carbon::parse($loan->due_date)->isPast())
                                                    <span class="inline-flex px-3 py-1 text-xs font-bold bg-red-100 text-red-700 rounded-full items-center gap-1 border border-red-200">
                                                        <span class="w-1.5 h-1.5 rounded-full bg-red-500 animate-pulse"></span>
                                                        متأخر
                                                    </span>
                                                @else
                                                    <span class="inline-flex px-3 py-1 text-xs font-bold bg-amber-100 text-amber-700 rounded-full items-center gap-1 border border-amber-200">
                                                        <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span>
                                                        قيد الاستعارة
                                                    </span>
                                                @endif
                                            @endif
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                            <div class="flex justify-center space-x-2 space-x-reverse opacity-0 group-hover:opacity-100 transition-opacity duration-200" style="opacity: 1;">
                                                <a href="{{ route('loans.edit', $loan) }}" class="p-2 text-indigo-600 hover:bg-indigo-50 rounded-lg transition-colors" title="تعديل">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                                                </a>

                                                <form action="{{ route('loans.destroy', $loan) }}" method="POST" class="inline" onsubmit="return confirm('هل أنت متأكد من مسح سجل هذه الاستعارة؟');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="p-2 text-red-500 hover:bg-red-50 rounded-lg transition-colors" title="حذف">
                                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @else
                <div class="bg-white rounded-3xl p-12 text-center shadow-sm border border-gray-100 flex flex-col items-center justify-center">
                    <div class="w-24 h-24 bg-emerald-50 text-emerald-300 rounded-full flex items-center justify-center mb-6">
                        <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">لا توجد استعارات حالياً</h3>
                    <p class="text-gray-500 max-w-md mx-auto">لم يتم العثور على أي سجل استعارة. ابدأ بإضافة استعارة جديدة لتتبع حركة الكتب.</p>
                </div>
            @endif

        </div>
    </div>
</x-app-layout>