<h2>تفاصيل الاستعارة</h2>

<p>المستخدم: {{ $loan->user->name }}</p>
<p>الكتاب: {{ $loan->book->title }}</p>
<p>تاريخ الاستعارة: {{ $loan->borrowed_at }}</p>
<p>تاريخ الإرجاع: {{ $loan->due_date }}</p>
<p>تاريخ التسليم: {{ $loan->returned_at }}</p>