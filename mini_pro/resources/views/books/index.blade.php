<h2>قائمة الكتب</h2>

<a href="{{ route('books.create') }}">إضافة كتاب جديد</a>

@if(session('success'))
    <p>{{ session('success') }}</p>
@endif

<table border="1">
    <tr>
        <th>العنوان</th>
        <th>المؤلف</th>
        <th>الكمية</th>
        <th>العمليات</th>
    </tr>

    @foreach($books as $book)
    <tr>
        <td>{{ $book->title }}</td>
        <td>{{ $book->author }}</td>
        <td>{{ $book->quantity }}</td>
        <td>
            <a href="{{ route('books.show', $book->id) }}">عرض</a>
            <a href="{{ route('books.edit', $book->id) }}">تعديل</a>

            <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">حذف</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>