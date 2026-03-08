<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            استعارة كتاب
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-sm sm:rounded-lg">

                <form action="{{ route('loans.store') }}" method="POST">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <!-- المستخدم -->
                        <div>
                            <x-input-label for="user_id" value="المستخدم" />
                            <select name="user_id" id="user_id"
                                class="block mt-1 w-full border-gray-300 rounded-md shadow-sm">
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}">
                                        {{ $user->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- الكتاب -->
                        <div>
                            <x-input-label for="book_id" value="الكتاب" />
                            <select name="book_id" id="book_id"
                                class="block mt-1 w-full border-gray-300 rounded-md shadow-sm">
                                @foreach($books as $book)
                                    <option value="{{ $book->id }}">
                                        {{ $book->title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- تاريخ الاستعارة -->
                        <div>
                            <x-input-label for="borrowed_at" value="تاريخ الاستعارة" />
                            <x-text-input
                                id="borrowed_at"
                                name="borrowed_at"
                                type="date"
                                class="block mt-1 w-full"
                                required
                            />
                        </div>

                        <!-- تاريخ الإرجاع -->
                        <div>
                            <x-input-label for="due_date" value="تاريخ الإرجاع" />
                            <x-text-input
                                id="due_date"
                                name="due_date"
                                type="date"
                                class="block mt-1 w-full"
                                required
                            />
                        </div>

                    </div>

                    <div class="flex items-center justify-end mt-6">
                        <x-primary-button>
                            حفظ الاستعارة
                        </x-primary-button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</x-app-layout>