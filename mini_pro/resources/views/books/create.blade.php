<h2>إضافة كتاب</h2>

<form action="{{ route('books.store') }}" method="POST">
    @csrf

    العنوان: <input type="text" name="title"><br>
    المؤلف: <input type="text" name="author"><br>
    ISBN: <input type="text" name="isbn"><br>
    تاريخ النشر: <input type="date" name="published_at"><br>
    الكمية: <input type="number" name="quantity"><br>

    <button type="submit">حفظ</button>
</form>