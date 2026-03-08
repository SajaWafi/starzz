<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('التصنيفات') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                @auth
            @if(auth()->user()->isAdmin())
                <a href="{{ route('categories.create') }}" class="mb-4 inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700">
                    إضافة تصنيف جديد
                </a>
            @endif
            @endauth  

                <table class="min-w-full mt-4 border">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="border px-4 py-2">ID</th>
                            <th class="border px-4 py-2">الاسم</th>
                            {{-- يظهر فقط للـ Admin --}}
                                    @auth
                                    @if(auth()->user()->role == 'admin')
                                    <th class="border px-4 py-2">
                                        العمليات
                                    </th>
                                    @endif
                                    @endauth
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                        <tr>
                            <td class="border px-4 py-2">{{ $category->id }}</td>
                            <td class="border px-4 py-2">{{ $category->name }}</td>
                                                        {{-- العمليات تظهر فقط للـ Admin --}}
                                    @auth
                                    @if(auth()->user()->role == 'admin')

                                    <td class="border px-4 py-2">

                                        <div class="flex justify-center space-x-2 space-x-reverse">

                                            <a href="{{ route('categories.edit', $category) }}" class="text-green-600">تعديل</a>

                                            <form action="{{ route('categories.destroy', $category) }}" method="POST" class="inline">
                                                
                                                @csrf
                                                @method('DELETE')

                                                <button class="text-red-600 ml-2">حذف</button>

                                            </form>

                                        </div>

                                    </td>

                                    @endif
                                    @endauth
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>