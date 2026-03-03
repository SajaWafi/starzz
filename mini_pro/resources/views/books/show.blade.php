<h2>تفاصيل الكتاب</h2>

<p>العنوان: {{ $book->title }}</p>
<p>المؤلف: {{ $book->author }}</p>
<p>الوصف: {{ $book->description }}</p>
<p>ISBN: {{ $book->isbn }}</p>
<p>تاريخ النشر: {{ $book->published_at }}</p>
<p>الكمية: {{ $book->quantity }}</p>

<a href="{{ route('books.index') }}">رجوع</a>