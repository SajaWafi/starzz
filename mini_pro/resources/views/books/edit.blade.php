<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            تعديل كتاب
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white p-6 shadow-sm sm:rounded-lg">

                <form action="{{ route('books.update', $book->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <div>
                            <x-input-label for="title" value="عنوان الكتاب" />
                            <x-text-input
                                id="title"
                                name="title"
                                type="text"
                                class="block mt-1 w-full"
                                value="{{ $book->title }}"
                                required
                            />
                        </div>

                        <div>
                            <x-input-label for="author" value="اسم المؤلف" />
                            <x-text-input
                                id="author"
                                name="author"
                                type="text"
                                class="block mt-1 w-full"
                                value="{{ $book->author }}"
                                required
                            />
                        </div>

                        <div>
                            <x-input-label for="category_id" value="التصنيف" />

                            <select
                                name="category_id"
                                id="category_id"
                                class="block mt-1 w-full border-gray-300 rounded-md shadow-sm">

                                @foreach($categories as $category)

                                    <option value="{{ $category->id }}"
                                        {{ $book->category_id == $category->id ? 'selected' : '' }}>

                                        {{ $category->name }}

                                    </option>

                                @endforeach

                            </select>
                        </div>

                        <div>
                            <x-input-label for="isbn" value="رقم ISBN" />
                            <x-text-input
                                id="isbn"
                                name="isbn"
                                type="text"
                                class="block mt-1 w-full"
                                value="{{ $book->isbn }}"
                                required
                            />
                        </div>

                        <div>
                            <x-input-label for="quantity" value="الكمية المتاحة" />
                            <x-text-input
                                id="quantity"
                                name="quantity"
                                type="number"
                                class="block mt-1 w-full"
                                value="{{ $book->quantity }}"
                            />
                        </div>

                        <div>
                            <x-input-label for="published_at" value="تاريخ النشر" />
                            <x-text-input
                                id="published_at"
                                name="published_at"
                                type="date"
                                class="block mt-1 w-full"
                                value="{{ $book->published_at }}"
                            />
                        </div>

                    </div>

                    <div class="mt-4">
                        <x-input-label for="description" value="وصف الكتاب" />

                        <textarea
                            id="description"
                            name="description"
                            class="block mt-1 w-full border-gray-300 rounded-md shadow-sm"
                            rows="3">{{ $book->description }}</textarea>

                    </div>

                    <div class="flex items-center justify-end mt-6 space-x-3">

                        <a href="{{ route('books.index') }}"
                           class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600">
                            رجوع
                        </a>

                        <x-primary-button>
                            تحديث الكتاب
                        </x-primary-button>

                    </div>

                </form>

            </div>

        </div>
    </div>
</x-app-layout>