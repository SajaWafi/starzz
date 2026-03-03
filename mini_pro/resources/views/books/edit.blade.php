<h2>تعديل كتاب</h2>

<form action="{{ route('books.update', $book->id) }}" method="POST">
    @csrf
    @method('PUT')

    العنوان: <input type="text" name="title" value="{{ $book->title }}"><br>
    المؤلف: <input type="text" name="author" value="{{ $book->author }}"><br>
    ISBN: <input type="text" name="isbn" value="{{ $book->isbn }}"><br>
    تاريخ النشر: <input type="date" name="published_at" value="{{ $book->published_at }}"><br>
    الكمية: <input type="number" name="quantity" value="{{ $book->quantity }}"><br>

    <button type="submit">تحديث</button>
</form>