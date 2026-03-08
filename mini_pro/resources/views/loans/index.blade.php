<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __(' إدارة الاستعارات') }}
            </h2>
            <a href="{{ route('loans.create') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 transition">
                إضافة استعارة جديدة
            </a>
        </div>
    </x-slot>

    <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 border-l-4 border-green-500 text-green-700 shadow-sm">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">

                <div class="overflow-x-auto">

                    <table class="min-w-full divide-y divide-gray-200">

                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-right text-xs font-bold text-gray-500 uppercase tracking-wider">
                                    المستخدم
                                </th>

                                <th class="px-6 py-3 text-right text-xs font-bold text-gray-500 uppercase tracking-wider">
                                    الكتاب
                                </th>

                                <th class="px-6 py-3 text-right text-xs font-bold text-gray-500 uppercase tracking-wider">
                                    تاريخ الاستعارة
                                </th>

                                <th class="px-6 py-3 text-right text-xs font-bold text-gray-500 uppercase tracking-wider">
                                    تاريخ الإرجاع
                                </th>

                                <th class="px-6 py-3 text-center text-xs font-bold text-gray-500 uppercase tracking-wider">
                                    الحالة
                                </th>
                            </tr>
                        </thead>

                        <tbody class="bg-white divide-y divide-gray-200">

                            @foreach($loans as $loan)

                                <tr>

                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $loan->user->name }}
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $loan->book->title }}
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $loan->borrowed_at }}
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $loan->due_date }}
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-center">

                                        @if($loan->returned_at)
                                            <span class="px-2 py-1 text-xs bg-green-100 text-green-700 rounded">
                                                تم الإرجاع
                                            </span>
                                        @else
                                            <span class="px-2 py-1 text-xs bg-yellow-100 text-yellow-700 rounded">
                                                قيد الاستعارة
                                            </span>
                                        @endif

                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>

            </div>
        </div>
    </div>
</div>

</x-app-layout>


<table border="1">
    <tr>
        <th>المستخدم</th>
        <th>الكتاب</th>
        <th>تاريخ الاستعارة</th>
        <th>تاريخ الإرجاع</th>
        <th>الحالة</th>
    </tr>

    @foreach($loans as $loan)
    <tr>
        <td>{{ $loan->user->name }}</td>
        <td>{{ $loan->book->title }}</td>
        <td>{{ $loan->borrowed_at }}</td>
        <td>{{ $loan->due_date }}</td>
        <td>
            {{ $loan->returned_at ? 'تم الإرجاع' : 'قيد الاستعارة' }}
        </td>
    </tr>
    @endforeach
</table>