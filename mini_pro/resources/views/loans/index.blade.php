<h2>قائمة الاستعارات</h2>

<a href="{{ route('loans.create') }}">استعارة جديدة</a>

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